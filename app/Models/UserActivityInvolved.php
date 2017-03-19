<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * UserActivityInvolved Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class UserActivityInvolved extends Eloquent
{
    protected $table = 'user_activity_involved';

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = ['user_id','user_activity_id','created_at','updated_at'];

    /**
     * Get the phone record associated with the user.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function userActivity()
    {
        return $this->belongsTo('App\Models\UserActivity');
    }

    public function getAllActivityIdByUser($user_id)
    {
        $user_activity_involed = self::where('user_id', $user_id)->where('read', 0)->get();
        $activity_id = [];
        foreach ($user_activity_involed as $item) {
            $activity_id[] = $item->user_activity_id;
        }
        return $activity_id;
    }

}
