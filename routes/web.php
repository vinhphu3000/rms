<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'auth'], function () {

    /**** GET ***/
    // users
    Route::get('/', 'WelcomeController@index');
    Route::get('/dash', 'DashboardController@index');
    Route::get('/employee', 'EmployeeController@listing');


    Route::get('/logout',[
        'middleware' => 'role:public',
        'uses' => 'UserController@logout',
    ]);
    Route::get('user/profile',[
        'middleware' => 'role:public',
        'uses' => 'UserController@getUserProfile',
    ]);

    Route::get('/permission', 'UserController@listPermission');
    Route::get('/permission-add', 'UserController@addPermission');
    Route::get('/permission-edit/{permissionId}', 'UserController@editPermission');
    Route::get('/permission-remove/{permissionId}', 'UserController@removePermission');
    Route::get('/permission-add-user-group', [
        'middleware' => 'role:QLNQ-Update',
        'uses' => 'UserController@addUserGroupPermission',
    ]);

});

//GUEST ROLE
Route::group(['middleware' => 'guest'], function () {

    /**
     * GET request
     */
    Route::get('/login', 'UserController@login');


    Route::get('/error503', 'ErrorController@error503');
    Route::get('/forgot-pass-message', 'UserController@forgotPasswordMessage');
    Route::get('/renewpass/{token}', 'UserController@renewPassword');
    Route::get('/forgot-password', 'UserController@forgotPassword');
    Route::get('/captcha', 'UserController@captchamage');
    Route::get('/confirm-email/{token}', 'UserController@postConfirmEmail');
    /**
     * POST request
     */
    Route::post('/login', 'UserController@doLogin');
    Route::post('/employee/upload-excel', 'EmployeeController@doUploadExcel');
    Route::post('/employee/import', 'EmployeeController@doImport');
    Route::post('/post-forgot-password', 'UserController@postForgotPassword');
    Route::post('/renewpass/{token}', 'UserController@renewPassword');
    Route::post('/postrenewpass/{token}', 'UserController@postRenewPassword');
    Route::post('/post-register-agency', 'AgencyController@postRegisterAgency');

});
