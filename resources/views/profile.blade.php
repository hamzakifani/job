@extends('layouts.master')

@section('content')

<div class="container mt-5" id="form1">
        <div class="row">
        
         
            <div class="col-md-12">
                    <div id="app">
                            <flash message=""></flash>
                    </div>

                            <h2>Edit your profile</h2>
                            <hr class="colorgraph">
                            <div class="row">


                                <div class="col-xs-12 col-sm-6 col-md-6">
                                <label for="firstname" class="col-xs-2 col-form-label text-md-right"><strong>{{ __('firstname') }}</strong></label>

                                    <div class="form-group">

                                        <input type="text" name="firstname" id="firstname" v-model="user.firstname" class="form-control input-lg" placeholder="firstname" tabindex="1">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label for="lastname" class="col-xs-2 col-form-label text-md-right"><strong>{{ __('lastname') }}</strong></label>
    
                                        <div class="form-group">
    
                                            <input type="text" name="lastname" id="lastname" v-model="user.lastname" class="form-control input-lg" placeholder="lastname" tabindex="1">
                                        </div>
                                    </div>
                         

                            @if(Auth::user()->type == 'recruteur')
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label for="Company" class="col-xs-2 col-form-label text-md-right"><strong>{{ __('Company') }}</strong></label>

                                    <div class="form-group">
                                        <input type="text" name="company" id="Company" v-model="recruteur.company" info class="form-control input-lg"  placeholder="Company" tabindex="2">
                                    </div>
                                </div>
                            @endif
                            
                           
                                 <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label for="email" class="col-xs-2 col-form-label text-md-right"><strong>{{ __('Email') }}</strong></label>

                                     <div class="form-group">
                                        <input type="email" name="email" id="email" v-model="user.email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
                                    </div>
                                </div>
                  
                        
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label for="phone" class="col-xs-2 col-form-label text-md-right"><strong>{{ __('phone') }}</strong></label>

                                        <div class="form-group">
                                           <input type="phone" name="phone" id="phone" v-model="user.phone" class="form-control input-lg" placeholder="phone" tabindex="4">
                                       </div>
                                </div>

                                   
                         
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label for="password" class="col-xs-2 col-form-label text-md-right"><strong>{{ __('password') }}</strong></label>

                                    <div class="form-group">
                                        <input type="password" name="password" id="password"  class="form-control input-lg" placeholder="Password" tabindex="5">
                                    </div>
                                </div>

                 
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                        <label for="adresse" class="col-xs-2 col-form-label text-md-right"><strong>{{ __('Adresse') }}</strong></label>

                                        <div class="form-group">
                                           <input type="text" name="adresse" id="adresse" v-model="user.adresse" class="form-control input-lg" placeholder="adresse" tabindex="4">
                                       </div>
                                </div>  


                        @if(Auth::user()->type == 'recruteur')
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <label for="info" class="col-xs-2 col-form-label text-md-right"><strong>{{ __('Info of company') }}</strong></label>

                                        <div class="form-group">
                                           <textarea  name="info" id="info" v-model="recruteur.info" class="form-control input-lg" placeholder="Discription of your company" rows="5" cols="33" ></textarea>
                                       </div>
                                   </div>
                        @endif  
                    </div> 
                            <hr class="colorgraph">
                            <div class="row">
                                <div class="col-xs-12 col-md-6"></div>
                                <div v-if="user.type == 'candidat'" class="col-xs-12 col-md-6 mb-5"><button @click="upprofile"  class="btn btn-success btn-block btn-lg">Save</button></div>
                                <div v-else class="col-xs-12 col-md-6 mb-5"><button @click="upprofilerec"  class="btn btn-success btn-block btn-lg">update</button></div>

                            </div>
                        </form>
            
             </div>
        </div>

    </div>
</div>

@endsection


@section('javascript')

<script>
        window.laravel = {!! json_encode([
        'crsfToken'  => csrf_token(),
        'url'        => url('/'),
        'id'         => $user->id
     
        ]) !!};
</script>



<script>

        var form1 = new Vue({
            el: '#form1',
	    	data: {
            
                user: [],
                recruteur: [],
                flash : false
  
		},
		methods: {
            getprofile: function(){
                axios.get(window.laravel.url+'/getprofile/'+window.laravel.id+'/edit/')
                   .then(response => {
                        this.user = response.data.user;
                        this.recruteur = response.data.recruteur

                        })
                    .catch(error => {
                    console.log('errors : ',error);
                         })
                },
                upprofile: function(){

                    axios.put(window.laravel.url+'/upprofile', this.user)

                       .then(response => {
                        flash('Your Profile Has been Updateed.', 'success');

                        })
                        .catch(error => {
                            console.log('errors : ',error);
                        })

                        
                    },
                    upprofilerec: function(){
    
                        let profile = {
                            user: this.user,
                            recruteur: this.recruteur
                        }
    
                        axios.put(window.laravel.url+'/upprofilerec', profile)
    
                           .then(response => {
                            flash('Your Profile Has been Updateed.', 'success');
    
                            })
                            .catch(error => {
                                console.log('errors : ',error);
                            })
    
                            
                        },
                    
			},
            mounted: function() {
                this.getprofile()
                }
		


	});

</script>

@endsection