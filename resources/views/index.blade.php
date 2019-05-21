@extends('layouts.master')

@section('content')
    
    <div class="site-blocks-cover" style="background-image: url(site/images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row row-custom align-items-center">
          <div class="col-md-10">
            <h1 class="mb-2 text-black w-75"><span class="font-weight-bold">@lang('index.Largest Job</span> Site On The Net')</h1>
            <div class="job-search">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active py-3" id="pills-job-tab" data-toggle="pill" href="#pills-job" role="tab" aria-controls="pills-job" aria-selected="true">@lang('index.FIND A JOB')</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link py-3" id="pills-candidate-tab" data-toggle="pill" href="#pills-candidate" role="tab" aria-controls="pills-candidate" aria-selected="false">@lang('index.FIND A CANDIDATE')</a>
                </li>
              </ul>
              <div class="tab-content bg-white p-4 rounded" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-job" role="tabpanel" aria-labelledby="pills-job-tab">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0" id="app">

                          <!-- <autocomplete></autocomplete> -->
                          <!-- <flash message=""></flash> -->
                          
                        </div>
                         
                      
                      <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                        <div class="select-wrap">
                          <span class="icon-keyboard_arrow_down arrow-down"></span>
                          <select name="" id="" class="form-control">
                            <option value="">Category</option>
                            <option value="fulltime">FullTime</option>
                            <option value="fulltime">PartTime</option>
                            <option value="freelance">Freelance</option>
                            <option value="internship">Internship</option>
                            <option value="internship">Termporary</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                        <input type="text" class="form-control form-control-block search-input" id="autocomplete" placeholder="Location" onFocus="geolocate()">
                      </div>
                      <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                        <input type="submit" class="btn btn-primary btn-block" value="Search">
                      </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-candidate" role="tabpanel" aria-labelledby="pills-candidate-tab">
                  <form action="#" method="post">
                    <div class="row">
                      <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                        <input type="text" class="form-control" placeholder="eg. Carl Smith">
                      </div>
                      <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                        <div class="select-wrap">
                          <span class="icon-keyboard_arrow_down arrow-down"></span>
                          <select name="" id="" class="form-control">
                            <option value="">Category</option>
                            <option value="fulltime">Full Time</option>
                            <option value="fulltime">Part Time</option>
                            <option value="freelance">Freelance</option>
                            <option value="internship">Internship</option>
                            <option value="internship">Termporary</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                        <input type="text" class="form-control form-control-block search-input" id="autocomplete" placeholder="Location" onFocus="geolocate()">
                      </div>
                      <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                        <input type="submit" class="btn btn-primary btn-block" value="Search">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
    


    <div class="site-section bg-light " >
      <div class="container" id="form" >
        
        <div class="row justify-content-start text-left ">
          <div class="col-md-9">
            <h2 class="font-weight-bold text-black mb-5">@lang('index.Recent Jobs')</h2>
          </div>
        </div>


 @auth
 @if (Auth::user()->type == 'recruteur')

        <div class="row justify-content-end text-right mb-5">
          <div class="col-md-3">
            <button v-if="open" class="btn btn-danger btn-lg" @click="open = !open">Hide Form</button>
            <button v-else  class="btn btn-primary btn-lg" @click="open = !open"> Post a Job</button>

          </div>
        </div>
