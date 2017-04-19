<?php namespace App\Modules\Notification\Controllers;

use App\Modules\ModulesController;
use App\Modules\Notification\Models\UserNotificationCondition;
use App\Modules\Notification\Models\UserNotificationConfig;
use App\Modules\Notification\Models\UserNotificationMessage;
use App\Modules\Notification;
use Request;
use Mail;
use Session;
use Input;
use DB;
use Config;

class NotificationController extends ModulesController {


    /**
     * View list of notification config
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function config()
    {
       $notify = UserNotificationConfig::where('user_id', $this->user->id)->get();
        return $this->viewModule('config', ['result' => $notify]);
    }

    /**
     * Add config popup
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addConfigPopup()
    {
        $event_list  = \App\Modules\Notification\Services\Service::$_event_list;
        $default_event = key($event_list);
        $default_condition_list = \App\Modules\Notification\Services\Service::getLogicList($default_event);
        $default_condition_param = $default_condition_list['logicList'][key($default_condition_list['logicList'])]['param'];
        $action = \App\Modules\Notification\Services\Service::$_action_list;
        return $this->viewModule('popup-add-config', ['action' => $action, 'event' => \App\Modules\Notification\Services\Service::$_event_list, 'default_condition_list' => $default_condition_list, 'default_condition_param' => $default_condition_param]);
    }

    /**
     * edit notification config popup
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editConfigPopup(\Illuminate\Http\Request $request)
    {
        $id_config = $request['id'];
        $config = UserNotificationConfig::find($id_config);
        $condition = UserNotificationCondition::where('user_notification_config_id', $config->id)->get();
        $event_list  = \App\Modules\Notification\Services\Service::$_event_list;
        $default_event = key($event_list);
        $default_condition_list = \App\Modules\Notification\Services\Service::getLogicList($default_event);
        $default_condition_param = $default_condition_list['logicList'][key($default_condition_list['logicList'])]['param'];
        $action = \App\Modules\Notification\Services\Service::$_action_list;
        return $this->viewModule('popup-edit-config', ['config' => $config, 'conditions' => $condition, 'action' => $action, 'event' => \App\Modules\Notification\Services\Service::$_event_list, 'default_condition_list' => $default_condition_list, 'default_condition_param' => $default_condition_param]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function loadCondition(\Illuminate\Http\Request $request)
    {
        $list = \App\Modules\Notification\Services\Service::getLogicList($request['event']);
        return json_encode($list);
    }

    /**
     * Scan for notification and build message
     * @return null
     */
    public function scanNotify()
    {
        \App\Modules\Notification\Services\Service::scanForMessage($this->user->id);
        return null;
    }

    /**
     * get all inline red message of current user
     * @return string
     */
    public function getInlineRedMessage()
    {
        $item_inline_red = Service::inlineRedAction($this->user->id);
        return view('notification.inline-red-item', ['item_inline_red' => $item_inline_red]);
    }

    /**
     * get all popup message of current user
     * @return string
     */
    public function getPopupMessage()
    {
        return \App\Modules\Notification\Services\Service::popupAction($this->user->id);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doSaveConfig(\Illuminate\Http\Request $request)
    {
        $id = $request->input('id');

        $config_data = [
            'description' => $request->input('description'),
            'all_is_net' => $request->input('all_is_net'),
            'action' => $request->input('action_param'),
            'user_id' => $this->user->id,
        ];

        $condition_param = $request->input('condition_param');

        if (!empty($id)) {

            UserNotificationConfig::where('id', $id)->update($config_data);

            UserNotificationCondition::where('user_notification_config_id', $id)->delete();

            if(!empty($id) && !empty($condition_param)) {

                $condition_param_array = json_decode($condition_param);

                foreach ($condition_param_array as $condition) {
                    $condition_data = [
                        'logic' => $condition->logic,
                        'param' => $condition->param,
                        'user_notification_config_id' => $id,
                        'event' => $condition->event,
                        'user_id' => $this->user->id,
                    ];
                    UserNotificationCondition::create($condition_data);
                }
            }
            return redirect('/notification/config');
        }

        $notification_config= UserNotificationConfig::create($config_data);


        if(!empty($notification_config->id) && !empty($condition_param)) {
            $condition_param_array = json_decode($condition_param);
            foreach ($condition_param_array as $condition) {
                $condition_data = [
                    'logic' => $condition->logic,
                    'param' => $condition->param,
                    'user_notification_config_id' => $notification_config->id,
                    'event' => $condition->event,
                    'user_id' => $this->user->id,
            ];
            UserNotificationCondition::create($condition_data);
            }
        }
        return redirect('/notification/config');
    }


    /**
     * @param \Illuminate\Http\Request $request
     */
    public function doUpdateNotification(\Illuminate\Http\Request $request)
    {
        $id = $request->input('id');
        if (!empty($id)) {
            $ids = explode(',', $id);
            if (count($ids)) {
                UserNotificationMessage::whereIn('id', $ids)->where('send_to', $this->user->id)->update(['seen' => 1]);
            }

        }
    }

}
