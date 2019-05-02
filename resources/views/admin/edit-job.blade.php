@extends('layouts.admin')


@section('content')

  <div class="content-wrapper">
    <section class="content">
      <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-4">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if(count($errors))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>
                    </div>

                @endif

                <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-level">Edit This Job</h3>
              </div>

                <form action="{{ url('admin/jobs/'.$job->id) }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">

                    {{ csrf_field() }}

                <div class="card-body">

                   <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $job->title }}">
                    </div>

                    <div class=" form-group">
                            <label for="">Type</label>
                            <select class="form-control" name="type">
                                    <option  @if ($job->type==='FullTime')
                                            selected
                                            @endif
                                         value="FullTime"> 
                                        Full Time
                                    </option>

                              <label for="option-job-type-2">
                                    <option  id="option-job-type-2" 
                                        @if ($job->type==='PartTime')
                                        selected
                                          value="PartTime"
                                        @endif >
                                        Part Time
                                    </option>
                              </label>
                            
            
                              <label for="option-job-type-3">
                                    <option  id="option-job-type-3" 
                                        @if ($job->type==='Freelance')
                                            selected
                                              value="Freelance"
                                        @endif >
                                        Freelance
                                    </option>
                              </label>
                            
                              <label for="option-job-type-4">
                                    <option id="option-job-type-4" 
                                        @if ($job->type==='Internship')
                                            selected
                                             value="Internship"
                                        @endif >
                                        Internship
                                    </option>
                              </label>

                     
                              <label for="option-job-type-4">
                                    <option id="option-job-type-4" 
                                        @if ($job->type==='Termporary')
                                            selected 
                                            value="Termporary" 
                                        @endif >
                                        Termporary
                                    </option>
                              </label>
                          
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Location</label>
                        <input type="text" name="location" class="form-control" value="{{ $job->location }}">
                    </div>

                    <div class="form-group">
                        <label for="">Prix</label>
                        <input type="text" name="prix" class="form-control" value="{{ $job->prix }}">
                    </div>

                    <div class="form-group">
                        <label for="">Discription</label>
                        <textarea type="text" name="discription" class="form-control" >{{ $job->discription }}</textarea>
                    </div>
                   
                </div>
                
                <div class="card-footer">    
                    <button type="submit"value="modifier" class="form-control btn btn-danger">Modifer</button>
                </div>
                </form>
            </div>

            </div>
        </div>
    </div>
</section>
</div>

@endsection