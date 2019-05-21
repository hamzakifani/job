<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request; 

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;
use Socialite;
class LoginController extends Controller
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

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
  protected function validateLogin(Request $request) 
  { 
    $this->validate($request, [ 
      $this->username() => 'required|string', 
      'password' => 'required|string', 
    //   'captcha' => 'required|captcha'
        
    ]
    // ['captcha.captcha'=>'Invalid captcha code.']
); 
  } 

    public function logout(Request $request) {
      Auth::logout();
      return redirect('/login');
    }

















    // public function handleProviderCallback()
    // {
    //     $userSocial = Socialite::driver('facebook')->user();

    //     $user = User::where(['firstname' => $userSocial->getName()])->first();
    //     if ($user) {
    //       Auth::login($user);
    //       return redirect()->action('HomeController@index');
    //     } else {
    //       return redirect('/register');
    //     }
    //   }


    //     // dd($user);
    //    $user =  User::create([

    //         'email'         => $user->getEmail(),
    //         'firstname'     => $user->getName(),
    //         'provider_id'   => $user->getId(),
    //     ]);
   
    //         Auth::login($user, true);

    //         return redirect('/');


    //         // All Providers
    //         $user->getId();
    //         $user->getNickname();
    //         $user->getName();
    //         $user->getEmail();
    //         $user->getAvatar();
    // }

}
