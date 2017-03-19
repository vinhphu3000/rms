<?php
namespace App\Notification;
use App\Models\UserNotificationCondition;
use App\Models\UserNotificationConfig;
use App\Models\UserNotificationMessage;
use Illuminate\Support\Facades\Mail;

/**
 * Notification service
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class Service
{

    /**
     * @return array
     */
    public static $_action_list = [
                                    'send_mail'   => [
                                                        'title' => 'Send mail',
                                                        'func_msg_default' => 'sendMail',
                                                        'param' => true ],
                                    'inline_red'  => [
                                                        'title' => 'Inline red',
                                                        'func_msg_default' => 'inlineRed',
                                                        'param' => true ],
                                    'popup'  => [
                                                    'title' => 'Popup',
                                                    'func_msg_default' => 'popup',
                                                    'param' => true ] ];


    /**
     * Scan for event to notification
     * @param null $user_id
     */
    public function scanForMessage($user_id = null)
    {
        if ($user_id) {
            $notification_configs = UserNotificationConfig::where('user_id', $user_id)->get();
        } else {
            $notification_configs = UserNotificationConfig::get();
        }

        foreach ($notification_configs as $config) {

            $conditions_data = UserNotificationCondition::where('user_notification_config_id', $config->id);

            $is_action = false;
            $notification_msg = [];

            foreach ($conditions_data as $condition) {

                $condition_class_name = $this->getMapConditionClass($condition->event);
                $condition_object = new $condition_class_name($condition);

                $checked_status = $condition_object->check();
                $is_action = $config->is_all_net ? ($is_action && $checked_status) : ($is_action || $checked_status);
                if ($checked_status && $condition_object->getResultData() != null) {
                    $notification_msg[$condition->event] = $condition_object->getResultData();
                }
            }

            /**
             * do action
             */
            if ($is_action) {

                foreach ( $notification_msg as $event => $msg ) {
                    $msg_class_name = $this->getMapMessageClass( $event );
                    $service_msg= new $msg_class_name( $msg, self::$_action_list[$config->action]['func_msg_default'], $condition->user_id );
                    $this->storageMessage( $service_msg->buildMessage() );
                }
            }
        }
    }

    /**
     * Send mail
     */
    public function sendMailAction()
    {
        foreach (UserNotificationMessage::where('has_send', 0)->get() as $item) {
            if ($item->func == 'send_mail') {
                Mail::send('emails.reminder', ['user' => $item], function ($m) use ($item) {
                        $m->from('reminder@rms.com', 'RMS system');

                        $m->to($item->user->email, $item->user->name)->subject($item->title);
                });
            }
        }
    }

    /**
     * Return json to show inline red
     */
    public function inlineRedAction()
    {
        $inline_item = [];
        foreach (UserNotificationMessage::where('has_send', 0)->get() as $item) {
            $inline_item[] = [
                'link' => 'proposal/' . $item->propsal_id,
                'title' => $item->title
            ];

        }

        return json_encode($inline_item);
    }

    /**
     * Storage message to database
     * @param $messages
     */
    public function storageMessage($messages)
    {
        foreach ($messages as $item ) {
            UserNotificationMessage::create($item);
        }

    }

    /**
     * Map condition service class
     * @param $condition_name
     * @return string | null
     */
    public function getMapConditionClass($condition_name)
    {
        $mapping = [
                    'proposal' => 'App\Notification\ProposalCondition',
                    'proposal_employee_status' => 'App\Notification\ProposalCondition',
        ];

        if (isset($mapping[$condition_name])) {
            return $mapping[$condition_name];
        }

        return null;
    }

    /**
     * Mapping message service class
     * @param $event
     * @return null | string
     */
    public function getMapMessageClass($event)
    {
        $mapping = [
            'proposal' => 'App\Notification\ProposalMessage',
        ];

        if (isset($mapping[$event])) {
            return $mapping[$event];
        }

        return null;
    }

}
