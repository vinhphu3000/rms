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
use App\Http\Controllers\Controller;
use App\QCache;
use App\Authentication\Service as Auth;
use App\Models\User as UserDBModel;
use App\Models\AclRoles as RoleDBModel;
use Config;

class UserController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| User Controller
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

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}


    public function login()
    {
        return view('user.login');
    }

    public function doLogin(\Illuminate\Http\Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $authService = new Auth();

        $isAuthVerify = $authService->authenticate(
            new \App\Authentication\DbAdapter($email, $password)
        );

        if(!$isAuthVerify) {
            Session::flash('flash_error',trans('messages.wrong_pass_or_email'));
            return redirect('/login');
        }
        if(!Auth::getAuthInfo()->confirmation) {
            Auth::clearAuthInfo();
            Session::flash('flash_error',trans('messages.email_have_not_confirm'));
            return redirect('/login');
        }
        if(!Auth::getAuthInfo()->active) {
            Auth::clearAuthInfo();
            Session::flash('flash_error',trans('messages.user_was_blocked'));
            return redirect('/login');
        }
        return redirect('/project');
    }

    public function doLogout()
    {
        Auth::clearAuthInfo();
        return redirect('/login');
    }

    public function doUpdateNotification(\Illuminate\Http\Request $request)
    {
        $id = $request->input('id');
        if (!empty($id)) {
            $ids = explode(',', $id);
            if (count($ids)) {
                Notification::whereIn('id', $ids)->where('send_to', $this->user->id)->update(['status_seen' => 1]);
            }

        }

    }

    public function configNotification()
    {
       $notify = UserNotificationConfig::where('user_id', $this->user->id)->get();
        return view('user.notify-config', ['result' => $notify]);
    }

    public function addConfigNotification()
    {
        return view('user.notify-config', ['event' => Service::$_event_list]);
    }

    /**
     * listing action
     */
    public function listing(\Illuminate\Http\Request $request)
    {
        $limit = 30;
        $builder = User::query();
        $search_param = [
            'kw' => $request['kw'],
            'order_by' => empty($request['order_by']) ? 'id' : $request['order_by'],
            'order_type' => $request['order_type'] == 'asc' ? 'asc' : 'desc',
        ];
        Session::set('search_param', $search_param);

        if(!empty($search_param['kw'])){
            $builder->where('name', 'LIKE', "%{$search_param['kw']}%");
            $builder->orWhere('email', 'LIKE', "%{$search_param['kw']}%");
        }
        $result = $builder->orderBy($search_param['order_by'], $request['order_type'])->paginate($limit);

        return view('user.list', ['result' => $result, 'search_param' => $search_param]);
    }

}
