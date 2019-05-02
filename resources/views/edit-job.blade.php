@extends('layouts.master')

@section('content')
    

    <div class="unit-5 overlay" style="background-image: url('/site/images/hero_bg_2.jpg');">
      <div class="container text-center">
        <h2 class="mb-0">Post a Job</h2>
        <p class="mb-0 unit-6"><a href="{{('/')}}">Home</a> <span class="sep">></span> <span>Post a Job</span></p>
      </div>
    </div>

    
    

    <div class="site-section bg-light">
      <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
       
           

          <div class="col-md-12 col-lg-8 mb-5">

          
            
          
            <form action="{{('/job/'.$job->id)}}" method="POST" class="p-5 bg-white">
                <input type="hidden" name="_method" value="PUT">

                {{ csrf_field() }}
              
             

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="title">Job Title</label>
                  <input type="text" id="title" value="{{$job->title}}" class="form-control" name="title" placeholder="eg. Full Stack Frontend">
                </div>
              </div>

            

              <div class="row form-group mb-3">
                  <div class="col-md-12 mb-5 mb-md-0">
                    <label class="font-weight-bold" for="prix">Prix</label>
                    <input type="text" id="prix" class="form-control" value="{{$job->prix}}" name="prix" placeholder="3000 DH">
                  </div>
              </div>              

              <div class="row form-group">
                <div class="col-md-12"><h3>Job Type</h3></div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <label for="option-job-type-1">
                    <input type="radio" id="option-job-type-1" 
                    @if ($job->type==='FullTime')
                         checked="checked"
                    @endif name="type" value="FullTime" > Full Time
                  </label>
                </div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <label for="option-job-type-2">
                    <input type="radio" id="option-job-type-2" 
                    @if ($job->type==='PartTime')
                         checked="checked"
                    @endif
                    name="type"  value="PartTime"> Part Time
                  </label>
                </div>

                <div class="col-md-12 mb-3 mb-md-0">
                  <label for="option-job-type-3">
                    <input type="radio" id="option-job-type-3" 
                    @if ($job->type==='Freelance')
                         checked="checked"
                    @endif
                    name="type"  value="Freelance"> Freelance
                </div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <label for="option-job-type-4">
                    <input type="radio" id="option-job-type-4" 
                    @if ($job->type==='Internship')
                        checked="checked"
                    @endif
                    name="type"  value="Internship"> Internship
                  </label>
                </div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <label for="option-job-type-4">
                    <input type="radio" id="option-job-type-4" 
                    @if ($job->type==='Termporary')
                        checked="checked"
                    @endif
                    name="type"  value="Termporary"> Termporary
                  </label>
                </div>

              </div>

              <div class="row form-group mb-4">
                <div class="col-md-12"><h3>Location</h3></div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <input type="text" class="form-control" value="{{$job->location}}" name="Location" placeholder="New York City">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12"><h3>Job Description</h3></div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <textarea name="discription" class="form-control"  id="discription" cols="30" rows="5">{{$job->discription}}</textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <button type="submit" value="submit" class="btn btn-primary  py-2 px-5">Update</button>
                </div>
              </div>

  
            </form>
          </div>

          
        </div>
      </div>
    </div>

   


    



@endsection
  