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



}
