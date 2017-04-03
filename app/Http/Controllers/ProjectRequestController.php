<?php namespace App\Http\Controllers;
use App\Authentication\Service;
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


class ProjectRequestController extends BaseController {

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
            $notification = \App\Notification\Service::inlineRed($this->user->id);
            $count_notify = \App\Notification\Service::inlineRedCount($this->user->id);
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
        return view('request.list', ['result' => ProjectRequest::all()]);
    }


    /**
     * @param $project_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add($project_id)
    {
        $roles = \App\Models\ProjectRole::all();
        $employee_exp = \App\Models\EmployeeExp::all();
        $project = Project::find((int)$project_id);
        return view('request.add', ['roles' => $roles, 'employee_exp' => $employee_exp, 'project' => $project]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doAdd(\Illuminate\Http\Request $request)
    {
        $project_id = (int)$request->input('project_id');

        if(!empty($project_id)) {
            $request_data = [
                'project_id' => $project_id,
                'params' => $request->input('request_param'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'user_id' => $this->user->id,
            ];
            $request = ProjectRequest::create($request_data);
            event(new ResourceRequest($request));

        }


        return redirect('/project/details/' . $project_id);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details($id)
    {
        $request = ProjectRequest::find((int)$id);
        $project = Project::find((int)$request->project_id);
        return view('request.details', ['request' => $request, 'project' => $project]);
    }


}
