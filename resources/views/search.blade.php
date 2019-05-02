@extends('layouts.app')
@section('content')

<div class="container" id="app">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Start typing in textbox below for suggestions!</div>
                <div class="panel-body">
                     <autocomplete></autocomplete>
                </div>

                <ul>
                    @foreach ($users as $user)
                        
                    
                    <li>{{$user->firstname}}</li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection