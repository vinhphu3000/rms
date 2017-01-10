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


    public function booking(\Illuminate\Http\Request $params)
    {
        $project_id = (int)$params->input('project_id');
        $request_id = (int)$params->input('request_id');
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

        $bookings = ProjectBooking::where('project_id', $project_id)->orderBy('project_role_id')->get();

        $limit = 100;
        $builder = Employee::query();
        $search_param = [
            'kw' => $params['kw'],
            'order_by' => empty($params['order_by']) ? 'id' : $params['order_by'],
            'order_type' => $params['order_type'] == 'asc' ? 'asc' : 'desc',
        ];
        Session::set('search_param', $search_param);

        if(!empty($search_param['kw'])){
            $builder->where(function ($query) use($search_param) {
                $query->orWhere('full_name', 'LIKE', "%{$search_param['kw']}%");
                $query->orWhere('last_name', 'LIKE', "%{$search_param['kw']}%");
                $query->orWhere('skills', 'LIKE', "%{$search_param['kw']}%");
                $query->orWhere('first_name', 'LIKE', "%{$search_param['kw']}%");
                $query->orWhere('code', 'LIKE', "%{$search_param['kw']}%");
            });

        }
        $booking_employee_id = [];
        foreach ($bookings as $item) {
            $booking_employee_id[] = $item->employee_id;
        }
        if (count($booking_employee_id)) {
            $builder->whereNotIn('id', $booking_employee_id);
        }

        $employees = $builder->orderBy($search_param['order_by'], $request['order_type'])->paginate($limit);


        return view('booking.booking-with-requests', [ 'search_param' => $search_param,'request' => $request, 'project' => $project, 'requests' => $requests, 'employees' => $employees, 'projects' => $projects, 'project_id' => $project_id, 'bookings' => $bookings]);
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

//            $request_on_range = ProjectBooking::where('employee_id', $request->input('employee_id'))
//                ->whereBetween('start_date', [$booking_data['start_date'], $booking_data['end_date']])
//                ->orWhereBetween('end_date', [$booking_data['start_date'], $booking_data['end_date']])->count();
//
//            if ($request_on_range > 0) {
//                throw new \Exception('Range date select is invalid');
//            }
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
