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
   protected $fillable = ['id','description','all_is_net','user_id','action','action_param','created_at','updated_at'];
    /**
     * Get the phone record associated with the user.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}

