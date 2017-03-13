<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Authentication\Service as Auth;
use Illuminate\Support\Facades\Config;
use Session;
use Mail;
/**
 * User Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class User extends Eloquent
{
   protected $table = 'users';
   protected $dates = ['created_at', 'updated_at', 'last_login'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email','password','avatar', 'active','email_confirm','remember_token','agency_entity_id','agency_parent_id','agency_name','agency_id','group_id','created_at','updated_at'];

    public function fullName()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    public function avatarPath()
    {
        if (!empty($this->avatar)) {
            return Config::get('constants.PATH_AVATAR') . $this->avatar;
        }
        return Config::get('constants.PATH_AVATAR') . Config::get('constants.DEFAULT_AVATAR');
    }


}

