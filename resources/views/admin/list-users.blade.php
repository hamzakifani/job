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
                

                <div class="float-right mt-4 mb-2 mr-3" >
                        
                        <a class="btn btn-primary mb-2" href="#"><i class="fa fa-download"></i> Export Excel</a>

                        <button  class="btn btn-success mb-2" @click="openvide"><i class="fas fa-user-plus"></i> New User </button>

                </div>

               

            </div>
        </div>


   <div class="row"  v-if="open">
            <div class="col-md-12">
           

        <div class="row form-group">
            <div class="col-md-6">
                <label for="">First Name</label>
                <input type="text" name="firstname" class="form-control"  v-model="user.firstname">
            </div>

            <div class="col-md-6">
                <label for="">Last Name</label>
                <input type="text" name="lastname" class="form-control" v-model="user.lastname" >
            </div>
        </div>
        
        <div class="row form-group">

                <div class="col-md-6">
                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control" v-model="user.password">
                </div>
           
                <div class="col-md-6">
                    <label for="">Email Adresse</label>
                    <input type="text" name="email" class="form-control"  v-model="user.email">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-6">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control"  v-model="user.phone">
                </div>

            <div class="col-md-6">
                <label for="">Type</label>
                <select class="form-control" name="type" v-model="user.type">
                        <option value="candidat"> 
                            Candidat
                        </option>

                  <label for="option-job-type-2">
                        <option value="recruteur">
                            Recruteur
                        </option>
                  </label>

            </select>
        </div>
    </div>

        <div class="row form-group">
            <div class="col-md-6">
                <label for="">Adresse</label>
                <input type="text" name="adresse" class="form-control" v-model="user.adresse">
            </div>
        </div>

             <button v-if="edit" class="form-control btn btn-success mb-5" @click="upusers">modifier</button>

            <button v-else class="form-control btn btn-primary mb-5" @click="addusers">Enregistrer</button>
            </div>
        </div>
   

    <div class="row">
            <div class="col-md-12">

                <table class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>lastname</th>
                            <th>Email</th>
                            <th>phone</th>
                            <th>adresse</th>
                            <th>actions</th>

                        </tr>
                    </thead>
                    <tbody>
                       
                  
                    <tr v-for="user in users" >
                        <td> @{{ user.id }}</td>
                        <td> @{{ user.firstname }}</td>
                        <td> @{{ user.lastname }}</td>
                        <td> @{{ user.email }}</td>
                        <td> @{{ user.phone }}</td>
                        <td> @{{ user.adresse }}</td>

                         <td>
        
                                <button class="btn btn-info" @click="showOne(user)" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="far fa-eye"></i></button>
                                <button class="btn btn-success" @click="editusers(user)"><i class="fas fa-user-edit"></i></button>
                                <button class="btn btn-danger" @click="delusers(user)"><i class="fas fa-trash-alt"></i></button>

<!--modal of show Profil condidat-->

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Mr @{{oneuser.firstname}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                              <h1 class="font-weight-bold text-center" for="name">@{{oneuser.adresse}}</h1>
                            
                        <hr>


                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div> 

<!--  end modal of show Profil condidat-->

                        </td>
                       

                    </tr>

            
                    </tbody>

                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                    <a href="invoice-print.html" target="_blank" class="btn btn-default mt-4"><i class="fa fa-print"></i> Print</a>
            </div>
            <div class="col-md-10 mt-4  d-flex justify-content-center">  
                    {{$users->links()}}
   
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
            users: [],
            oneuser: [],
            open: false,
            edit: false,
            user: {
                id: 0,
                firstname: '',
                lastname:'',
                type:'',
                email:'',
                password:'',
                phone:'',
                adresse:''

            }

		},
		methods: {
            Showusers: function(){
                axios.get(window.laravel.url+'/admin/getusers/')
                   .then(response => {
                        this.users = response.data;
                        })
                    .catch(error => {
                    console.log('errors : ',error);
                         })
				},
            addusers: function(){
               
                axios.post(window.laravel.url+'/admin/addusers', this.user)
                   .then(response => {
                        if(response.data.etat){
                            this.open = false;
                            this.user.id = response.data.id;
                            this.users.unshift(this.user);

                            this.user = {
                                id: 0,
                                firstname: '',
                                lastname:'',
                                type:'',
                                email:'',
                                password:'',
                                phone:'',
                                adresse:''
                            }

                        }
                    })
                    .catch(error => {
                        console.log('errors : ',error);
                    })
                },
                
                editusers: function(user){
                    this.open = true;
                    this.edit = true;
                    this.user = user

                
                    },
                    showOne: function(user){

                                this.oneuser = user     //  dir lia had l user selectioné f had  array oneuser 
                                
                        },
                    upusers: function(){
               
                        axios.put(window.laravel.url+'/admin/upusers', this.user)
                           .then(response => {
                                if(response.data.etat){
                                    this.open = false;
                                   
        
                                    this.user = {
                                        id: 0,
                                        firstname: '',
                                        lastname:'',
                                        type:'',
                                        email:'',
                                        password:'',
                                        phone:'',
                                        adresse:''
                                    };
        
                                }
                            this.edit = false;

                            })
                            .catch(error => {
                                console.log('errors : ',error);
                            })
                        },

                    delusers: function(user){

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

                            axios.delete(window.laravel.url+'/admin/delusers/'+user.id)
                               .then(response => {
                                    if(response.data.etat){
                                       var position = this.users.indexOf(user);
                                       this.users.splice(position, 1);
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

                    openvide: function(){
                        this.open = true;
                        this.edit = false;
                        this.user = {
                            id: 0,
                            firstname: '',
                            lastname:'',
                            type:'',
                            email:'',
                            password:'',
                            phone:'',
                            adresse:''
                        }
                    },
			},
            mounted: function() {
                this.Showusers()
                }
		


	});

</script>

@endsection