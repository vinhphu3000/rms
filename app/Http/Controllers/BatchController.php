<?php namespace App\Http\Controllers;

use Request;
use Session;
use Input;
use App\Http\Controllers\Controller as BaseController;


class BatchController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Booking Controller
	|--------------------------------------------------------------------------
	|
	| This controller handle all process related to project like list, add new , assign resource
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
            $notification = Notification::where('send_to', $this->user->id)->get()->take(5);
            $count_notify = Notification::where('send_to', $this->user->id)->where('status_seen', 0)->count();
            view()->share('my', $this->user);
            view()->share('notification', $notification);
            view()->share('count_notify', $count_notify);
            return $next($request);
        });

    }

    /**
     *  Scan message
     */
    public function scanMessage()
    {
        $notification_service = new \App\Notification\Service();
        $notification_service->scanForMessage($this->user->id);

    }

}
