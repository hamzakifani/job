<template>
    <div class="container">
       <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users Table</h3> 

                <div class="card-tools">
                <button class="btn btn-success" @click="newModule">
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
                    <th>Fname</th>
                    <th>Lname</th>
                    <th>Email</th>
                    <th>Adress</th>
                    <th>phone</th>
                    <th>Type</th>
                    <th>Registred At</th>
                    <th>Modify</th>
                  </tr>
                  <tr v-for="user in users" :key="user.id">
                    <td>{{user.id}}</td>
                    <td>{{user.firstname}}</td>
                    <td>{{user.lastname}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.adresse}}</td>
                    <td>{{user.phone}}</td>
                    <td>{{user.type}}</td>
                    <td>{{user.created_at}}</td>


                    <td>
                        <a href="#" @click="editModule(user)">
                            <i class="fa fa-edit blue"></i>
                        </a>
                        /
                         <a href="#" @click="deleteUser(user.id)">
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
                <h5 v-if="editmode" class="modal-title" id="addnewLabel">Edit User</h5>
                <h5 v-else  class="modal-title" id="addnewLabel">Add New</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form @submit.prevent="editmode ? UpdateUser() : CreateUser()">
            <div class="modal-body">
                <div class="form-group">                    
                    <input type="text" name="firstname" v-model="form.firstname"
                        placeholder="Firstname"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('firstname') }" >
                    <has-error :form="form" field="firstname"></has-error> 
                </div>

                <div class="form-group">
                    <input  type="text" name="lastname" v-model="form.lastname"
                        placeholder="Lastname"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('lastname') }">
                    <has-error :form="form" field="lastname"></has-error> 
                </div>

                <div class="form-group">
                    <input  type="text" name="email" v-model="form.email"
                        placeholder="Email Adress"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" >
                    <has-error :form="form" field="email"></has-error> 
                </div>

                <div class="form-group">
                    <textarea  type="text" name="adresse" v-model="form.adresse"
                        placeholder="Adresse"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('adresse') }">
                        </textarea>
                    <has-error :form="form" field="adresse"></has-error>               
                </div>

                <div class="form-group">
                    <input  type="text" name="phone" v-model="form.phone"
                        placeholder="Phone"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }" >
                    <has-error :form="form" field="phone"></has-error>               
                </div>

                <div class="form-group">
                    <select  type="text" id="type" name="role" v-model="form.role"
                        class="form-control"  :class="{ 'is-invalid': form.errors.has('role') }" >
                        <option value="">Select User Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">standard user</option>
                    </select> 
                    <has-error :form="form" field="role"></has-error>               
                </div>

                <div class="form-group">
                    <input type="password" name="password" id="password" v-model="form.password"
                        placeholder="password"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" >
                    <has-error :form="form" field="password"></has-error>
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
        data () {
        return {
        users : {},
        editmode:false,
        // Create a new form instance
        form: new Form({
            id:'',
            firstname: '',
            lastname: '',
            password: '',
            type: '',
            email: '',
            adresse: '',
            phone: '',
            type: '',
            role: '',
            created_at: ''
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
                 
                        this.form.delete('http://localhost:8000/api/user/'+id).then(() => {
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
            UpdateUser(){
                this.form.put('http://localhost:8000/api/user/'+this.form.id)
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
            CreateUser(){
                this.form.post('http://localhost:8000/api/user')
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
            editModule(user) {
                this.form.reset();
                $('#addnew').modal('show');
                this.form.fill(user);
                this.editmode = true;
            },
            newModule(){
                this.form.reset();
                $('#addnew').modal('show');
                this.editmode = false;

            },
            loadUsers (){
                axios.get('http://localhost:8000/api/user').then(({ data }) => (this.users = data));
            }
            
        },
        created() {  
            this.loadUsers();   
            Fire.$on('AfterCreate' , () => {       
            this.loadUsers(); 
           });
        }
}
</script>