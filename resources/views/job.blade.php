@extends('layouts.master')

@section('content')

<div class="unit-5 overlay" style="background-image: url('/site/images/hero_bg_2.jpg');">
  <div class="container text-center">
    <h2 class="mb-0">Mes Jobs</h2>
    <p class="mb-0 unit-6"><a href="{{('/')}}">Home</a> <span class="sep">></span> <span>Mes Jobs</span></p>
  </div>
</div>

<div class="site-section bg-light" id="showForm">
    <div class="container" id="form3" >
      <div class="row justify-content-start text-left mb-5">
        <div class="col-md-9" data-aos="fade">
          <h2 class="font-weight-bold text-black">Recent Jobs</h2>
        </div>
        <div class="col-md-3" data-aos="fade" data-aos-delay="200">
          <button v-if="open"  @click="Showjobs"  class="btn btn-danger py-3 " 
          style="width: 86px;height: 50px;"> <i class="fas fa-minus-circle"></i> Hide</button>
        </div>
      </div>

     
      <div class="row"  v-if="open" >
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
    
                 <button @click="upjobs"  class="form-control btn btn-success mb-5"  >modifier</button>
    
                </div>
            </div>
          
     
      <div class="row" data-aos="fade" v-for="job in jobs">
       <div class="col-md-12">

         <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

            <div class="mb-4 mb-md-0 mr-5">
             <div class="job-post-item-header d-flex align-items-center">
              <h2 class="mr-3 text-black h4"><a :href =" '/job-single/'+job.id" >@{{ job.title }}</a></h2>
                 <div class="badge-wrap">

      
                  <span v-if="job.type == 'FullTime'" class=" bg-primary text-white badge py-2 px-4">@{{ job.type }}</span>
              
                  <span v-else-if="job.type == 'Termporary'" class=" bg-success text-white badge py-2 px-4">@{{ job.type }}</span>

                  <span v-else-if="job.type == 'PartTime'" class=" bg-warning text-white badge py-2 px-4">@{{ job.type }}</span>

                  <span v-else-if="job.type == 'Freelance'" class=" bg-secondary text-white badge py-2 px-4">@{{ job.type }}</span>

                  <span v-else-if="job.type == 'Internship'" class=" bg-danger text-white badge py-2 px-4">@{{ job.type }}</span>
                  
               

                
                  </div>
               </div>
               <div class="job-post-item-body d-block d-md-flex">
                 <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> <a href="#">{{$user->Recruteur->company}}</a></div>
                 <div><span class="fl-bigmug-line-big104"></span> <span>@{{job.location}}</span></div>
               </div>
              </div>

              <div class="ml-auto">
                <a href="#" class="btn btn-secondary rounded-circle btn-favorite text-gray-500"><span class="icon-heart"></span></a>
                <a href="#showForm" @click="editjobs(job)"  class="btn btn-primary py-2">Edit</a>
              </div>
           </div>

         </div>

         
        </div>

        

      <div class="row mt-5">
        <div class="col-md-12 text-center">
          <div class="site-block-27">
            <ul>
                {{$jobs->links()}}
            </ul>
          </div>
        </div>
      </div>


    </div>
  </div> 
@endsection


@section('javascript')



<script>
        window.laravel = {!! json_encode([
        'crsfToken' => csrf_token(),
        'url'       => url('/'),
        'id'        => $user->id
        ]) !!};
</script>

<script>

	new Vue({
		el: '#form3',
		data: {
            jobs: [],
            user: [],
            open : false,
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
                axios.get(window.laravel.url+'/alljobs/'+window.laravel.id)
                   .then(response => {
                     console.log(response.data);
                        this.jobs = response.data.jobs;
                        this.user = response.data.user;
                        this.open = false

                        })
                    .catch(error => {
                    console.log('errors : ',error);
                         })
                },

                editjobs: function(job){
                    this.open = true;
                    this.job = job

                
                    },
                    upjobs: function(){
               
                        axios.put(window.laravel.url+'/updatejob', this.job)
                           .then(response => {
                                if(response.data.etat){
                                    this.open = false;

                                    }

                            })
                            .catch(error => {
                                console.log('errors : ',error);
                            })
                        }
               
                        
		                  	},
                          mounted: function() {
                              this.Showjobs()
                              }
                  


	});

</script>

@endsection