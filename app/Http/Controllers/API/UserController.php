<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index()
    {
        return  User::latest()->get();
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'firstname'      => 'required|string|max:255',
            'lastname'       => 'required|string|max:255',
            'adresse'        => 'required|string|max:255',
            'phone'          => 'required|string|max:255',
            'role'           => 'required',
            'email'          => 'required|string|max:255|email|unique:users',
            'password'       => 'required|string|min:6',

        ]);

        return User::create([
            'firstname'   => $request['firstname'],
            'lastname'    => $request['lastname'],
            'email'       => $request['email'],
            'type'        => 'candidat',
            'adresse'     => $request['adresse'],
            'phone'       => $request['phone'],
            'role'        => $request['role'],
            'password'    => Hash::make($request['password']),
        ]);

      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'firstname'      => 'required|string|max:255',
            'lastname'       => 'required|string|max:255',
            'adresse'        => 'required|string|max:255',
            'phone'          => 'required|string|max:255',
            'role'           => 'required',
            'email'          => 'required|string|max:255|email|unique:users,email,'.$user->id,
            'password'       => 'sometimes|min:6',

        ]);
         $user->update($request->all());
         return ['message' => 'has been updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }

 
    public function profile()
    {
        return Auth('api')->user();
    }   

}
