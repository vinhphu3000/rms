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
Route::group(['prefix' => 'notification','middleware' => 'auth', 'namespace' => 'App\Modules\Notification\Controllers'], function () {
	/**
	 * Config Notification
	 */
	Route::get('/config', 'NotificationController@config');
	Route::get('/config/add-popup', 'NotificationController@addConfigPopup');
	Route::get('/condition', 'NotificationController@loadCondition');
	Route::get('/config/edit-popup', 'NotificationController@editConfigPopup');
	Route::get('/scan', 'NotificationController@scanNotify');
	Route::get('/get-red-inline-message', 'NotificationController@getInlineRedMessage');
	Route::get('/get-popup-message', 'NotificationController@getPopupMessage');
	Route::post('/config/add', 'NotificationController@doSaveConfig');

});