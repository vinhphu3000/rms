<?php namespace App\Http\Controllers;
use App\Events\CreateProject;
use App\Models\Activity;
use League\Flysystem\Exception;
use App\Models\Project;
use App\Models\ProjectRequest;
use App\Models\ProjectBooking;
use App\Models\Employee;
use Request;
use Session;
use Input;
use App\Http\Controllers\Controller as BaseController;
use App\Events\ResourceRequest;


class BookingController extends BaseController {

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
            return $next($request);
        });

    }


    public function booking($request_id)
    {
        $request = ProjectRequest::find((int)$request_id);
        $project = Project::find((int)$request->project_id);
        $projects = Project::all();
        $employees = Employee::all();
        return view('booking.booking-with-requests', ['request' => $request, 'project' => $project, 'result' => $projects, 'employees' => $employees]);
    }


}
