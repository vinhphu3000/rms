<?php
namespace App\Modules\Notification\Models;
use App\Modules\Notification\Services\Service;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * UserNotificationCondition Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class UserNotificationCondition extends Eloquent
{
    protected $table = 'user_notification_condition';
    protected $fillable = ['id','logic','param','user_notification_config_id','event','user_id','created_at','updated_at'];

    /**
     * Get the phone record associated with the user.
     */
    public function user()
    {
        return $this->belongsTo('App\Modules\Core\Models\User');
    }

    public function getLogicList()
    {
        return Service::getLogicList($this->event);
    }

}

