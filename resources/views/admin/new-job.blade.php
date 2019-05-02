@extends('layouts.admin')

@section('content')

  <div class="content-wrapper">

    <section class="content">
      <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-4">


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
                <h3 class="card-level">Create New Job</h3>
              </div>

           <form action="{{ url('admin/newjob') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                <div class="card-body">

                   
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" >
                    </div>

                    <div class=" form-group">
                            <label for="">Type</label>
                            <select class="form-control" name="type">
                                    <option value="FullTime"> 
                                        Full Time
                                    </option>

                              <label for="option-job-type-2">
                                    <option value="PartTime">
                                        Part Time
                                    </option>
                              </label>
                            
            
                              <label for="option-job-type-3">
                                    <option value="Freelance" >
                                        Freelance
                                    </option>
                              </label>
                            
                              <label for="option-job-type-4">
                                    <option value="Internship">
                                        Internship
                                    </option>
                              </label>

                     
                              <label for="option-job-type-4">
                                    <option value="Termporary" >
                                        Termporary
                                    </option>
                              </label>
                          
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Location</label>
                        <input type="text" name="location" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="">Prix</label>
                        <input type="text" name="prix" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Discription</label>
                        <textarea type="text" name="discription" class="form-control" ></textarea>
                    </div>


                
                </div>
                <div class="card-footer">
                    <button type="submit"value="enregistrer" class="form-control btn btn-primary">Enregistrer</button>
                </div>
                </form>
            </div>

            </div>
        </div>
    </div>

</section>
    
</div>

@endsection