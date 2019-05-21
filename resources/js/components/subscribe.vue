<template>
    <div class="container">
       <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Subscribe Table</h3>

                <div class="card-tools">
                <button class="btn btn-success" @click="newModule()">
                     Add New 
                    <i class="fas fa-user-plus fa-fw"></i>
                </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>
                 
                    <th>ID</th>
                    <th>Email</th>
                    <th>Registred At</th>
                    <th>Modify</th>
                  </tr>
                  <tr v-for="sub in subs" :key="sub.id">
                    <td>{{sub.id}}</td>
                    <td>{{sub.email}}</td>
                    <td>{{sub.created_at}}</td>
                    
                    <td>
                        <a href="#" @click="editmodule(sub)">
                            <i class="fa fa-edit blue"></i>
                        </a>
                        /
                         <a href="#" @click="deleteSub(sub.id)">
                            <i class="fa fa-trash red"></i>
                        </a>
                    </td>

                  </tr>
               
                </tbody></table>
              </div>
              <!-- /.card-body -->

            
            </div>
            <!-- /.card -->
          </div>
        </div>

  <!-- Modal -->
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 v-if="editmode" class="modal-title" id="addnewLabel">Edit Email</h5>
                <h5 v-else  class="modal-title" id="addnewLabel">Add New</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form @submit.prevent="editmode ? UpdateSub() :createSub()">
            <div class="modal-body">
                <div class="form-group">                    
                    <input type="text" name="email" v-model="form.email"
                        placeholder="Email Adress"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" >
                    <has-error :form="form" field="email"></has-error> 
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
        data() {
            return {
                subs : {},
                editmode:false,
                form: new Form({
                    id: '',
                    email: ''
                })
            }
        },
        methods: {
            deleteSub(id){
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
                 
                        this.form.delete('http://localhost:8000/api/subscribe/'+id).then(() => {
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
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
            UpdateSub(){
                this.form.put('http://localhost:8000/api/subscribe/'+this.form.id)
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
            createSub(){
                this.form.post('http://localhost:8000/api/subscribe')
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
            editmodule(sub){
                this.form.reset();
                $('#addnew').modal('show');
                this.form.fill(sub);
                this.editmode = true;
            },
            newModule() {
                 this.form.reset();
                $('#addnew').modal('show');
                this.editmode = false;
            },
            LoadSubs(){
                axios.get('http://localhost:8000/api/subscribe').then(({ data }) => (this.subs = data));
            }
        },
        created() {
            this.LoadSubs();
            Fire.$on('AfterCreate' , () => {   
            this.LoadSubs();
            });
        }
    }
</script>
