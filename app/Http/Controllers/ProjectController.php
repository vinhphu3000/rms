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

    protected  static $_user_infor;

    /**
     * Constructor function
     * Set current user information
     */
    public function __construct() {
        self::$_user_infor = Auth::getAuthInfo();
    }

    /**
     * listing action
     */
    public function listing(\Illuminate\Http\Request $request)
    {
        $limit = 30;
        $builder = Project::query();
        $search_param = [
            'kw' => $request['kw'],
            'order_by' => empty($request['order_by']) ? 'id' : $request['order_by'],
            'order_type' => $request['order_type'] == 'asc' ? 'asc' : 'desc',
        ];
        Session::set('search_param', $search_param);

        if(!empty($search_param['kw'])){
            $builder->where('name', 'LIKE', "%{$search_param['kw']}%");
        }
        $result = $builder->orderBy($search_param['order_by'], $request['order_type'])->paginate($limit);

        return view('project.list', ['result' => $result, 'search_param' => $search_param]);
    }


    public function add()
    {
        return view('project.add');
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
