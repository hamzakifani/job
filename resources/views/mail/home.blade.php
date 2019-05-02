@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Test Email</div>

                <div class="card-body">
                    @if (session::has('success'))
                           <div class="alert alert-success">
                               <b>Your Message has been sent</b>
                           </div>
                    @endif
                    
                    <form method="POST" action="{{('/send/email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="subject" class="col-md-4 col-form-label text-md-right">Subject</label>

                            <div class="col-md-6">
                                <input id="subject" type="subject" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject" value="{{ old('subject') }}"  autofocus>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">Message</label>

                            <div class="col-md-6">
                                <textarea class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" id="" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Send
                                </button>
                            </div>
                        </div>
                       
                   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


    $(".btn-refresh").click(function(){
      $.ajax({
         type:'GET',
         url:'/refresh_captcha',
         success:function(data){
            $(".captcha span").html(data.captcha);
         }
      });
    });
    
    
    </script>
@endsection
