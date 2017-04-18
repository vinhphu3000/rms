<?php namespace App\Modules\Project\Controllers;
use App\Events\CreateProject;
use App\Modules\Project\Models\Activity;
use League\Flysystem\Exception;
use App\Modules\Project\Models\Project;
use App\Modules\Project\Models\ProjectRequest;
use Request;
use Session;
use Input;
use App\Modules\ModulesController;
use App\Events\ResourceRequest;


class ProjectRequestController extends ModulesController {


    /**
     * listing action
     */
    public function listing(\Illuminate\Http\Request $request)
    {
        return $this->viewModule('request.list', ['result' => ProjectRequest::all()]);
    }


    /**
     * @param $project_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add($project_id)
    {
        $roles = \App\Modules\Project\Models\ProjectRole::all();
        $employee_exp = \App\Modules\Employee\Models\EmployeeExp::all();
        $project = Project::find((int)$project_id);
        return $this->viewModule('request.add', ['roles' => $roles, 'employee_exp' => $employee_exp, 'project' => $project]);
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
        return $this->viewModule('request.details', ['request' => $request, 'project' => $project]);
    }


}
