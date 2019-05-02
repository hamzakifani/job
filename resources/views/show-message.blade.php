@extends('layouts.master')

@section('content')

<div class="unit-5 overlay" style="background-image: url('/site/images/hero_bg_2.jpg');">
  <div class="container text-center">
    <h2 class="mb-0">Mes Messages</h2>
    <p class="mb-0 unit-6"><a href="{{('/')}}">Home</a> <span class="sep">></span> <span>Mes Messages</span></p>
  </div>
</div>


@if ($msgs->count())
    

<div class="site-section bg-light">
    <div class="container">
      <div class="row justify-content-start text-left mb-5">
        <div class="col-md-9" data-aos="fade">
          <h2 class="font-weight-bold text-black">Recent Messages</h2>
        </div>
       
      </div>

 



      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Job</th>
            <th scope="col">Condidat</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Email</th>



          </tr>
        </thead>
        <tbody>
      @foreach ($msgs as $msg )
          
          <tr>
            <th scope="row">1</th>
            <td>{{ $msg->title }}</td>
            <td>{{ $msg->nom }}</td>
            <td>{{ $msg->phone }}</td>
            <td>{{ $msg->email }}</td>



      
<!--modal of show Profil condidat-->

            <td><a type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Show</a></td>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Mr {{$msg->nom }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                              <h1 class="font-weight-bold text-center" for="name">{{$msg->nom }}</h1>
                            
                        <hr>


                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div> 

<!--  end modal of show Profil condidat-->

          </tr>
@endforeach  


        </tbody>
      </table>

      <div class="row mt-5">
        <div class="col-md-12 text-center">
          <div class="site-block-27">
            <ul>

            </ul>
          </div>
        </div>
      </div>


    </div>
  </div> 


  @else
<div class="row justify-content-center mt-5">
    <div class="col-md-8 alert alert-warning text-center">
          <span> No Message Exist</span>
    </div>
</div>
      
  

  @endif

@endsection

