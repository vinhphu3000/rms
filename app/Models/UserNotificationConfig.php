<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * UserNotificationConfig Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class UserNotificationConfig extends Eloquent
{
   protected $table = 'user_notification_config';

    /**
     * Get the phone record associated with the user.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}

