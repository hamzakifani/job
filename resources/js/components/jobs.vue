<template>
    <div class="container justify-content">
       <div class="row">
          <div class="col-12">

            <div class="card" v-if="jobs.length">
              <div class="card-header">
                <h3 class="card-title">Jobs Table</h3>

                <div class="card-tools">
                <button class="btn btn-success" @click="newModule" >
                     Add New 
                    <i class="fas fa-user-plus fa-fw"></i>
                </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>
                 
                    <th>Title</th>
                    <th>Location</th>
                    <th>Prix</th>
                    <th>Type</th>
                    <th>Registred At</th>
                    <th>Modify</th>
                  </tr>
                  <tr v-for="job in jobs" >
                    <td>{{job.title}}</td>
                    <td>{{job.location}}</td>
                    <td>{{job.prix}}</td>
                    <td>{{job.type}}</td>
                    <td>{{job.created_at}}</td>


                    <td>
                        <a href="#" @click="editModule(job)">
                            <i class="fa fa-edit blue"></i>
                        </a>
                        /
                         <a href="#" @click="deleteUser(job.id)">
                            <i class="fa fa-trash red"></i>
                        </a>
                    </td>

                  </tr>
               
                </tbody></table>
              </div>
              <!-- /.card-body -->

            
            </div>

        <div v-if="!jobs.length" class="d-flex justify-content-end">
             <button class="btn btn-success mb-3" @click="newModule" >
                     Add New 
                    <i class="fas fa-user-plus fa-fw"></i>
            </button>
       </div>
            <div v-if="!jobs.length" class="alert alert-warning text-center">
                <h3>No Job Available</h3>
            </div>

          </div>

        </div>

 <!-- Modal -->
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 v-if="editmode" class="modal-title" id="addnewLabel">Edit Job</h5>
                <h5 v-else  class="modal-title" id="addnewLabel">Add New Job</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form @submit.prevent="editmode ? UpdateJob() : CreateJob()">
            <div class="modal-body">
                <div class="form-group">                    
                    <input type="text" name="title" v-model="form.title"
                        placeholder="Title Of Job"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" >
                    <has-error :form="form" field="title"></has-error> 
                </div>

                <div class="form-group">
                    <input  type="text" name="location" v-model="form.location"
                        placeholder="location"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('location') }">
                    <has-error :form="form" field="location"></has-error> 
                </div>

                <div class="form-group">
                    <input  type="text" name="prix" v-model="form.prix"
                        placeholder="Prix"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('prix') }" >
                    <has-error :form="form" field="prix"></has-error> 
                </div>

                 <div class="form-group">
                    <textarea  type="text" name="discription" v-model="form.discription"
                        placeholder="Discription"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('discription') }">
                        </textarea>
                    <has-error :form="form" field="discription"></has-error>               
                </div>

                  <div class="form-group">
                    <select  type="text" id="type" name="type" v-model="form.type"
                        class="form-control"  :class="{ 'is-invalid': form.errors.has('type') }" >
                        <option value="">Select Type </option>
                        <option value="FullTime">FullTime</option>
                        <option value="PartTime">PartTime</option>
                        <option value="Freelance">Freelance</option>
                        <option value="Internship">Internship</option>
                        <option value="Termporary">Termporary</option>

                    </select> 
                    <has-error :form="form" field="type"></has-error>               
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button v-if="editmode"   type="submit" class="btn btn-success">Update</button>
                <button v-else   type="submit" class="btn btn-primary">Create</button>

            </div>
        </form>

        </div>
    </div>
</div>
</div>
</template>

<script>
    export default {
        data (){
            return {
                jobs : {},
                editmode:false,
                // Create a new form instance
                form: new Form({
                    id:'',
                    title: '',
                    discription: '',
                    location: '',
                    prix: '',
                    status: '',
                    type: ''
                 
                })
            }
        },
        methods: {
             deleteUser(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    
                    if (result.value) {
                 
                        this.form.delete('http://localhost:8000/api/job/'+id).then(() => {
                            Swal.fire(
                            'Deleted!',
                            'This Job has been deleted.',
                            'success'
                            )
                        
                        Fire.$emit('AfterCreate');
                        }).catch(() => {
                            Swal.fire(
                            'Failed!',
                            'There was something wronge',
                            'warning'
                            )
                        })
                    }
                })
            },
            UpdateJob(){
                 this.form.put('http://localhost:8000/api/job/'+this.form.id)
                .then(() => {
                    Fire.$emit('AfterCreate');
                    $('#addnew').modal('hide');
                    Swal.fire(
                        'Updated!',
                        'Your Info has been updated.',
                        'success'
                    )
                })
                .catch(() => {
                    
                })
            },
            CreateJob() {
                this.form.post('http://localhost:8000/api/job')
                .then(() => {
                    Fire.$emit('AfterCreate');
                    $('#addnew').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'Created in successfully'
                    })
                })
                .catch(() => {
                    
                })
            },
            editModule(job) {
                $('#addnew').modal('show');
                this.form.fill(job);
                this.editmode = true;
            },
            newModule() {
                this.form.reset();
                $('#addnew').modal('show');
                this.editmode = false;
            },
            LoadsJobs() {
                axios.get('http://localhost:8000/api/job').then(({ data }) => (this.jobs = data));

            }
        },
        created() {
           this.LoadsJobs();   
            Fire.$on('AfterCreate' , () => {       
            this.LoadsJobs(); 
        });
    }
}
</script>
