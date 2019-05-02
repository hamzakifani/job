<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Job;
use App\User;
use App\Admin;
use Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //--------------------------------------------------------\\

    public function index()
    {

        $countjobs      = DB::table('jobs')->count();
        $countusers     = DB::table('users')->count();
        $countemplois   = DB::table('emplois')->count();
        $pendingjobs    = DB::table('jobs')->where('status','0')->count();



        return view('admin.dashboard',compact('countjobs','countusers','countemplois','pendingjobs'));
    }

//--------------------------------------------------------\\
//ALL ROUTE OF SHOW- EDIT- UPDATE-DESTROY --> USERS
//--------------------------------------------------------\\

     public function readusers()
    {
        $users = DB::table('users')->orderBy('id','DESC')->paginate('5');
        return view('admin.list-users', compact('users')); 
     }

//--------------------------------------------------------\\

    public function editusers($id)
    {
        $user = new User();
        $user =  User::find($id);

        return view('admin.edit-user', compact('user'));
    }
//--------------------------------------------------------\\


   

//--------------------------------------------------------\\
// function readjobs
//--------------------------------------------------------\\

    public function readjobs()
    {
        $jobs = DB::table('jobs')->orderBy('id','DESC')->paginate('10');
        return view('admin.list-job', compact('jobs'));
    }
//--------------------------------------------------------\\

//--------------------------------------------------------\\

    public function updatejobs(request $request , $id)
    {
        $job =  Job::find($id);

        $job->title              = $request->input('title');
        $job->type               = $request->input('type');
        $job->location           = $request->input('location');
        $job->prix               = $request->input('prix');
        $job->discription        = $request->input('discription');

        $job->save();

         return redirect()->back()->with('status','has been Updated successfell');
    }

//--------------------------------------------------------\\

    public function Showemplois()
    {
        $emplois = DB::table('emplois')->orderBy('id','DESC')->paginate('10');
        return view('admin.list-job', compact('emplois'));
    }

//--------------------------------------------------------\\

public function Showpendingjobs()
{
    $countjobs      = DB::table('jobs')->where('status','0')->count();
    $jobs = DB::table('jobs')->orderBy('id','DESC')->where('status','0')->paginate('10');
    return view('admin.pending-job', compact('jobs','countjobs'));
}

//--------------------------------------------------------\\

public function updatePendingJob(request $request , $id)
{
    $job =  Job::find($id);

        $job->status  = 1;
        $job->save();

         return redirect('/admin/listjob')->with('status','This Job has been Active ');

}
//--------------------------------------------------------\\

    public function createJob()
    {
        return view('admin.new-job');
    }


    public function storejob(Request $request)
    {
        $job = new Job();
        $admin = new Admin();

        $job->title              = $request->input('title');
        $job->type               = $request->input('type');
        $job->location           = $request->input('location');
        $job->prix               = $request->input('prix');
        $job->discription        = $request->input('discription');
        $job->status             = 1;
        $job->user_id            = Auth::user()->id;

        $job->save();
         return redirect('/admin/listjob')->with('status','has been Updated successfell');
    }

//--------------------------------------------------------\\
//ALL ROUTE OF axios --> USERS
//--------------------------------------------------------\\

    public function Showusers()
    {
        $users = User::all();
        return json_encode($users);
    }

    public function addusers(request $request)
    {
        $user = new User();

        $user->firstname    = $request->input('firstname');
        $user->lastname     = $request->input('lastname');
        $user->password     = Hash::make($request->input('password'));
        $user->email        = $request->input('email');
        $user->type         = $request->input('type');
        $user->phone        = $request->input('phone');
        $user->adresse      = $request->input('adresse');
        

        $user->save(); 
        
        return Response()->json(['etat' => true  , 'id' => $user->id]);

    }


    public function upusers(request $request)
    {
        $user = User::find($request->id);

        $user->firstname    = $request->input('firstname');
        $user->lastname     = $request->input('lastname');
        $user->password     = Hash::make($request->input('password'));
        $user->email        = $request->input('email');
        $user->type         = $request->input('type');
        $user->phone        = $request->input('phone');
        $user->adresse      = $request->input('adresse');
        

        $user->save(); 
        
        return Response()->json(['etat' => true]);

    }

    public function delusers($id){

        $user = User::find($id);
        $user->delete();
        return Response()->json(['etat' => true]);


    }


//--------------------------------------------------------\\
//ALL ROUTE OF axios --> Jobs
//--------------------------------------------------------\\

public function Showjobs()
{
    $jobs = Job::all();
    return json_encode($jobs);
}

public function addjobs(request $request)
{
    $job = new Job();

    $job->title          = $request->input('title');
    $job->prix           = $request->input('prix');
    $job->location       = $request->input('location');
    $job->type           = $request->input('type');
    $job->discription    = $request->input('discription');
    $job->status         = 1;
    $job->admin_id       = Auth::user()->id;

    $job->save(); 
    
    return Response()->json(['etat' => true  , 'id' => $job->id]);

}


public function upjobs(request $request)
{
    $job = Job::find($request->id);

    $job->title          = $request->input('title');
    $job->prix           = $request->input('prix');
    $job->location       = $request->input('location');
    $job->type           = $request->input('type');
    $job->discription    = $request->input('discription');
    $job->status         = 1;
    $job->admin_id       = Auth::user()->id;

    $job->save(); 
    
    return Response()->json(['etat' => true]);

}

    public function deljobs($id){

        $job = Job::find($id);
        $job->delete();
        return Response()->json(['etat' => true]);


    }


//--------------------------------------------------------\\

public function subscribe()
{
    $subs = DB::table('subscribes')->orderBy('id','DESC')->paginate('5');
    return view('admin.subscribe', compact('subs')); 
 }

 public function contact()
{
    $contacts = DB::table('contacts')->orderBy('id','DESC')->paginate('5');
    return view('admin.message', compact('contacts')); 
 }


}
