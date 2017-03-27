<?php namespace App\Http\Controllers;
use App\Models\Notification;
use App\Models\User;
use App\Models\UserNotificationCondition;
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
        $action = Service::$_action_list;
        return view('notification.popup-add-config', ['action' => $action, 'event' => Service::$_event_list, 'default_condition_list' => $default_condition_list, 'default_condition_param' => $default_condition_param]);
    }

    public function editConfigPopup(\Illuminate\Http\Request $request)
    {
        $id_config = $request['id'];
        $config = UserNotificationConfig::find($id_config);
        $condition = UserNotificationCondition::where('user_notification_config_id', $config->id)->get();
        $event_list  = Service::$_event_list;
        $default_event = $event_list[0];
        $default_condition_list = Service::getLogicList($default_event);
        $default_condition_param = $default_condition_list['logicList'][key($default_condition_list['logicList'])]['param'];
        $action = Service::$_action_list;
        return view('notification.popup-edit-config', ['config' => $config, 'conditions' => $condition, 'action' => $action, 'event' => Service::$_event_list, 'default_condition_list' => $default_condition_list, 'default_condition_param' => $default_condition_param]);
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

}