@endif   
@endauth

        <div class="col-md-12" v-if="open">

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
                          <select class="form-control" name="type" v-model="job.type" >
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
            
                  <button @click="addjobs"  class="form-control btn btn-primary mb-5">Enregistrer</button>
                 
               
          </div>
        

  
            
       
        <div class="row" v-for="job in jobs">
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
                 <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> <a href="#">hamza</a></div>
                 <div><span class="fl-bigmug-line-big104"></span> <span>@{{job.location}}</span></div>
               </div>
              </div>

              <div class="ml-auto">
                <a href="#" class="btn btn-secondary rounded-circle btn-favorite text-gray-500"><span class="icon-heart"></span></a>
                <a :href =" '/job-single/'+job.id"  class="btn btn-primary py-2">postuler</a>
              </div>
           </div>

         </div>
        </div>



        <div class="row mt-5">
          <div class="col-md-12 text-center">
            <div class="site-block-27">
              <ul>
                  {{ $jobs->links()}}
              </ul>
            </div>
          </div>
        </div>


      </div>
    </div>    


    

    

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-6" data-aos="fade" >
            <h2 class="text-black">Why Job<strong>start</strong> </h2>
          </div>
        </div>
        <div class="row hosting">
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="100">

            <div class="unit-3 h-100 bg-white">
              
              <div class="d-flex align-items-center mb-3 unit-3-heading">
                <div class="unit-3-icon-wrap mr-4">
                  <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                    <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                  </svg><span class="unit-3-icon icon fl-bigmug-line-portfolio23"></span>
                </div>
                <h2 class="h5">Search Millions of Jobs</h2>
              </div>
              <div class="unit-3-body">
                <p>Lorem ipsum dolor sit amet consectetur is a nice adipisicing elita ssumenda a similique perferendis dolorem eos.</p>
              </div>
            </div>

          </div>
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="200">
            
            <div class="unit-3 h-100 bg-white">
              
              <div class="d-flex align-items-center mb-3 unit-3-heading">
                <div class="unit-3-icon-wrap mr-4">
                  <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                    <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                  </svg><span class="unit-3-icon icon fl-bigmug-line-big104"></span>
                </div>
                <h2 class="h5">Location Search</h2>
              </div>
              <div class="unit-3-body">
                <p>Lorem ipsum dolor sit amet consectetur is a nice adipisicing elita ssumenda a similique perferendis dolorem eos.</p>
              </div>
            </div>

          </div>
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="300">
            
            <div class="unit-3 h-100 bg-white">
              
              <div class="d-flex align-items-center mb-3 unit-3-heading">
                <div class="unit-3-icon-wrap mr-4">
                  <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                    <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                  </svg><span class="unit-3-icon icon fl-bigmug-line-airplane86"></span>
                </div>
                <h2 class="h5">Top Careers</h2>
              </div>
              <div class="unit-3-body">
                <p>Lorem ipsum dolor sit amet consectetur is a nice adipisicing elita ssumenda a similique perferendis dolorem eos.</p>
              </div>
            </div>

          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="400">

            <div class="unit-3 h-100 bg-white">
              
              <div class="d-flex align-items-center mb-3 unit-3-heading">
                <div class="unit-3-icon-wrap mr-4">
                  <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                    <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                  </svg><span class="unit-3-icon icon fl-bigmug-line-user144"></span>
                </div>
                <h2 class="h5">Search Expert Candidates</h2>
              </div>
              <div class="unit-3-body">
                <p>Lorem ipsum dolor sit amet consectetur is a nice adipisicing elita ssumenda a similique perferendis dolorem eos.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="500">
            
            <div class="unit-3 h-100 bg-white">
              
              <div class="d-flex align-items-center mb-3 unit-3-heading">
                <div class="unit-3-icon-wrap mr-4">
                  <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                    <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                  </svg><span class="unit-3-icon icon fl-bigmug-line-clipboard68"></span>
                </div>
                <h2 class="h5">Easy To Manage Jobs</h2>
              </div>
              <div class="unit-3-body">
                <p>Lorem ipsum dolor sit amet consectetur is a nice adipisicing elita ssumenda a similique perferendis dolorem eos.</p>
              </div>
            </div>

          </div>
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="600">
            
            <div class="unit-3 h-100 bg-white">
              
              <div class="d-flex align-items-center mb-3 unit-3-heading">
                <div class="unit-3-icon-wrap mr-4">
                  <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                    <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                  </svg><span class="unit-3-icon icon fl-bigmug-line-user143"></span>
                </div>
                <h2 class="h5">Online Reviews</h2>
              </div>
              <div class="unit-3-body">
                <p>Lorem ipsum dolor sit amet consectetur is a nice adipisicing elita ssumenda a similique perferendis dolorem eos.</p>
              </div>
            </div>

          </div>

        </div>
      
      </div>
    </div>


    
    <div class="py-5 bg-primary">
      <div class="container" id="send">
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-white h4 font-weihgt-normal mb-4">Subscribe Newsletter</h2>
          </div>
        </div>  
        <div class="row">
          <div class="col-md-9">
            <span v-if="flash" class="alert alert-success form-control border-0 mb-3 mb-md-0">You are Registred success</span>
            <input v-else type="text" name="email" v-model="sub.email" class="form-control border-0 mb-3 mb-md-0" placeholder="Enter Your Email">
          </div>
          <div class="col-md-3">
            <button @click="addemail" v-if="BtnSub" class="btn btn-dark form-control border-0 mb-3 mb-md-0" > Subscribe </button>
          </div>
        </div>
      </div>
    </div>
    <footer class="site-footer">
      <div class="container">
        

        <div class="row">
          <div class="col-lg-9">
            <div class="row">
              <div class="col-6 col-md-3 col-lg-3 mb-5 mb-lg-0">
                <h3 class="footer-heading mb-4">For Candidates</h3>
                <ul class="list-unstyled">
                  <li><a href="#">Register</a></li>
                  <li><a href="#">Find Jobs</a></li>
                  <li><a href="#">News</a></li>
                  <li><a href="#">Search Jobs</a></li>
                  <li><a href="#">Contact</a></li>
                  <li><a href="#">Careers</a></li>
                </ul>
              </div>
              <div class="col-6 col-md-3 col-lg-3 mb-5 mb-lg-0">
                <h3 class="footer-heading mb-4">For Employers</h3>
                <ul class="list-unstyled">
                  <li><a href="#">Employer Account</a></li>
                  <li><a href="#">Clients</a></li>
                  <li><a href="#">News</a></li>
                  <li><a href="#">Find Candidates</a></li>
                  <li><a href="#">Terms &amp; Policies</a></li>
                  <li><a href="#">Careers</a></li>
                </ul>
              </div>
              <div class="col-6 col-md-3 col-lg-3 mb-5 mb-lg-0">
                <h3 class="footer-heading mb-4">Archives</h3>
                <ul class="list-unstyled">
                  <li><a href="#">January 2018</a></li>
                  <li><a href="#">February 2018</a></li>
                  <li><a href="#">March 2018</a></li>
                  <li><a href="#">April 2018</a></li>
                  <li><a href="#">May 2018</a></li>
                  <li><a href="#">June 2918</a></li>
                </ul>
              </div>
              <div class="col-6 col-md-3 col-lg-3 mb-5 mb-lg-0">
                <h3 class="footer-heading mb-4">Company</h3>
                <ul class="list-unstyled">
                  <li><a href="#">About</a></li>
                  <li><a href="#">Team</a></li>
                  <li><a href="#">Terms &amp; Policies</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <h3 class="footer-heading mb-4">Contact Info</h3>
            <ul class="list-unstyled">
              <li>
                <span class="d-block text-white">Address</span>
                New York - 2398 10 Hadson Carl Street
              </li>
              <li>
                <span class="d-block text-white">Telephone</span>
                +1 232 305 3930
              </li>
              <li>
                <span class="d-block text-white">Email</span>
                info@yourdomain.com
              </li>
            </ul>
            
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            
          </div>
          
        </div>
      </div>
    </footer>
  </div>

