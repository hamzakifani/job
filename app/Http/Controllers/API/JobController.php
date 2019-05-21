<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return  Job::latest()->get();
 
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
            'title'          => 'required|string|max:255',
            'location'       => 'required|string|max:255',
            'discription'    => 'required|string|min:20',
            'prix'           => 'required|string|max:255',
            'type'           => 'required|string|max:255',

        ]);

        return Job::create([
            'title'         => $request['title'],
            'location'      => $request['location'],
            'discription'   => $request['discription'],
            'prix'          => $request['prix'],
            'type'          => $request['type'],
            'user_id'       => Auth::user()

            
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
        $job = Job::findOrFail($id);

        $this->validate($request, [
            'title'          => 'required|string|max:255',
            'location'       => 'required|string|max:255',
            'discription'    => 'required|string|min:20',
            'prix'           => 'required|string|max:255',
            'type'           => 'required|string|max:255',

        ]);

         $job->update($request->all());
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
        $job = Job::findOrFail($id);
        $job->delete();
    }
}
