<?php 

/*
|--------------------------------------------------------------------------
| Employee Module Routes
|--------------------------------------------------------------------------
|
| All the routes related to the ModuleOne module have to go in here. Make sure
| to change the namespace in case you decide to change the 
| namespace/structure of controllers.
|
*/
Route::group(['prefix' => 'employee','middleware' => 'auth', 'namespace' => 'App\Modules\Employee\Controllers'], function () {


	/**** GET ***/
	// Employee
	Route::get('/', 'EmployeeController@listing');
	Route::get('/export', 'EmployeeController@doExport');
	Route::get('/experience-popup', 'EmployeeController@experience');
	Route::get('/import-popup', 'EmployeeController@import');
	Route::get('/download-cv/{token}', 'EmployeeController@doDownloadCSV');
	Route::get('/search', 'EmployeeController@doSearch');

	Route::get('/timeline-data/{id}', 'EmployeeController@timelineData');


	Route::get('/{id}', 'EmployeeController@profile');

	Route::post('/upload-excel', 'EmployeeController@doUploadExcel');
	Route::post('/import', 'EmployeeController@doImport');
	Route::post('/upload-cv', 'EmployeeController@doUploadCV');

	Route::post('/experience-save', 'EmployeeController@doExperienceSave');

});