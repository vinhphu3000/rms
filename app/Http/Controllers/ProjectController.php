<?php namespace App\Http\Controllers;
use League\Flysystem\Exception;
use App\Models\Project;
use App\Models\ProjectBooking;
use App\Models\Employee;
use Request;
use Session;
use Input;
use DB;
use App\Http\Controllers\Controller as BaseController;
use App\Authentication\Service as Auth;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

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
            return $next($request);
        });

    }

    /**
     * listing action
     */
    public function listing(\Illuminate\Http\Request $request)
    {
        return view('project.list', ['result' => Project::all()]);
    }


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
        return redirect('/project/details/' . $project->id);
    }


    public function details($id)
    {
        $project = Project::find((int)$id);
        return view('project.details', ['project' => $project, 'result' => Project::all()]);
    }

    public function bookingData($project_id)
    {
        $booking = ProjectBooking::where('project_id', (int)$project_id)->get();
        $gantt_chart_data = ProjectBooking::convertDataGanttChart($booking);
        return json_encode($gantt_chart_data);
    }

}
