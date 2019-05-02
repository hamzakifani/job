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



Route::get('/blog', function () {
    return view('blog');
});

Route::get('/company/{name}', 'HomeController@showCompany');

//--------------------------------\\ 
//       Route of Axios of Users
//--------------------------------\\ 

Route::get('/admin/getusers', 'AdminController@Showusers');

Route::post('/admin/addusers', 'AdminController@addusers');

Route::PUT('/admin/upusers', 'AdminController@upusers'); 

Route::delete('/admin/delusers/{id}', 'AdminController@delusers'); 

//--------------------------------\\ 
//       Route of Axios of jobs
//--------------------------------\\ 

Route::get('/admin/getjobs', 'AdminController@Showjobs');

Route::post('/admin/addjobs', 'AdminController@addjobs');

Route::PUT('/admin/upjobs', 'AdminController@upjobs'); 

Route::delete('/admin/deljobs/{id}', 'AdminController@deljobs'); 

//--------------------------------\\ 
//       Route of Axios of Dashboard
//--------------------------------\\ 
Route::get('/admin/Showusers', 'AdminController@Showusers');
Route::get('/admin/Showjobs', 'AdminController@Showjobs');



//--------------------------------\\ 
//       Route of Admin
//--------------------------------\\ 

Route::get('/admin/dashboard', 'AdminController@index');

Route::get('/admin/listjob', 'AdminController@readjobs');

Route::get('/admin/listusers', 'AdminController@readusers');




//-----------Pending jobs-----------\\ 
Route::get('/admin/pending-jobs', 'AdminController@Showpendingjobs');

Route::PUT('/admin/pending-jobs/{id}', 'AdminController@updatePendingJob');
//--------------------------------\\ 


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


//-----------ALL ROUTE OF login admin-----------\\ 
Route::prefix('/login')->group(function() {
    Route::get('/admin', 'Auth\AdminLoginController@showAdminLoginForm')->name('login.admin');
    Route::post('/admin', 'Auth\AdminLoginController@adminLogin')->name('login.admin.post');
});
Route::post('/admin/logout', 'Auth\AdminLoginController@logoutAdmin')->name('logout.admin');


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

Route::get('/admin/subscribe', 'AdminController@subscribe');

Route::get('/admin/contact', 'AdminController@contact');


Route::post('/subscribe', 'HomeController@subscribe');

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

