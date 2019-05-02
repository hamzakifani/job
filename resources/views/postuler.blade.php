@extends('layouts.master')

@section('content')
    

    <div class="unit-5 overlay" style="background-image: url('/site/images/hero_bg_2.jpg');">
      <div class="container text-center">
        <h2 class="mb-0">{{$job->title}} </h2>
        <p class="mb-0 unit-6"><a href="{{('/')}}">Home</a> <span class="sep">></span> <span>Postuler a Job</span></p>
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
          
            
          
            <form action="{{('/job/'.$job->id.'/postuler')}}" method="POST" class="p-5 bg-white">
              @csrf
              
             
              <h2 class="mb-5">Envoyer un mail / CV au recruteur </h2>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="name">Votre nom / prénom :</label>
                  <input type="text" id="name" class="form-control" name="name" placeholder="your name">
                </div>
              </div>

              <div class="row form-group mb-3">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="email">Votre adresse mail</label>
                  <input type="text" id="email" class="form-control" name="email" placeholder="yourname@mail.com">
                </div>
              </div>

              <div class="row form-group mb-3">
                  <div class="col-md-12 mb-5 mb-md-0">
                    <label class="font-weight-bold" for="phone">Téléphone</label>
                    <input type="text" id="phone" class="form-control" name="phone" placeholder="your Phone">
                  </div>
              </div>              


              <div class="row form-group">
                <div class="col-md-12"><h3>Motivation</h3></div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <textarea name="motivation" class="form-control" id="motivation" cols="30" rows="5"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <button type="submit" value="submit" class="btn btn-primary  py-2 px-5">Postuler</button>
                </div>
              </div>

  
            </form>
          </div>

          
        </div>
      </div>
    </div>

   




@endsection
  