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
    // Employee
    Route::get('/', 'WelcomeController@index');
    Route::get('/dash', 'DashboardController@index');
    Route::get('/employee', 'EmployeeController@listing');
    Route::get('/employee/export', 'EmployeeController@doExport');
    Route::get('/experience-popup', 'EmployeeController@experience');
    Route::get('/import-popup', 'EmployeeController@import');
    Route::get('/employee/download-cv/{token}', 'EmployeeController@doDownloadCSV');
    Route::get('/employee/search', 'EmployeeController@doSearch');

    /**
     * Project
     */
    Route::get('/project/details/{id}', 'ProjectController@details');
    Route::get('/project/booking-data/{project_id}', 'ProjectController@bookingData');

    /**
     * Project
     */
    Route::get('/project', 'ProjectController@listing');
    Route::get('/project/add', 'ProjectController@add');

    /**
     * Request
     */
    Route::get('/request/add/{project_id}', 'ProjectRequestController@add');
    Route::get('/request/details/{id}', 'ProjectRequestController@details');

    /**
     * booking
     */

    Route::get('/request/booking', 'BookingController@booking');
    Route::get('/booking/popup', 'BookingController@popupBooking');


    Route::get('/logout','UserController@doLogout');

    Route::post('/employee/upload-excel', 'EmployeeController@doUploadExcel');
    Route::post('/employee/import', 'EmployeeController@doImport');
    Route::post('/employee/upload-cv', 'EmployeeController@doUploadCV');


    /**
     * project
     */
    Route::post('/project/experience-save', 'EmployeeController@doExperienceSave');
    Route::post('/project/add', 'ProjectController@doAdd');

    /**
     * Request
     */
    Route::post('/request/add', 'ProjectRequestController@doAdd');
    /**
     * Booking
     */
    Route::post('/booking/add', 'BookingController@doBooking');


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


});
