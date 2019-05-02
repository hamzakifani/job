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
                <h3 class="card-level">Edit This user</h3>
              </div>

                <form action="{{ url('admin/users/'.$user->id) }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">

                    {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" name="firstname" class="form-control" value="{{ $user->firstname }}">
                    </div>

                    <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" name="lastname" class="form-control" value="{{ $user->lastname }}">
                    </div>
    
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                    </div>

                    
                    <div class="form-group">
                            <label for="">Adresse</label>
                            <input type="text" name="adresse" class="form-control" value="{{ $user->adresse }}">
                        </div>

                        
                    <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                        </div>

                     <div class="form-group">
                        <label for="">Password</label>
                        
                        <input type="password" name="password" class="form-control">
                        
                    </div>
                </div>
                    
                 <div class="card-footer">   
                    <button type="submit" value="modifier" class="form-control btn btn-danger">Modifer</button>
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>
  </section>
</div>

@endsection

