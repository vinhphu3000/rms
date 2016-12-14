<?php namespace App\Http\Controllers;
use App\Models\Employee;
use Request;
use Session;
use Input;
use DB;
use App\Http\Controllers\Controller as BaseController;
use App\Authentication\Service as Auth;
use App\Models\Employee as EmployeeModel;

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




    public function listing()
    {
        $result = EmployeeModel::all();
        $column = Employee::getTableColumns();
        return view('employee.list', ['result' => $result, 'db_column' => $column]);
    }

    public function doUploadExcel(\Illuminate\Http\Request $request)
    {
        $this->validate($request, [
            'csvfile' => 'required|max:10048',
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
                    $employee->{$item_map->db_column} = $row->{$item_map->csv_column};
                }
                $employee->position_id = 1;
                $employee->office_id = 1;
                $employee->role_id = 1;
                $employee->save();
            }
        });
    }



}
