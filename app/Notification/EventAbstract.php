<?php
namespace App\Notification;

/* 
 * ProposalEvent
 * @author Thieu.LeQuang <quangthieuagu@gmail.com>
 */
use App\Models\UserNotificationCondition;

class EventAbstract
{
    public function getConditionByEvent($event_name)
    {
        return UserNotificationCondition::where('event', $event_name)->get();
    }

}
