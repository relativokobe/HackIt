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

Route::get('/getAllUsers','UserController@getAllUsers');
Route::post('/login','UserController@login');
Route::get('/getActivities','ActivityController@getActivities');
Route::post('/joinActivity','ActivityController@joinActivity');
Route::get('/getActivityParticipants','ActivityController@getActivityParticipants');
Route::get('/getRewards','RewardController@getRewards');
