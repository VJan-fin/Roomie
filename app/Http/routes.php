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
    return view('welcome');
});

Route::get('/hello', function () {
    return "hello";
});

Route::model('User', 'App\User');
Route::model('PersonalProfile', 'App\PersonalProfile');
Route::model('RoommateProfile', 'App\RoommateProfile');
Route::model('RentalUnit', 'App\RentalUnit');
Route::model('Comment', 'App\Comment');

Route::resource('User', 'UserController');
Route::resource('PersonalProfile', 'PersonalProfileController');
Route::resource('RoommateProfile', 'RoommateProfileController');
Route::resource('RentalUnit', 'RentalUnitController');
Route::resource('RentalUnit.Comment', 'CommentController');

