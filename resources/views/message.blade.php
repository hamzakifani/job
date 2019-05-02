@extends('layouts.master')

@section('content')

<div class="unit-5 overlay" style="background-image: url('/site/images/hero_bg_2.jpg');">
  <div class="container text-center">
    <h2 class="mb-0">Mes Messages</h2>
    <p class="mb-0 unit-6"><a href="{{('/')}}">Home</a> <span class="sep">></span> <span>Mes Messages</span></p>
  </div>
</div>

<div class="site-section bg-light">
    <div class="container">
      <div class="row justify-content-start text-left mb-5">
        <div class="col-md-9" data-aos="fade">
          <h2 class="font-weight-bold text-black">Recent Messages</h2>
        </div>
        
      </div>

      @foreach ($jobs as $job)
          
     
      <div class="row" data-aos="fade">
       <div class="col-md-12">

         <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

            <div class="mb-4 mb-md-0 mr-5">
             <div class="job-post-item-header d-flex align-items-center">
               <h2 class="mr-3 text-black h4">{{ $job->title }}</h2>
               <div class="badge-wrap">

              @if ($job->type=='FullTime')
                <span class=" bg-primary text-white badge py-2 px-4">{{ $job->type }}</span>
            
              @elseif ($job->type=='Termporary')
                <span class=" bg-success text-white badge py-2 px-4">{{ $job->type }}</span>

              @elseif ($job->type=='PartTime')
                <span class=" bg-warning text-white badge py-2 px-4">{{ $job->type }}</span>

              @elseif ($job->type=='Freelance')
                <span class=" bg-secondary text-white badge py-2 px-4">{{ $job->type }}</span>

              @elseif ($job->type=='Internship')
                <span class=" bg-danger text-white badge py-2 px-4">{{ $job->type }}</span>
                
              @endif

              
                </div>
             </div>
             <div class="job-post-item-body d-block d-md-flex">
               <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> <a href="#">{{$job->company}}</a></div>
               <div><span class="fl-bigmug-line-big104"></span> <span>{{$job->location}}</span></div>
             </div>
            </div>

            <div class="ml-auto">
              <a href="{{('/message/'. $job->id)}}" class="btn btn-danger py-2" style="width:60px;"><i class="fas fa-envelope"></i>  {{$job->emplois->count()}}</a>
            </div>
         </div>

       </div>
      </div>

  @endforeach

      <div class="row mt-5">
        <div class="col-md-12 text-center">
          <div class="site-block-27">
            <ul>
                {{ $lnk->links()}}
            </ul>
          </div>
        </div>
      </div>


    </div>
  </div> 
@endsection