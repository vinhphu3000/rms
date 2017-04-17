<?php namespace App\Modules;

use App\Http\Controllers\Controller;
use Request;
use Mail;
use Session;
use Input;
use DB;
use Config;

/**
 * Class ModulesController
 * @author ThieuLQ
 * @package App\Modules
 */
class ModulesController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| ModulesController Controller
	|--------------------------------------------------------------------------
	|
	| This is wrapper module controller
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
                $notification = \App\Modules\Notification\Services\Service::inlineRed($this->user->id);
                $count_notify = \App\Modules\Notification\Services\Service::inlineRedCount($this->user->id);
                view()->share('my', $this->user);
                view()->share('notification', $notification);
                view()->share('count_notify', $count_notify);
            }

            return $next($request);
        });
    }

    /**
     * @param $name
     * @param array $param
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function viewModule($name, $param = [])
    {
        $extend_name = explode('\\', get_class($this));
        return view($extend_name[2] . "::" . $name, $param);
    }

}
