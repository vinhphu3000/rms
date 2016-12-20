<?php namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\EmployeeExp;
use Illuminate\Support\Facades\App;
use League\Flysystem\Exception;
use Request;
use Session;
use Input;
use DB;
use App\Http\Controllers\Controller as BaseController;
use App\Authentication\Service as Auth;
use App\Models\Employee as EmployeeModel;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class EmployeeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Employee Controller
	|--------------------------------------------------------------------------
	|
	| This controller handle all process related to user like login, logout, reset password
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
        $builder = EmployeeModel::query();
        $search_param = [
            'kw' => $request['kw'],
            'order_by' => empty($request['order_by']) ? 'id' : $request['order_by'],
            'order_type' => $request['order_type'] == 'asc' ? 'asc' : 'desc',
        ];
        Session::set('search_param', $search_param);

        if(!empty($search_param['kw'])){
            $builder->where('full_name', 'LIKE', "%{$search_param['kw']}%");
            $builder->orWhere('last_name', 'LIKE', "%{$search_param['kw']}%");
            $builder->orWhere('skills', 'LIKE', "%{$search_param['kw']}%");
            $builder->orWhere('first_name', 'LIKE', "%{$search_param['kw']}%");
            $builder->orWhere('code', 'LIKE', "%{$search_param['kw']}%");
        }
        $result = $builder->orderBy($search_param['order_by'], $request['order_type'])->paginate($limit);
        $column = Employee::getTableColumns();
        $employee_exp = \App\Models\EmployeeExp::all();
        return view('employee.list', ['result' => $result, 'db_column' => $column, 'search_param' => $search_param, 'employee_exp' => $employee_exp]);
    }

    /**
     * doExport action
     */
    public function doExport()
    {
        $builder = EmployeeModel::query();
        $search_param = ['kw'=>''];

        if(Session::has('search_param')){
            $search_param = Session::get('search_param');
        }

        $kw = isset($search_param['kw']) ? $search_param['kw'] : '';
        if(!empty($kw)){
            $builder->where('full_name', 'LIKE', "%{$kw}%");
            $builder->orWhere('last_name', 'LIKE', "%{$kw}%");
            $builder->orWhere('skills', 'LIKE', "%{$kw}%");
            $builder->orWhere('first_name', 'LIKE', "%{$kw}%");
            $builder->orWhere('code', 'LIKE', "%{$kw}%");

        }

        $result = $builder->orderBy('code')->get();
        $name = 'employee' . date('Y_m_d');
        \Excel::create($name, function($excel)  use ($result) {

            $excel->sheet('default', function($sheet) use ($result) {

                $sheet->fromModel($result);

            });

        })->download('csv');
    }

    public function doUploadExcel(\Illuminate\Http\Request $request)
    {
        $this->validate($request, [
            'csvfile' => 'required|mimes:csv,txt|max:10048',
        ]);

        $csvFile = $request->file('csvfile');
        $csvFileName = 'import_file_' . date('Y-m-d-h-i-s').'.'.$csvFile->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $csvFile->move($destinationPath, $csvFileName);
        $header = \Excel::load($destinationPath . '/' . $csvFileName)->first();
        return json_encode(['filename' => $csvFileName, 'header' => $header->keys()]);
    }

    public function doImport(\Illuminate\Http\Request $request)
    {
        $fileName = $request->input('file_name');
        $mapColumn = $request->input('map_column');
        EmployeeModel::$csv_map_column = json_decode($mapColumn);
        $destinationPath = public_path('/images');
        \Excel::filter('chunk')->load($destinationPath . '/' . $fileName)->chunk(250, function($results)
        {
            foreach($results as $row)
            {
                $employee = new EmployeeModel();
                foreach (EmployeeModel::$csv_map_column as $item_map) {
                    if ($item_map->db_column == 'id' && is_numeric($row->{$item_map->csv_column})) {
                        $employee =    EmployeeModel::find($row->{$item_map->csv_column});
                        if (empty($employee->id)) {
                            $employee = new EmployeeModel();
                            $employee->id = $row->{$item_map->csv_column};
                        }
                        continue;
                    }
                    if ($item_map->db_column == 'position_id' && !is_numeric($row->{$item_map->csv_column})) {
                        $employeePosition = \App\Models\EmployeePosition::firstOrCreate(array('name' => $row->{$item_map->csv_column}));
                        $employee->position_id = $employeePosition->id;
                        continue;
                    }

                    if ($item_map->db_column == 'office_id' && !is_numeric($row->{$item_map->csv_column})) {
                        $employeePosition = \App\Models\Office::firstOrCreate(array('name' => $row->{$item_map->csv_column}));
                        $employee->office_id = $employeePosition->id;
                        continue;
                    }

                    if ($item_map->db_column == 'role_id' && !is_numeric($row->{$item_map->csv_column})) {
                        $employeePosition = \App\Models\EmployeeRole::firstOrCreate(array('name' => $row->{$item_map->csv_column}));
                        $employee->role_id = $employeePosition->id;
                        continue;
                    }
                    $employee->{$item_map->db_column} = $row->{$item_map->csv_column};
                }


                $employee->save();
            }
        }, 'UTF-8');
    }

    /**
     * experience action
     */
    public function experience(\Illuminate\Http\Request $request)
    {
        $employee_exp = \App\Models\EmployeeExp::all();
        if (count($request['employee_ids'])) {
            $employee_selected = EmployeeModel::find((int)$request['employee_ids'][0]);
            $cv_file = EmployeeModel::getCVFile($employee_selected);
            $experience = \App\Models\EmployeeExpMatrix::where('employee_id', $employee_selected->id)->get();
            return view('employee.experience', ['employee_exp' => $employee_exp, 'employee' => $employee_selected, 'cv_file' => $cv_file, 'experience' => $experience]);
        }

    }

    /**
     * import action
     */
    public function import()
    {
        $column = Employee::getTableColumns();
        return view('employee.import', ['db_column' => $column]);
    }

    public function doUploadCV(\Illuminate\Http\Request $request)
    {
        try {
            $employee_id = (int)$request['employee_id'];
            $this->validate($request, [
                'cvfile' => 'required|mimes:pdf,docx,doc|max:10048',
            ]);

            $cvFile = $request->file('cvfile');
            $cv_file_name = EmployeeModel::generateCVFileName($request['employee_id'], $cvFile->getClientOriginalExtension());
            $destinationPath = \Config::get('upload.cv_path');
            $cvFile->move($destinationPath, $cv_file_name['real_name']);
            EmployeeModel::where('id', $employee_id)
                ->update(['cv_file' => $cv_file_name['db_name']]);
            return json_encode(['md5_name' => $cv_file_name['md5_name'], 'display_file_name' => $cv_file_name['display_name']]);
        } catch (Exception $ex) {
            if ($ex instanceof FileException) {
                return json_encode(['error' => 'An error occurs during upload cv file, please check your file']);
            }

        }

    }

    public function doDownloadCSV($token)
    {

        $ext = pathinfo($token, PATHINFO_EXTENSION);
        $filename = pathinfo($token, PATHINFO_FILENAME);
        $file = \Config::get('upload.cv_path') . '/' . $filename . md5('aaaaaaawwwwqqqxxxx') . '.' . $ext;

        $headers_map = array(
            'pdf' => 'Content-Type: application/pdf',
            'doc' => 'Content-Type: application/msword',
            'docx' => 'Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        );
        $headers = [
                    isset($headers_map[$ext]) ? $headers_map[$ext] : $headers_map['doc']
        ];

        return response()->download($file, 'cv.' . $ext, $headers);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function doExperienceSave(\Illuminate\Http\Request $request)
    {
        $employee_id = $request->input('employee_id');
        $experience_data = $request->input('experience_data');
        $experience_data = json_decode($experience_data);
        $id_not_deleted  = [];
        foreach ($experience_data as $item) {
            if (!empty($item->id)) {
                $employeeExpMatrix = \App\Models\EmployeeExpMatrix::find((int)$item->id);
                if (empty($employeeExpMatrix->id)) {
                    $employeeExpMatrix = new \App\Models\EmployeeExpMatrix();
                } else {
                    $id_not_deleted[] = $employeeExpMatrix->id;
                }
            } else {
                $employeeExpMatrix = new \App\Models\EmployeeExpMatrix();
            }
            $employeeExpMatrix->employee_id = $employee_id;
            $employeeExpMatrix->exp_id = $item->exp_id;
            $employeeExpMatrix->level = $item->level;
            $employeeExpMatrix->month = $item->month;
            $employeeExpMatrix->save();
            $id_not_deleted[] = $employeeExpMatrix->id;
        }
        /**
         * Delete all record not exits id
         */
        \App\Models\EmployeeExpMatrix::whereNotIn('id', $id_not_deleted)->delete();
        return json_encode(['success'=>true]);
    }



}
