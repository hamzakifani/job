@extends('layouts.master')

@section('content')
    

<div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h3>Welcome</h3>
                <p>You are 30 seconds away from earning your own money!</p>
                <input type="submit" name="" value="Login"/><br/>
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Recruteur</a>
                    </li>
                </ul>


        <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="hidden" name="type" value="candidat">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Apply as a Employee</h3>
                        <div class="row register-form">
                        
                            <div class="col-md-6">

                                <div class="form-group">
                                    <input type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus placeholder="First  Name *"  />

                                    @if ($errors->has('firstname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                     @endif

                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus placeholder="Last Name *"  />

                                    @if ($errors->has('lastname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  required autofocus placeholder="Password *"  />

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif

                                </div>
                               
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Your Email *" />

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <input type="text" minlength="10" maxlength="10" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus placeholder="Your Phone *"  />

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif

                                </div>
                                <div class="form-group">
                                        <input type="text"  name="adresse" class="form-control{{ $errors->has('adresse') ? ' is-invalid' : '' }}" name="adresse" value="{{ old('adresse') }}" required autofocus placeholder="Your Adresse *"  />
    
                                        @if ($errors->has('adresse'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('adresse') }}</strong>
                                            </span>
                                        @endif
    
                                </div>  
                               
                                
                                <button type="submit" class="btnRegister"  value="Register"/>Register</button>
                                <a  href="register/facebook" class="btn btn-success">
                                    Register with facebook
                                </a>
                        
                            </div>
                        </div>
                    </div>

        </form>


        
                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="type" value="recruteur">

                        <h3  class="register-heading">Apply as a Recruteur</h3>
                        <div class="row register-form">
               
                                <div class="col-md-6">

                                        <div class="form-group">
                                            <input type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus placeholder="First  Name *"  />
        
                                            @if ($errors->has('firstname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('firstname') }}</strong>
                                                </span>
                                             @endif
        
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus placeholder="Last Name *"  />
        
                                            @if ($errors->has('lastname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('lastname') }}</strong>
                                                </span>
                                            @endif
        
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  required autofocus placeholder="Password *"  />
        
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
        
                                        </div>

                                        <div class="form-group">
                                                <input type="text"  name="company" class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" name="company" value="{{ old('company') }}" required autofocus placeholder="Your company *"  />
            
                                                @if ($errors->has('company'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('company') }}</strong>
                                                    </span>
                                                @endif
            
                                        </div>
                                       
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Your Email *" />
        
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
        
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus placeholder="Your Phone *"  />
        
                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
        
                                        </div>
                                        <div class="form-group">
                                                <input type="text"  name="adresse" class="form-control{{ $errors->has('adresse') ? ' is-invalid' : '' }}" name="adresse" value="{{ old('adresse') }}" required autofocus placeholder="Your Adresse *"  />
            
                                                @if ($errors->has('adresse'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('adresse') }}</strong>
                                                    </span>
                                                @endif
            
                                        </div>  
                                       
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                                <textarea type="text"  name="info" class="form-control{{ $errors->has('info') ? ' is-invalid' : '' }}"  required autofocus placeholder="Your discription *"  />{{ old('info') }}</textarea>
            
                                                @if ($errors->has('info'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('info') }}</strong>
                                                    </span>
                                                @endif
            
                                        </div>
                                    </div>

                                <button type="submit" class="btnRegister"  value="RegisterRec"/>Register</button>
                               
                            </div>
                        </div>
                    </div>
                </div>

            </form>

            </div>
        </div>

    </div>

@endsection
