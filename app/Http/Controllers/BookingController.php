<?php namespace App\Http\Controllers;
use App\Events\ResourceBooking;
use App\Models\Notification;
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
            $notification = Notification::where('send_to', $this->user->id)->get()->take(5);
            $count_notify = Notification::where('send_to', $this->user->id)->where('status_seen', 0)->count();
            view()->share('my', $this->user);
            view()->share('notification', $notification);
            view()->share('count_notify', $count_notify);
            return $next($request);
        });

    }


    public function booking(\Illuminate\Http\Request $request)
    {
        $project_id = (int)$request->input('project_id');
        $request_id = (int)$request->input('request_id');
        if (!empty($request_id) && is_integer($request_id) ) {
            $request = ProjectRequest::find((int)$request_id);
        } else {
            $request = ProjectRequest::orderBy('updated_at','desc')->first();
        }

        $project = Project::find((int)$request->project_id);
        $projects = Project::all();
        if (!empty($project_id) && is_integer($project_id)) {
            $requests = ProjectRequest::where('project_id', $project_id)->orderBy('updated_at','desc')->get();
        } else {
            $requests = ProjectRequest::orderBy('updated_at','desc')->get();
        }

        $employees = Employee::all();
        $bookings = ProjectBooking::where('project_id', $project_id)->orderBy('project_role_id')->get();
        return view('booking.booking-with-requests', ['request' => $request, 'project' => $project, 'requests' => $requests, 'employees' => $employees, 'projects' => $projects, 'project_id' => $project_id, 'bookings' => $bookings]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function popupBooking(\Illuminate\Http\Request $request)
    {
        $project = Project::find((int)$request['project_id']);
        $employee = Employee::find((int)$request['employee_id']);
        $roles = \App\Models\ProjectRole::all();
        return view('booking.add', ['employee' => $employee, 'project' => $project, 'roles' => $roles]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doBooking(\Illuminate\Http\Request $request)
    {
        $project_id = (int)$request->input('project_id');

        if(!empty($project_id)) {
            $booking_data = [
                'project_id' => $project_id,
                'project_role_id' => $request->input('project_role_id'),
                'take_part_per' => $request->input('take_part_per'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'employee_id' => $request->input('employee_id'),
                'book_type' => 'Reserve',
                'user_id' => $this->user->id,
            ];
            $booking = ProjectBooking::create($booking_data);
            event(new ResourceBooking($booking));

        }
        return view('widgets.booking-item',['booking' => $booking]);
    }

    public function details($id)
    {
        $booking = ProjectBooking::find($id);
        return view('booking.details', ['booking' => $booking]);
    }


}
