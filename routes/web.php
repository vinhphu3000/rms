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

    Route::get('/request/booking', 'BookingController@requestBooking');
    Route::get('/booking/popup', 'BookingController@popupBooking');
    Route::get('/booking/details/{id}', 'BookingController@details');
    Route::get('/booking/edit/{id}', 'BookingController@edit');
    Route::get('/booking/remove/{id}', 'BookingController@doRemove');
    Route::get('/booking/official/{id}', 'BookingController@doOfficial');
    Route::get('/request', 'BookingController@listing');
    Route::get('/booking', 'BookingController@booking');
    Route::get('/proposal/cancel', 'BookingController@proposalCancel');
    Route::get('/proposal/send', 'BookingController@proposalSend');
    Route::get('/proposal/employee/interview', 'BookingController@requestInterview');
    Route::get('/proposal/employee/accept', 'BookingController@accept');
    Route::get('/proposal/employee/reject', 'BookingController@reject');
    Route::get('/employee/timeline-data/{id}', 'EmployeeController@timelineData');


    Route::get('/employee/{id}', 'EmployeeController@profile');






    Route::get('/logout','UserController@doLogout');
    Route::get('/user','UserController@listing');

    /**
     * Notification
     */
    Route::get('/notification/seen','UserController@doUpdateNotification');



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
    Route::post('/booking/edit', 'BookingController@doEdit');

    /**
     * Update proposal
     */

    Route::post('/proposal/update', 'BookingController@doProposalUpdate');
    Route::post('/proposal/employee/reject/confirm', 'BookingController@doReject');

    /**
     * Config Notification
     */
    Route::get('/config/notification', 'UserController@configNotification');



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
