<?php namespace App\Http\Controllers;
use App\Models\Notification;
use App\Models\User;
use App\Models\UserNotificationConfig;
use App\Notification\Service;
use Request;
use Mail;
use Session;
use Input;
use DB;
use App\Authentication\Service as Auth;
use App\Models\AclRoles as RoleDBModel;
use Config;

class NotificationController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Notification Controller
	|--------------------------------------------------------------------------
	|
	| This controller handle all process related to user like login, logout, reset password
	|
	*/

    protected  $user;

    /**
     * Constructor function
     * Set current user information
     */
    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->user = \App\Authentication\Service::getAuthInfo();
            if (!empty($this->user->id)) {
                $notification = Notification::where('send_to', $this->user->id)->get()->take(5);
                $count_notify = Notification::where('send_to', $this->user->id)->where('status_seen', 0)->count();
                view()->share('my', $this->user);
                view()->share('notification', $notification);
                view()->share('count_notify', $count_notify);
            }

            return $next($request);
        });
    }



    public function config()
    {
       $notify = UserNotificationConfig::where('user_id', $this->user->id)->get();
        return view('notification.config', ['result' => $notify]);
    }


    public function addConfigPopup()
    {
        $event_list  = Service::$_event_list;
        $default_event = $event_list[0];
        $default_condition_list = Service::getLogicList($default_event);
        $default_condition_param = $default_condition_list['logicList'][key($default_condition_list['logicList'])]['param'];
        return view('notification.popup-add-config', ['event' => Service::$_event_list, 'default_condition_list' => $default_condition_list, 'default_condition_param' => $default_condition_param]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function loadCondition(\Illuminate\Http\Request $request)
    {
        $list = Service::getLogicList($request['event']);
        return json_encode($list);
    }

}
