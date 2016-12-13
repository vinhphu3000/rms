<?php namespace App\Http\Controllers;
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
        return view('employee.list', ['result' => $result]);
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



}
