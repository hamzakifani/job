@extends('layouts.master')

@section('content')


    <div class="unit-5 overlay" style="background-image: url('/site/images/hero_bg_2.jpg');">
      <div class="container text-center">
        <h2 class="mb-0">{{$user->company}}</h2>
        <p class="mb-0 unit-6"><a href="{{('/')}}">Home</a> <span class="sep">></span> <span>Job Item</span></p>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <h1 class="mt-5 mb-3 text-bold"> Qui  sommes-nous ? </h1>
                <p>La Société générale est une des principales banques françaises et une des plus anciennes. 
                    Elle fait partie des trois piliers 
                    industrie bancaire française non mutualiste avec Le Crédit lyonnais et BNP Paribas.</p>

            </div>
        </div>
    </div>


@endsection