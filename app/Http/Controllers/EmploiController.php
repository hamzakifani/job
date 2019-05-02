<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Emploi;
use App\User;
use App\Job;
use Auth;
class EmploiController extends Controller
{

    
   
    public function create($id){
        
        $job = new Job();
        $job = DB::table('jobs')->where('id', $id)->first();
        $user = DB::table('users')->join('jobs', 'users.id', '=', 'jobs.user_id')->first();



        return view('postuler',compact('job'));
    }


    public function store(Request $request,  $id)
    {
        $emploi = new Emploi();
        $job = new Job();

        $job->id = $id;


        $emploi->nom        = $request->input('name');
        $emploi->email      = $request->input('email');
        $emploi->phone      = $request->input('phone');
        $emploi->motivation = $request->input('motivation');
        $emploi->job_id     = $id;
        $emploi->save(); 
        return redirect('/job/{id}/postuler')->with('status','Your Demmande  has been envoi');
                

    }


    public function edit(){
        
    }
    
    public function update(){
           
    }
       
    public function destroy(){
           
    }

    public function message(Emploi $emploi)
    {
        $this->authorize('view', $emploi);

        $jobs = Job::all();

        $lnk = DB::table('jobs')->where('user_id', Auth::user()->id)->paginate(10);
                  
 
        return view('message', compact('jobs','lnk'));
    }

    public function Showmessage(Emploi $emploi , $id)
    {
        $this->authorize('view', $emploi);

        $msgs = DB::table('emplois')
        ->join('jobs', 'emplois.job_id', '=', 'jobs.id')
        ->where('job_id', $id)->get();

        return view('show-message', compact('msgs'));
    }
}
