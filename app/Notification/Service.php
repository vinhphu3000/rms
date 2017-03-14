<?php
namespace App\Notification;
use App\Models\UserActivity;
use App\Models\UserNotificationCondition;
use App\Models\UserNotificationConfig;

/**
 * Notification service
 *
 * User library for the application
 */
class Service
{


    public function scanForAllEvent($user_id = null)
    {
        if ($user_id) {
            $notification_configs = UserNotificationConfig::where('user_id', $user_id)->get();
        } else {
            $notification_configs = UserNotificationConfig::get();
        }

        foreach ($notification_configs as $config) {

            $conditions_data = UserNotificationCondition::where('user_notification_config_id', $config->id);

            $is_action = false;

            foreach ($conditions_data as $condition) {
                $condition_class_name = $this->getMapConditionClass($condition->event);
                $condition_object = new $condition_class_name($condition);
                $is_action = $config->is_all_net ? ($is_action && $condition_object->check()) : ($is_action || $condition_object->check());
            }

            if ($is_action) {
                /**
                 * do action
                 */

            }
        }

    }

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

}
