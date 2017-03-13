<?php
namespace App\Notification;
use App\Models\UserNotificationCondition;
use App\Models\UserNotificationConfig;

/**
 * Notification service
 *
 * User library for the application
 */
class Service
{


    public static function scanForAllEvent($user_id = null)
    {
        if ($user_id) {
            $notification_configs = UserNotificationConfig::where('user_id', $user_id)->get();
        } else {
            $notification_configs = UserNotificationConfig::get();
        }

        foreach ($notification_configs as $config) {

            $conditions = UserNotificationCondition::where('user_notification_config_id', $config->id);

            $is_action = false;

            foreach ($conditions as $condition) {
                $event_class_name = $notification_configs->event->name;
                $event = new $event_class_name($condition);
                $is_action = $config->is_all_net ? ($is_action && $event->listen()) : ($is_action || $event->listen());
            }

            if ($is_action) {
                /**
                 * do action
                 */

            }
        }

    }

}
