@extends('layouts.admin')

@section('content')


  <div class="content-wrapper" id="app">
    <section class="content">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="float-right mt-4 mb-2 mr-3">
                        
                        <button class="btn btn-primary mb-2"><i class="fa fa-download"></i> Export Excel</button>
                        <button class="btn btn-success mb-2" @click="openvide"><i class="fas fa-user-plus"></i> New Job </button>

                </div>

            </div>
        </div>
<div class="row"  v-if="open">
    <div class="col-md-12">
        <div class="row form-group">
            <div class="col-md-6">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control"  v-model="job.title">
            </div>

            <div class="col-md-6">
                <label for="">Prix</label>
                <input type="text" name="prix" class="form-control" v-model="job.prix">
            </div>
        </div>
        
        <div class="row form-group">

            <div class="col-md-6">
                    <label for="">location</label>
                    <input type="text" name="location" class="form-control" v-model="job.location">
            </div>
        
            <div class="col-md-6">
                <label for="">Type</label>
                    <select class="form-control" name="type" v-model="job.type">
                            <option value="FullTime"> 
                                Full Time
                            </option>

                      <label for="option-job-type-2">
                            <option value="PartTime">
                                Part Time
                            </option>
                      </label>
                    
    
                      <label for="option-job-type-3">
                            <option value="Freelance" >
                                Freelance
                            </option>
                      </label>
                    
                      <label for="option-job-type-4">
                            <option value="Internship">
                                Internship
                            </option>
                      </label>

             
                      <label for="option-job-type-4">
                            <option value="Termporary" >
                                Termporary
                            </option>
                      </label>
                  
                </select>
            </div>

        </div>

    
        <div class="row form-group">
            <div class="col-md-12">
                <label for="">Discription</label>
                <textarea type="text" name="discription" class="form-control" v-model="job.discription" ></textarea>
            </div>
        </div>

             <button v-if="edit"  class="form-control btn btn-success mb-5" @click="upjobs" >modifier</button>

            <button v-else class="form-control btn btn-primary mb-5" @click="addjobs" >Enregistrer</button>
            </div>
        </div>
    
             
        <table class="table table-bordered table-striped">

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

                    <tr v-for="job in jobs">
                        <td>@{{job.title}}</td>
                        <td>@{{job.type}}</td>
                        <td>@{{job.prix}}</td>
                        <td>@{{job.location}}</td>
                        
                        
                        
                        <td v-if="job.status = 1"><span class="badge badge-success">Active</span></td>
                        <td v-else ><span class="badge badge-warning">Pending</span></td>
                        

                        <td>          
                                <button  class="btn btn-info"><i class="far fa-eye"></i></button>
                                <button  class="btn btn-success" @click="editjobs(job)"><i class="fas fa-user-edit"></i></button>
                                <button  class="btn btn-danger" @click="deljobs(job)"><i class="fas fa-trash-alt"></i></button>

                        </td>
                    </tr>

                </tbody>

        </table>



            </div>
        </div>

        <div class="row">
         <div class="col-md-2">
                    <a href="#" target="_blank" class="btn btn-default mt-4"><i class="fa fa-print"></i> Print</a>
            </div>
            <div class="col-md-10 mt-4  d-flex justify-content-center">     
                    {{$jobs->links()}}
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
            jobs: [],
            open : false,
            edit: false,
            job: {
                id: 0,
                title: '',
                status: 0,
                prix:'',
                location:'',
                discription:'',
                type: 0,
                user_id: 0,
                admin_id : 0

            }
           

		},
		methods: {
            Showjobs: function(){
                axios.get(window.laravel.url+'/admin/getjobs/')
                   .then(response => {
                        this.jobs = response.data;
                        })
                    .catch(error => {
                    console.log('errors : ',error);
                         })
                },
            addjobs: function(){
                axios.post(window.laravel.url+'/admin/addjobs/', this.job)
                    .then(response => {
                        this.open = false;
                            this.job.id = response.data.id;
                            this.jobs.unshift(this.job);

                            this.job =  {
                                id: 0,
                                title: '',
                                status: 0,
                                prix:'',
                                location:'',
                                discription:'',
                                type: 0,
                                user_id: 0,
                                admin_id : 0
                
                            }
                        })
                    .catch(error => {
                    console.log('errors : ',error);
                            })
                },

                editjobs: function(job){
                    this.open = true;
                    this.edit = true;
                    this.job = job

                
                    },
                    upjobs: function(){
               
                        axios.put(window.laravel.url+'/admin/upjobs', this.job)
                           .then(response => {
                                if(response.data.etat){
                                    this.open = false;
                                   
        
                                    this.job =  {
                                        id: 0,
                                        title: '',
                                        status: 0,
                                        prix:'',
                                        location:'',
                                        discription:'',
                                        type: 0,
                                        user_id: 0,
                                        admin_id : 0
                        
                                    }
        
                                }
                            this.edit = false;

                            })
                            .catch(error => {
                                console.log('errors : ',error);
                            })
                        },

                openvide: function(){
                    this.open = true;
                    this.edit = false;
                    this.job =  {
                        id: 0,
                        title: '',
                        status: 0,
                        prix:'',
                        location:'',
                        discription:'',
                        type: 0,
                        user_id: 0,
                        admin_id : 0
        
                    }
                },

                deljobs: function(job){

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to Delete this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                      }).then((result) => {
                        if (result.value) {

                        axios.delete(window.laravel.url+'/admin/deljobs/'+job.id)
                           .then(response => {
                                if(response.data.etat){
                                   var position = this.jobs.indexOf(job);
                                   this.jobs.splice(position, 1);
                                }

                            })
                            .catch(error => {
                                console.log('errors : ',error);
                            })

                    Swal.fire(
                            'Deleted!',
                            'has been deleted.',
                            'success'
                            )
                        }
                        })
                        
                        },
			},
            mounted: function() {
                this.Showjobs()
                }
		


	});

</script>

@endsection