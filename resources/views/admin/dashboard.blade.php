@extends('layouts.admin')

@section('content')

<div class="content-wrapper" id="app">
    <section class="content">
        <div class="container home-stats text-center">
	        <div class="row mt-4">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                         <div class="inner">
                             <h3>{{$countjobs}}</h3>
                             <p>All Jobs</p>
                        </div>
                         <div class="icon">
                             <i class="ion ion-bag"></i>
                        </div>
                            <a href="{{('/admin/listjob')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$countusers}}</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{('/admin/listusers')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$countemplois}}</h3>

                        <p>Demmande emploi</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$pendingjobs}}</h3>

                        <p>Jobs Not Approved</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{('/admin/pending-jobs')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
			</div>
		</div>


		<div class="container mt-5">
			<div class="row">
				<div class="col-md-6">
                    <div class="card">
                        <div class="card-header"> 	
                            <i class="fa fa-users"></i>  Latest 5 Registred Users
                        </div>
                        <div class="card-body">

							<div class="last" v-for="user in users">
							    <ul class="todo-list"> 
                                  <li>
                                        <span class="text">@{{user.firstname}}</span>
                                  </li>
							    </ul>
                              
                                <hr>
                            </div>
                </div>
            </div>
        </div>

				<div class="col-md-6">
                    <div class="card">		
                        <div class="card-header">					  		
                            <i class="fa fa-users"></i>  Latest 5 Registred jobs
                        </div>
                        <div class="card-body">
                            
                            <div class="last" v-for="job in jobs">
								<ul class="todo-list">
                                    <li>
									<span class="text">@{{job.title}}</span>
                                    </li>
                                </ul>
                              
                                <hr>
                            </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 </div>

@endsection


@section('javascript')



<script>
        window.laravel = {!! json_encode([
        'crsfToken' => csrf_token(),
        'url'       => url('/')
        ]) !!};
</script>

<script>

	new Vue({
		el: '#app',
		data: {
            users:[],
            jobs:[]
          
        },
		methods: {
            showusers: function(){
                axios.get(window.laravel.url+'/admin/Showusers/')
                   .then(response => {
                        this.users = response.data;

                        })
                    .catch(error => {
                    console.log('errors : ',error);
                         })
                },
                
            Showjobs: function(){
                axios.get(window.laravel.url+'/admin/Showjobs/')
                    .then(response => {
                        this.jobs = response.data;

                        })
                    .catch(error => {
                    console.log('errors : ',error);
                            })
                },
            
			},
            mounted: function() {
                this.showusers(),
                this.Showjobs()
                }
		


	});

</script>

@endsection