<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request; 

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $guard = 'admin';


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
    /** 
   * Validate the user login request. 
   * 
   * @param  \Illuminate\Http\Request  $request 
   * @return void 
   */ 

    //--------------------------------------------------------------------------------//
    //Admin Login //
    //--------------------------------------------------------------------------------//

    public function showAdminLoginForm()
    {
        return view('auth.admin-login');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6',
            // 'captcha' => 'required|captcha'
        // ],
        // ['captcha.captcha'=>'Invalid captcha code.']
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'));
    }


    public function logoutAdmin(Request $request)
    {
        auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/login/admin');
    }

}