{{--    
  
  <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>

 

    
  @endsection

  @section('javascript')



  <script>
          window.laravel = {!! json_encode([
          'crsfToken' => csrf_token(),
          'url'       => url('/')
          ]) !!};
  </script>
  
  <script>
  
    var form = new Vue({
      el: '#form',
      data: {
              jobs: [],
              open : false,
              job: {
                id: 0,
                title: '',
                status: 0,
                prix:'',
                location:'',
                discription:'',
                type: '',
                user_id: 0,
                admin_id : 0

            }
  
      },
      methods: {

        Showjobs: function(){
          axios.get('http://localhost:8000/getjobs/')
             .then(response => {
                  this.jobs = response.data;
                  })
              .catch(error => {
              console.log('errors : ',error);
                   })
          },
             
          addjobs: function(){
               
            axios.post('http://localhost:8000/addjobs', this.job)
               .then(response => {
                  this.open = false;
                  flash('Your Job Has been  Created.', 'success');
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
                 
        },
        mounted: function() {
            this.Showjobs()
            }
      
    });
  
  </script>

  <script>
  
    var send = new Vue({
      el: '#send',
      data: {
            
            sub: {
               email:''
            },
            
            flash: false,
            BtnSub : true
           },

      methods: {
    
         addemail: function(){
            axios.post('http://localhost:8000/subscribe', this.sub)
               .then(response => {
                if(response.data.etat){
                  this.flash = true,
                  this.BtnSub = false
                }
   
            })
              .catch(error => {
              console.log('errors : ',error);
                })
            },
                 
        }
      
    });
  
  </script>
  
  @endsection