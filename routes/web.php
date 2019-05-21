<?php

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Input;

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

//----------- Route of mes Jobcontroller -----------\\ 
Route::resource('job', 'JobController');
Route::get('/category/{name}', 'JobController@Jobshow');
//----------------------------------------------------\\

//----------- Route of show single job-----------\\ 
Route::get('/job-single/{id}', 'HomeController@showjob');
//----------------------------------------------------\\

Route::get('/contact', function () {
    return view('contact');
});


Route::get('/about', function () {
    return view('about');
});

Route::get('/dashboard','HomeController@dash');

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/company/{name}', 'HomeController@showCompany');


//----------- Route of Auth-----------\\ 
Auth::routes();

//----------- Route of Refreash Captcha-----------\\ 
Route::get('refresh_captcha', 'LoginController@refreshCaptcha')->name('refresh_captcha');

//----------- Route of index-----------\\ 
Route::get('/', 'HomeController@index');

//----------- Route of my profile-----------\\ 
Route::get('/profile/{id}/edit', 'HomeController@editprofile')->name('profile');
Route::PUT('/profile/{id}', 'HomeController@updateprofile');

//----------- Route of mes jobs-----------\\ 
Route::get('/profile/{id}/job', 'JobController@mesjobs');

//----------- Route of mes messages-----------\\ 
Route::get('/message', 'EmploiController@message')->middleware('auth');

//----------- Route of mes messages-----------\\ 
Route::get('/message/{id}', 'EmploiController@Showmessage')->middleware('auth');

//----------- Route of postuler a job-----------\\ 
Route::get('/job/{id}/postuler','EmploiController@create');
Route::post('/job/{id}/postuler','EmploiController@store');



//-------------------------------------------------\\ 
Route::get('/getjobs', 'HomeController@Showjobs');

Route::post('/addjobs', 'HomeController@addjobs');

//-------------------------------------------------\\ 

Route::get('/getprofile/{id}/edit', 'HomeController@getprofile');

Route::PUT('/upprofile', 'HomeController@upprofile'); 

Route::PUT('/upprofilerec', 'HomeController@upprofileRec'); 
//-------------------------------------------------\\ 


Route::get('/alljobs/{id}', 'JobController@alljobs');

Route::PUT('/updatejob', 'JobController@updatejob');


//--------------------------------------------------------------------
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
//-------------------------------------------------\\ 


Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale); 
    return redirect()->back();
    
});

//-------------------------------------------------\\ 

Route::get('/send', 'MailController@home');
Route::post('/send/email', 'MailController@sendemail');

//-------------------------------------------------\\ 
Route::post('/addcontact', 'HomeController@contact');

//-------------------------------------------------\\ 

Auth::routes(['verify' => true]);



Route::get('dashboard/{path}', 'HomeController@dash')->where('path', '([A-z\d-\/_.]+)?');

// Route::get('/dashboard/users', 'API\UserController@index');
