<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Job;
use App\Contact;
use App\User;
use App\Recruteur;
use App\Subscribe;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index','showjob','showCompany','showuser',
        'Showjobs','subscribe','contact');

    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = new User();

        $Recruteur = new Recruteur();

        

        $jobs = DB::table('jobs')->where('status',1)->paginate(10);
        return view('index', compact('jobs','Recruteur'));
    }

    public function showjob($id)
    {
    $job = new Job();
    $Recruteur = new Recruteur();

    $job = Job::find($id);
    $user = DB::table('users')->join('jobs', 'users.id', '=', 'jobs.user_id')
                ->join('recruteurs', 'users.id', '=', 'recruteurs.user_id')
                 ->first();
 

    return view('job-single', compact('job', 'user'));
    }
  
    public function editprofile($id)
    {
        
        
        $user = DB::table('users')->where('id', Auth::user()->id)->first();
		return view('profile', compact('user'));
    }

    public function updateprofile(request $request , $id)
    {
        $user = User::find($id);

        $recruteur = $user->recruteur;
       
            $user->update([
                'firstname'       => $request->input('firstname'),
                'lastname'        => $request->input('lastname'),
                'email'           => $request->input('email'),
                'adresse'         => $request->input('adresse'),
                'phone'           => $request->input('phone'),
                'password'        => $request->input('password'),

                ]);

            $recruteur->update([
                    'info'           => $request->input('info'),
                    'company'        => $request->input('company'),
                    
    
                ]);


        

        return redirect()->back()->with('status','Your Information Has been Updated');
    }


    public function showCompany($name)
    {
        $user = DB::table('recruteurs')->where('company', $name)->first();
		return view('company', compact('user'));
    }


    public function showuser()
    {
        $users = User::all();
        $jobs  = Job::all();
		return view('search', compact('users','jobs'));
    }



    //--------------------------------------------
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
    $job->user_id        = Auth::user()->id;

    $job->save(); 
    
    return Response()->json(['etat' => true  , 'id' => $job->id]);

   }

public function getprofile($id)
{
    $user = User::find($id);
    $recruteur = $user->recruteur;

    $user = DB::table('users')->where('id', Auth::user()->id)->first();

    return json_encode(['user'  => $user, 'recruteur'  => $recruteur ]);

}

public function upprofile(request $request)
{
    $user = User::find($request->id);
    

    $user->update([
        'firstname'       => $request->input('firstname'),
        'lastname'        => $request->input('lastname'),
        'email'           => $request->input('email'),
        'adresse'         => $request->input('adresse'),
        'phone'           => $request->input('phone'),
        'password'        => $request->input('password'),

        ]);



    return response()->json(['message'=>'ok'],200);
 }



 public function upprofileRec(request $request)
{
    $data = $request->all();
    
    $user = User::find($data['user']['id']);
    $recruteur = $user->recruteur;

    $user->update($data['user']);

    $recruteur->update($data['recruteur']);

    return response()->json(['message'=>'ok'],200);
 }

//--------------------------------------------
public function subscribe(request $request)
    {

    $Subscribe = new Subscribe();

    $Subscribe->email  = $request->input('email');
    $Subscribe->save(); 
    
    return Response()->json(['etat' => true]);
}
   

    public function contact(request $request)
    {

    // $data = $request->all();
    $contact = new Contact();

    $contact->name            = $request->input('name');
    $contact->email           = $request->input('email');
    $contact->subject         = $request->input('subject');
    $contact->message         = $request->input('message');

    $contact->save(); 
    
    return Response()->json(['etat' => true]);

   }
}

