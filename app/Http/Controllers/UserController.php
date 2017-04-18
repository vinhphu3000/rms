<?php namespace App\Http\Controllers;
use App\Modules\Project\Models\User;
use App\Modules\Notification\Services\Service;
use Request;
use Mail;
use Session;
use Input;
use DB;
use App\QCache;
use App\Authentication\Service as Auth;
use App\Modules\Core\Models\AclRoles as RoleDBModel;
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
                $notification = Service::inlineRed($this->user->id);
                $count_notify = Service::inlineRedCount($this->user->id);
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
