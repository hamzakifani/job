@extends('layouts.admin')

@section('content')


  <div class="content-wrapper">
    <section class="content">
     <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                
    @if($countjobs)
                <div class="card">
                <div class="card card-header">
                 <h3> La liste des Jobs Not Active</h3>
                 </div>
                
            
               <div class="card card-body">
                <table class="table table-bordered table-striped ">

                    <thead>
                            <tr>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Prix</th>
                                    <th>Location</th>
                                    <th>status</th>
                                    <th>actions</th>
        
                                </tr>
                    </thead>
                    <tbody>
                    @foreach( $jobs as $job)
                    <tr>
                            <td>{{$job->title}}</td>
                            <td>{{$job->type}}</td>
                            <td>{{$job->prix}}</td>
                            <td>{{$job->location}}</td>

                            <td><span class="badge badge-warning">Pending</span></td>

                        <td>
                            <form action="{{ url('admin/pending-jobs/'.$job->id) }}" method="post">

                                <input type="hidden" name="_method" value="PUT">
                               {{ csrf_field() }}
                                <button type="submit" value="modifier"  class="btn btn-success"><i class="fas fa-check"></i></button>

                            </form>
                              

                        </td>
                    </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
    
            <div class="row">
            <div class="col-md-2">
                    <a href="invoice-print.html" target="_blank" class="btn btn-default mt-4"><i class="fa fa-print"></i> Print</a>
            </div>
            <div class="col-md-10 mt-4  d-flex justify-content-center">     
               {{ $jobs->links()}}
            </div>
        </div>
        @else 
            <div class="row justify-content-center mt-5">
                <div class="col-md-8 alert alert-warning text-center">
                    <h3> there are no inactive jobs now </h3>
                </div>
            </div>
          

        @endif

            </div>
            </div>
        </div>   
    </div>
  </section>
</div>

@endsection