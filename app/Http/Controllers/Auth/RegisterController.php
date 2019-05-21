<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request; 

use App\User;
use App\Recruteur;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname'      => ['required', 'string', 'max:255'],
            'lastname'       => ['required', 'string', 'max:255'],
            'email'          => ['required', 'string', 'email', 'max:255'],
            'password'       => ['required', 'string', 'min:6'],
            'phone'          => ['required', 'string', 'max:14'],
            'adresse'        => ['required', 'string', 'max:255', 'min:20'],
            'company'        => ['string', 'max:255', 'min:20'],
            'info'           => ['string', 'max:255', 'min:20'],
            'type'           => ['string'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
         $user =  User::create([
            'firstname'      => $data['firstname'],
            'lastname'       => $data['lastname'],
            'email'          => $data['email'],
            'password'       => Hash::make($data['password']),
            'phone'          => $data['phone'],
            'adresse'        => $data['adresse'],
            'type'           => $data['type'],
            'role'           => $data['role']

            
        ]);
        

        

        if(isset($data['company']) && ($data['info']))
        {
            $recruteur = new Recruteur();
            $recruteur->fill([
            
                'company'           => $data['company'],
                'info'              => $data['info'],
                'user_id'           => $user->id,
            ]);

            $recruteur->save([$user]);
        }
       
         
          return $user;
        
         
        
        
    }

}
