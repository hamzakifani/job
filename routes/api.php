<?php

use Illuminate\Http\Request;

// use App\User;
// use App\Job;
// use Illuminate\Support\Facades\Input;

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

Route::middleware('auth:api')->get('/job', function (Request $request) {
    return $request->user();
});


Route::apiResource('user', 'API\UserController');

Route::apiResource('job', 'API\JobController');

Route::apiResource('subscribe', 'API\SubscribeController');

Route::get('/profile', 'API\UserController@profile');


Route::get('/search',function(){
    $query = Input::get('query');
    $jobs = Job::where('title','like','%'.$query.'%')->get();
    return response()->json($jobs);
   });

   
Route::post('login', 'ApiController@login');
Route::post('register', 'ApiController@register');
Route::post('details', 'ApiController@details');

   Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});