@extends('layouts.master')

@section('content')


    <div class="unit-5 overlay" style="background-image: url('/site/images/hero_bg_2.jpg');">
      <div class="container text-center">
        <h2 class="mb-0">Contact</h2>
        <p class="mb-0 unit-6"><a href="{{('/')}}">Home</a> <span class="sep">></span> <span>Contact</span></p>
      </div>
    </div>

    <div id="app">
        <flash message=""></flash>
    </div>

    
    

    <div class="site-section bg-light" id="form5">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Full Name</label>
                  <input type="text" id="fullname" name="name" v-model="contact.name" class="form-control" placeholder="Full Name">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Email</label>
                  <input type="email" id="email" name="email" v-model="contact.email" class="form-control" placeholder="Email Address">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Subject</label>
                  <input type="text" id="subject" name="subject" v-model="contact.subject" class="form-control" placeholder="Enter Subject">
                </div>
              </div>
              

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="message">Message</label> 
                  <textarea name="message" id="message" v-model="contact.message" cols="30" rows="5" class="form-control" placeholder="Say hello to us"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <button @click="addcontact"  class="btn btn-primary  py-2 px-4">Send</button>
                </div>
              </div>

            </div>

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Contact Info</h3>
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="#">youremail@domain.com</a></p>

            </div>
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur</p>
              <p><a href="#" class="btn btn-primary  py-2 px-4 rounded-0">Learn More</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>

   


    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-6" data-aos="fade" >
            <h2>Frequently Ask Questions</h2>
          </div>
        </div>
        

        <div class="row justify-content-center" data-aos="fade" data-aos-delay="100">
          <div class="col-md-8">
            <div class="accordion unit-8" id="accordion">
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block" data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">What is the name of your company<span class="icon"></span></a>
              </h3>
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur quae cumque perspiciatis aperiam accusantium facilis provident aspernatur nisi optio debitis dolorum, est eum eligendi vero aut ad necessitatibus nulla sit labore doloremque magnam! Ex molestiae, dolor tempora, ad fuga minima enim mollitia consequuntur, necessitatibus praesentium eligendi officia recusandae culpa tempore eaque quasi ullam magnam modi quidem in amet. Quod debitis error placeat, tempore quasi aliquid eaque vel facilis culpa voluptate.</p>
                </div>
              </div>
            </div> <!-- .accordion-item -->
            
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">How much pay for 3  months?<span class="icon"></span></a>
              </h3>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
                </div>
              </div>
            </div> <!-- .accordion-item -->

            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">Do I need to register?  <span class="icon"></span></a>
              </h3>
              <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
                </div>
              </div>
            </div> <!-- .accordion-item -->

            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block" data-toggle="collapse" href="#collapseFour" role="button" aria-expanded="false" aria-controls="collapseFour">Who should I contact in case of support.<span class="icon"></span></a>
              </h3>
              <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
                </div>
              </div>
            </div> <!-- .accordion-item -->

          </div>
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
      
      </div>
    </footer>
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
      el: '#form5',
      data: {
              contacts: [],

              contact: {
                id: 0,
                email:'',
                subject: '',
                message:''
              }
      },
      methods: {


          addcontact: function(){
               
            axios.post(window.laravel.url+'/addcontact', this.contact)
               .then(response => {
                if(response.data.etat){
                  flash('Your Message Has been  Sent.', 'success');
                  this.contact =  {
                    id: 0,
                    email:'',
                    subject: '',
                    message:''
                  }
                }
            
            })
              .catch(error => {
              console.log('errors : ',error);
                })
            }
                 
        }
      
    });
  
  </script>

  @endsection