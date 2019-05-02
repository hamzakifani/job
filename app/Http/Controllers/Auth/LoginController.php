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
        $this->middleware('guest')->except('logout','showAdminLoginForm');
        $this->middleware('guest:admin')->except('logoutAdmin');

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
      'captcha' => 'required|captcha'
        
    ],
    ['captcha.captcha'=>'Invalid captcha code.']); 
  } 

    public function logout(Request $request) {
      Auth::logout();
      return redirect('/login');
    }


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
            'captcha' => 'required|captcha'
        ],
        ['captcha.captcha'=>'Invalid captcha code.']);

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

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */

    public function handleProviderCallback($provider)
    {
       $user = $this->createOrGetUser(Socialite::driver($provider)->stateless()->user(), $provider);
     
       Auth::login($user);
     
       return redirect()->to('/');
    }


/**
* Create or get a user based on provider id.
*
* @return Object $user
*/
private function createOrGetUser($providerUser)
{
   
 
       //Check if user with same email address exist
       $user = User::where('provider_id', $providerUser->getId())->first();
 
       //Create user if dont'exist
       if (!$user) {
           $user = User::create([
               'email' => $providerUser->getEmail(),
               'firstname' => $providerUser->getName(),
               'provider_id' => $providerUser->getId()
           ]);
 
       }
 
 
       return $user;
   

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
