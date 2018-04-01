<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('users','API\UserAPIController');
Route::resource('bloods','API\BloodAPIController');
Route::resource('events','API\EventAPIController');
Route::resource('emergency-requests','API\EmergencyRequestAPIController');
Route::resource('stories','API\StoryAPIController');
Route::resource('provinces','API\ProvinceAPIController');
Route::resource('districts','API\DistrictAPIController');
Route::resource('phones','API\PhoneAPIController');


//--------------------------------------------------------

Route::post('login', 'API\PassportController@login');
Route::post('register', 'API\PassportController@register');

Route::group(['middleware' => 'auth:api'], function(){
	Route::post('get-details', 'API\PassportController@getDetails');
});