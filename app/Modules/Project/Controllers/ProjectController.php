<?php namespace App\Modules\Project\Controllers;
use App\Events\Project as ProjectEvent;
use App\Modules\Project\Models\Proposal;
use App\Modules\Project\Models\UserActivity;
use League\Flysystem\Exception;
use App\Modules\Project\Models\Project;
use App\Modules\Project\Models\ProjectRequest;
use App\Modules\Project\Models\ProjectBooking;
use Request;
use Session;
use Input;
use App\Modules\ModulesController;
use App\Events\ResourceRequest;


class ProjectController extends ModulesController {

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
        return $this->viewModule('project.list', ['result' => $projects]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        $roles = \App\Modules\Project\Models\ProjectRole::all();
        $employee_exp = \App\Modules\Employee\Models\EmployeeExp::all();
        return $this->viewModule('project.add', ['roles' => $roles, 'employee_exp' => $employee_exp]);
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
        event(new ProjectEvent($project));

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

        $new_proposal = Proposal::where('project_id', $project->id)->where('status', 0)->orderBy('created_at', 'desc')->get();

        $booking = ProjectBooking::where('project_id', (int)$id)->where('remove', 0)->get();

        $activity = UserActivity::where('project_id', (int)$id)->orderBy('created_at','desc')->get()->take(10);
        return $this->viewModule('project.details', ['project' => $project, 'result' => $projects, 'activity' => $activity, 'booking' => $booking, 'new_proposal' => $new_proposal]);
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