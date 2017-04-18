<?php 

/*
|--------------------------------------------------------------------------
| Notification Module Routes
|--------------------------------------------------------------------------
|
| All the routes related to the ModuleOne module have to go in here. Make sure
| to change the namespace in case you decide to change the 
| namespace/structure of controllers.
|
*/
Route::group(['prefix' => 'project','middleware' => 'auth', 'namespace' => 'App\Modules\Project\Controllers'], function () {



	/**
	 * Project
	 */
	Route::get('/details/{id}', 'ProjectController@details');
	Route::get('/booking-data/{project_id}', 'ProjectController@bookingData');

	/**
	 * Project
	 */
	Route::get('/', 'ProjectController@listing');
	Route::get('/add', 'ProjectController@add');

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





	/**
	 * project
	 */
	Route::post('/add', 'ProjectController@doAdd');

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





});