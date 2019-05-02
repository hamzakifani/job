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
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                   <table class="table table-bordered table-striped">
                
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                
    
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($contacts as  $contact)
                            <tr>
                                <td> {{ $contact->id }}</td>
                                <td> {{ $contact->name }}</td>
                                <td> {{ $contact->email }}</td>
                                <td> {{ $contact->subject }}</td>
                                <td> {{ $contact->message }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>


            </div>
        </div>
    </div>
 </section>
</div>

@endsection

{{--  @section('javascript')



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

@endsection  --}}