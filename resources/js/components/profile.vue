<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-widget widget-user mt-3">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white" style="background: url('https://picsum.photos/300/150/?image=41') center center;">
                <h3 class="widget-user-username">hamza</h3>
                <h5 class="widget-user-desc">admin</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="https://picsum.photos/125/125/?image=58"   alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>

           <form role="form">
                <div class="card-body">

                 <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" v-model="form.firstname"  id="firstname"  name="firstname" placeholder="Enter Firstname"
                    :class="{ 'is-invalid': form.errors.has('firstname') }">
                     <has-error :form="form" field="firstname"></has-error>
                  </div>

                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" v-model="form.lastname"   id="lastname"  name="lastname" placeholder="Enter Lastname"
                    :class="{ 'is-invalid': form.errors.has('lastname') }">
                     <has-error :form="form" field="lastname"></has-error>
                  </div>

                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" v-model="form.email"  id="email"  name="email" placeholder="Enter email"
                    :class="{ 'is-invalid': form.errors.has('email') }">
                     <has-error :form="form" field="email"></has-error>
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" v-model="form.password" name="password"  id="password" placeholder="Password"
                    :class="{ 'is-invalid': form.errors.has('password') }">
                     <has-error :form="form" field="password"></has-error>
                  </div>

                 <div class="form-group">
                    <label for="adresse"> Address</label>
                    <input type="text" class="form-control" v-model="form.adresse"  id="adresse"  name="adresse" placeholder="Enter Adress"
                    :class="{ 'is-invalid': form.errors.has('adresse') }">
                     <has-error :form="form" field="adresse"></has-error>
                  </div>

                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" v-model="form.phone"  id="phone"  name="phone" placeholder="Enter Phone"
                    :class="{ 'is-invalid': form.errors.has('phone') }">
                     <has-error :form="form" field="phone"></has-error>
                  </div>

                 <div class="form-group">
                    <label for="photo">Profile Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file"  name="photo" class="custom-file-input" id="photo">
                        <label class="custom-file-label"  for="photo">Choose file</label>
                      </div>
                     
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button  type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
      data () {
        return {
    
        // Create a new form instance
        form: new Form({
            id:'',
            firstname: '',
            lastname: '',
            password: '',
            email: '',
            adresse: '',
            phone: ''
            })
        }
    },
        created() {
            axios.get('http://localhost:8000/api/profile').then(({ data }) => (this.form.fill(data)));
        }
    }
</script>
