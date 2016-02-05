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

Route::get('/', function () {
    return view('home');
});

Route::get('/hello', function () {
    return "hello";
});

Route::model('User', 'App\User');
Route::model('PersonalProfile', 'App\PersonalProfile');
Route::model('RoommateProfile', 'App\RoommateProfile');
Route::model('RentalUnit', 'App\RentalUnit');
Route::model('Comment', 'App\Comment');

// API ROUTES ==================================
// TODO: Enable only the necessary API functions. Create and edit are not needed since Angular handles the views
Route::group(array('prefix' => 'api'), function() {
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
    Route::resource('User', 'UserController');
    Route::resource('User.ProfileImage', 'ProfileImageController');
    Route::resource('PersonalProfile', 'PersonalProfileController');
    Route::resource('RoommateProfile', 'RoommateProfileController');
    Route::resource('RentalUnit', 'RentalUnitController');
    Route::resource('RentalUnit.Comment', 'CommentController');
    Route::resource('RentalUnit.User', 'RatingController');
    Route::resource('RentalUnit.PropertyPicture', 'PropertyPictureController');
});

// CATCH ALL ROUTE =============================
// all routes that are not home or api will be redirected to the frontend
Route::any('{path?}', function()
{
    return view("home");
})->where("path", ".+");
