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


    public function add($project_id)
    {
        $roles = \App\Models\ProjectRole::all();
        $employee_exp = \App\Models\EmployeeExp::all();
        $project = Project::find((int)$project_id);
        return view('request.add', ['roles' => $roles, 'employee_exp' => $employee_exp, 'project' => $project]);
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


        if(!empty($project->id)) {
            $request_data = [
                'project_id' => $project->id,
                'params' => $request->input('request_param'),
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
        $activity = Activity::where('project_id', (int)$id)->get()->take(10);
        return view('project.details', ['project' => $project, 'result' => Project::all(), 'activity' => $activity]);
    }


}
