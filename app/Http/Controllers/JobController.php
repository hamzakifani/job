<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Job;
use Auth;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create(Job $job)
    {

        $this->authorize('create', $job);
        return view('new-job');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = new Job();

        $job->title         = $request->input('title');
        $job->location      = $request->input('Location');
        $job->prix          = $request->input('prix');
        $job->type          = $request->input('type');
        $job->discription   = $request->input('discription');
        

        $job->user_id = Auth::user()->id;

        $job->save(); 
        return redirect('/')->with('status','This Job has been addedd');
                

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        $user = User::find($job->user_id);
        return view('edit-job', compact('job','user'));

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
        $job = Job::find($id);
        $job->title         = $request->input('title');
        $job->location      = $request->input('Location');
        $job->prix          = $request->input('prix');
        $job->type          = $request->input('type');

        $job->save();
        
        return redirect()->back()->with('status','Your Job Has been Updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function Jobshow($name)
    {
        $job = new Job();
        $user = DB::table('users')->join('jobs', 'users.id', '=', 'jobs.user_id')
                ->join('recruteurs', 'users.id', '=', 'recruteurs.user_id')
                 ->first();
        $jobs = DB::table('jobs')->where('type',$name)->paginate(5);
        return view('category', compact('jobs','user'));

    }

    public function mesjobs($id , Job $job)
    {
        $this->authorize('view', $job);
        $user = User::find($id);
        $jobs = DB::table('jobs')->where('user_id', $id)->paginate(10);
        return view('job', compact('jobs','user'));
    }

//---------------------------------------------------------------------
// All function of job - create-edit-update-delete with Vue js and axios
//---------------------------------------------------------------------

public function alljobs($id)
{
    $user = User::find($id);
    $jobs = DB::table('jobs')->where('user_id', $id)->get();
    return json_encode([
        
                        'user'    => $user, 
                        'jobs'    => $jobs
                        
                        ]);
}
   
public function updatejob(request $request)
{
    $job = Job::find($request->id);

    $job->title          = $request->input('title');
    $job->prix           = $request->input('prix');
    $job->location       = $request->input('location');
    $job->type           = $request->input('type');
    $job->discription    = $request->input('discription');
    $job->status         = 1;
    $job->user_id       = Auth::user()->id;

    $job->save(); 
    
    return Response()->json(['etat' => true]);

}

}
