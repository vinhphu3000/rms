<?php namespace App\Modules\Core\Controllers;
use App\Modules\Core\Models\User;
use Request;
use Mail;
use Session;
use Input;
use DB;
use App\Modules\ModulesController;
use App\QCache;
use App\Modules\Core\Models\AclRoles as RoleDBModel;
use Config;

class UserController extends ModulesController {


	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->viewModule('home');
	}


    public function login()
    {
        return $this->viewModule('user.login');
    }

    public function doLogin(\Illuminate\Http\Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $authService = new \App\Authentication\Service();

        $isAuthVerify = $authService->authenticate(
            new \App\Authentication\DbAdapter($email, $password)
        );

        if(!$isAuthVerify) {
            Session::flash('flash_error',trans('messages.wrong_pass_or_email'));
            return redirect('/login');
        }
        if(!\App\Authentication\Service::getAuthInfo()->confirmation) {
            \App\Authentication\Service::clearAuthInfo();
            Session::flash('flash_error',trans('messages.email_have_not_confirm'));
            return redirect('/login');
        }
        if(!\App\Authentication\Service::getAuthInfo()->active) {
            \App\Authentication\Service::clearAuthInfo();
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

        return $this->viewModule('user.list', ['result' => $result, 'search_param' => $search_param]);
    }

}
