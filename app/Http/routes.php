<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('home');
});*/
Route::get('dropzone', 'DropzoneController@index');
Route::post('dropzone/uploadFiles', 'DropzoneController@uploadFiles');
Route::post('dropzone/removeFile', 'DropzoneController@removeFile');
Route::get('dropzone/getPreviousUploaded', 'DropzoneController@getPreviousUploaded');

Route::get('/', 'HomeController@index')->middleware(['auth','menu']);

Route::get('/test', 'Test@index');

Route::get('/download/file/{id}', 'DownloadController@downloadFile');
Route::get('/api/loadNotification', 'NotificationController@loadNotification');
Route::post('/api/sendNotification', 'NotificationController@sendNotification');
Route::post('/api/readNotification', 'NotificationController@readNotification');

Route::auth();

Route::get('/home', 'HomeController@index')->middleware(['auth','menu']);

//User
Route::group(['middleware' => ['auth', 'menu']], function(){
    Route::post('user/apiList', 'UserController@apiList');
    Route::post('user/apiDelete', 'UserController@apiDelete');
    Route::get('change-password', 'UserController@changePassword');
    Route::post('change-password', 'UserController@postChangePassword');
    Route::get('profile', 'UserController@viewProfile');
    Route::resource('user', 'UserController');
    Route::post('editProfile', 'UserController@postEditProfile');
    Route::post('uploadAvatar', 'UserController@postUploadAvatar');
});

Route::group(['middleware' => ['auth', 'menu']], function() {
    //
    Route::group(['prefix' => 'master'], function() {

        //Action Control
        Route::post('action/apiList', 'ActionController@apiList');
        Route::post('action/apiDelete', 'ActionController@apiDelete');
        Route::resource('action', 'ActionController');

        //Action Type
        Route::post('actiontype/apiList', 'ActionTypeController@apiList');
        Route::post('actiontype/apiDelete', 'ActionTypeController@apiDelete');
        Route::resource('actiontype', 'ActionTypeController');

        //Division
        Route::post('division/apiList', 'DivisionController@apiList');
        Route::post('division/apiDelete', 'DivisionController@apiDelete');
        Route::resource('division', 'DivisionController');

        //Flow
        Route::post('flow/apiList', 'FlowController@apiList');
        Route::post('flow/apiDelete', 'FlowController@apiDelete');
        Route::post('flow/apiCountFlow', 'FlowController@apiCountFlow');
        Route::resource('flow', 'FlowController');

        //Flow Group
        Route::post('flowgroup/apiList', 'FlowGroupController@apiList');
        Route::post('flowgroup/apiDelete', 'FlowGroupController@apiDelete');
        Route::resource('flowgroup', 'FlowGroupController');

        //Group
        Route::post('group/apiList', 'GroupController@apiList');
        Route::post('group/apiDelete', 'GroupController@apiDelete');
        Route::resource('group', 'GroupController');

        //Holiday
        Route::post('holiday/apiList', 'HolidayController@apiList');
        Route::post('holiday/apiDelete', 'HolidayController@apiDelete');
        Route::resource('holiday', 'HolidayController');

        //Menu
        Route::post('menu/apiList', 'MenuController@apiList');
        Route::post('menu/apiDelete', 'MenuController@apiDelete');
        Route::post('menu/apiCountChild', 'MenuController@apiCountChild');
        Route::get('menu/generateMenu', 'MenuController@generateMenu');
        Route::resource('menu', 'MenuController');

        //Module
        Route::post('module/apiList', 'ModuleController@apiList');
        Route::post('module/apiDelete', 'ModuleController@apiDelete');
        Route::resource('module', 'ModuleController');

        //Notification Type
        Route::post('notificationtype/apiList', 'NotificationTypeController@apiList');
        Route::post('notificationtype/apiDelete', 'NotificationTypeController@apiDelete');
        Route::resource('notificationtype', 'NotificationTypeController');

        //Position
        Route::post('position/apiList', 'PositionController@apiList');
        Route::post('position/apiDelete', 'PositionController@apiDelete');
        Route::resource('position', 'PositionController');

        //Religion
        Route::post('religion/apiList', 'ReligionController@apiList');
        Route::post('religion/apiEdit', 'ReligionController@apiEdit');
        Route::resource('religion', 'ReligionController');

        //Role
        Route::post('role/apiList', 'RoleController@apiList');
        Route::post('role/apiEdit', 'RoleController@apiEdit');
        Route::resource('role', 'RoleController');
    });

    Route::group(['prefix' => 'config'], function() {
        //Announcement Management
        Route::post('announcement/apiList', 'AnnouncementController@apiList');
        Route::post('announcement/apiDelete', 'AnnouncementController@apiDelete');
        Route::resource('announcement', 'AnnouncementController');

        //Application Setting
        Route::post('setting/apiList', 'SettingController@apiList');
        Route::post('setting/apiDelete', 'SettingController@apiDelete');
        Route::resource('setting', 'SettingController');
    });
});
