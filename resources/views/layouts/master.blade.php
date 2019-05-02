<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>Jobstart &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="{{ asset('site/fonts/icomoon/style.css') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">


    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/animate.css') }}">
    
    
    <link rel="stylesheet" href="{{ asset('site/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/fl-bigmug-line.css') }}">
  
    <link rel="stylesheet" href="{{ asset('site/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">


    <!-- Scripts -->

  

  </head>


  <body>

  <div class="site-wrap" >

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <header class="site-navbar py-1" role="banner">
      
       
      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0"><a href="{{('/')}}" class="text-black h2 mb-0">Job<strong>start</strong></a></h1>
          </div>

          <div class="col-10 col-xl-7 d-none d-xl-block">
            <nav class="site-navigation text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="{{('/')}}">@lang('master.Home')</a></li>
                <li class="has-children">
                  @lang('master.Category')
                  <ul class="dropdown">
                    <li><a href="{{('/category/FullTime')}}">Full Time</a></li>
                    <li><a href="{{('/category/PartTime')}}">Part Time</a></li>
                    <li><a href="{{('/category/Freelance')}}">Freelance</a></li>
                    <li><a href="{{('/category/Internship')}}">Internship</a></li>
                    <li><a href="{{('/category/Termporary')}}">Termporary</a></li>
                  </ul>
                </li>
                <li><a href="{{('/blog')}}">@lang('master.Blog')</a></li>
                <li><a href="{{('/about')}}">@lang('master.About')</a></li>
                <li><a href="{{('/contact')}}">@lang('master.Contact')</a></li>
               
                  @auth
                      
                
                    <li class="has-children">
                      <a href="#"><span class="rounded bg-primary py-2 px-3 text-white"><span class="h5 mr-2"></span> {{auth::user()->firstname}}</span></a>
                      <ul class="dropdown">
                        <li><a href="{{('/profile/'.Auth::user()->id.'/edit')}}">My Profil</a></li>
                        <li><a href="{{('/profile/'.Auth::user()->id.'/job')}}">Mes Jobs</a></li>
                        <li><a href="{{('/message')}}">Mes Messages</a></li>

                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                       </a></li>

                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>

                      </ul>
                    
                    </li>

                    @endauth

                  @guest
                  <a href="{{ route('login') }}"><span class="rounded bg-primary py-2 px-3 text-white"><span class="h5 mr-2"></span> @lang('master.Login') </span></a>    
                  <a href="{{ route('register') }}"><span class="rounded bg-primary py-2 px-3 text-white"><span class="h5 mr-2"></span> @lang('master.Register') </span></a>    

                  @endguest
                </li>
              

              </ul>
            </nav>
          </div>

          <div class="col-10 col-xl-3 d-none d-xl-block">
              <nav class="site-navigation text-right" role="navigation">
                <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                  <li>
                    <img style="width: 23px;cursor: pointer;" src="{{ asset('assets/img/english.jpg') }}">
                    <a href="locale/en" style="font-weight: 600;">Anglais</a>
                    &nbsp|&nbsp;
                  </li>
  
                  <li>
                    <img style="width: 23px;cursor: pointer;" src="{{ asset('assets/img/frensh.png') }}">
                    <a href="locale/fr" style="font-weight: 600;">Français</a>
                  </li>
                </ul>
              </nav>
            </div>

          <div class="col-6 col-xl-2 text-right d-block">
            
            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      
    </header>


        @yield('content')  



    




<script src="{{ asset('site/js/vue.js') }}" ></script>
    
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script src="{{ asset('site/js/axios.js') }}"></script>

  

<script src="{{ asset('site/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('site/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('site/js/jquery-ui.js') }}"></script>
<script src="{{ asset('site/js/popper.min.js') }}"></script>
<script src="{{ asset('site/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('site/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('site/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('site/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('site/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('site/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('site/js/aos.js') }}"></script>

<script src="{{ asset('site/js/main.js') }}"></script>


 
@yield('javascript')


<script type="text/javascript" src="{{ mix('/js/app.js') }}" ></script>
      
    </body>
</html>