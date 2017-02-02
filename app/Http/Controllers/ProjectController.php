<?php namespace App\Http\Controllers;
use App\Events\CreateProject;
use App\Models\Activity;
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


class ProjectController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Project Controller
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
     * listing action
     */
    public function listing(\Illuminate\Http\Request $request)
    {
        if ($this->user->type == 'admin') {
            $projects = Project::all();
        } else {
            $projects = Project::where('user_id', $this->user->id)->get();
        }
        return view('project.list', ['result' => $projects]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        $roles = \App\Models\ProjectRole::all();
        $employee_exp = \App\Models\EmployeeExp::all();
        return view('project.add', ['roles' => $roles, 'employee_exp' => $employee_exp]);
    }

    public function doAdd(\Illuminate\Http\Request $request)
    {
        $project_data = [
                'name' => $request->input('name'),
                'client' => $request->input('client'),
                'status' => $request->input('status'),
                'estimate_type' => $request->input('estimate_type'),
                'estimate' => $request->input('estimate'),
                'user_id' => $this->user->id,
        ];
        $project = Project::create($project_data);
        event(new CreateProject($project));

        $request_param = $request->input('request_param');

        if(!empty($project->id) && !empty($request_param)) {
            $request_data = [
                'project_id' => $project->id,
                'params' => $request_param,
                'note' => $request->input('request_note'),
                'user_id' => $this->user->id,
            ];
            $request = ProjectRequest::create($request_data);
            event(new ResourceRequest($request));

        }
        return redirect('/project/details/' . $project->id);
    }


    public function details($id)
    {
        $project = Project::find((int)$id);
        if ($this->user->type == 'admin') {
            $projects = Project::all();
        } else {
            $projects = Project::where('user_id', $this->user->id)->get();
        }

        $booking = ProjectBooking::where('project_id', (int)$id)->where('remove', 0)->get();

        $activity = Activity::where('project_id', (int)$id)->orderBy('created_at','desc')->get()->take(10);
        return view('project.details', ['project' => $project, 'result' => $projects, 'activity' => $activity, 'booking' => $booking]);
    }

    /**
     * @param $project_id
     * @return string
     */
    public function bookingData($project_id)
    {
        $booking = ProjectBooking::where('project_id', (int)$project_id)->where('remove', 0)->get();
        $gantt_chart_data = ProjectBooking::convertDataGanttChart($booking);
        return json_encode($gantt_chart_data);
    }

}
