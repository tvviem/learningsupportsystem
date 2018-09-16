<template>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users Table</h3>

                <div class="card-tools">
                  <button class="btn btn-success" data-toggle="modal" data-target="#addNew">
                      Add New <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Actived</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Workplace</th>
                    <th>Created_at</th>
                    <th>Status</th>
                    <th>Modify</th>
                  </tr>
                  <tr v-for="user in users" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.username | upText }}</td>
                    <td>{{ user.email }}</td>
                    <td><input type="checkbox" v-model="user.is_actived" /></td>
                    <td>{{ user.first_name }}</td>
                    <td>{{ user.last_name }}</td>
                    <td>{{ user.work_place }}</td>
                    <td>{{ user.created_at | showDate }}</td>
                    <td><span class="tag tag-success">On/offline</span></td>
                    <td>
                        <a href="#" title="Edit User info"><i class="fa fa-edit blue"></i></a>
                        |
                        <a href="#" title="View and Edit role of this user"><i class="fa fa-user-tag yellow"></i></a>
                        |
                        <a href="#" title="Delete this user" @click="deleteUser(user.id)"><i class="fa fa-trash red"></i></a>
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
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewLabel">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="createUser">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col">
                            <input v-model="form.username" type="text" name="username" placeholder="Username"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('username') }">
                            <has-error :form="form" field="username"></has-error>
                        </div>
                        <div class="form-group col">
                            <input v-model="form.password" type="password" name="password" placeholder="Password"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                            <has-error :form="form" field="password"></has-error>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="form-group col-9">
                            <input v-model="form.email" type="email" name="email" placeholder="Email Address"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="form-group col-3">
                            <div class="form-check form-check-inline">
                                <input v-model="form.is_actived" class="form-check-input" type="checkbox" id="isActived">
                                <label class="form-check-label" for="isActived">Actived</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col">
                            <input v-model="form.code" type="text" name="code" placeholder="User code (optional)"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('code') }">
                            <has-error :form="form" field="code"></has-error>
                        </div>
                        <div class="form-group col">
                            <input v-model="form.work_place" type="text" name="work_place" placeholder="Workplace (optional)"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('work_place') }">
                            <has-error :form="form" field="work_place"></has-error>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col">
                            <input v-model="form.last_name" type="text" name="last_name" placeholder="Last name"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('last_name') }">
                            <has-error :form="form" field="last_name"></has-error>
                        </div>
                        <div class="form-group col">
                            <input v-model="form.first_name" type="text" name="first_name" placeholder="First name"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('first_name') }">
                            <has-error :form="form" field="first_name"></has-error>
                        </div>
                    </div>
                    <div class="form-group">
                        <input v-model="form.path_avatar" type="text" name="path_avatar" placeholder="Choose your avatar (optional)"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('path_avatar') }">
                        <has-error :form="form" field="path_avatar"></has-error>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="">Student
                                </label>
                            </div>
                        </div>
                        <div class="form-group col">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="">Lecturer
                                </label>
                            </div>
                        </div>
                        <div class="form-group col">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="">Administrator
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
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
                users: {},
                form: new Form({
                    username: '',
                    email: '',
                    password: '',
                    is_actived: false,
                    code: '',
                    first_name: '',
                    last_name: '',
                    work_place: '',
                    path_avatar: null
                })
            }
        },
        methods: {
            loadUsers() {
                axios.get("api/user").then(({ data }) => (this.users = data.data));
            },
            createUser() {
                // Submit the form via a POST request
                // this.form.post('api/user').then(({ data }) => { console.log(data) })
                this.$Progress.start();
                this.form.post('api/user')
                .then(()=>{
                    Fire.$emit('ReloadUserList');
                    $('#addNew').modal('hide');

                    toast({
                        type: 'success',
                        title: 'User Created in successfully'
                    });
                    this.$Progress.finish();
                })
                .catch(() => {
                    toast({
                        type: 'error',
                        title: 'Can not create user!'
                    });
                    this.$Progress.finish();
                });
                
            },
            deleteUser(id) {
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value) {
                            this.form.delete('api/user/' + id).then(() => {
                                swal('Deleted!', 'Your file has been deleted.', 'success');
                                Fire.$emit('ReloadUserList');
                            }).catch(() => {
                                swal('Failed!', 'There was something wrongs.', 'warning');
                            });
                        }
                    })
            }
        },
        created() {
            this.loadUsers();
            Fire.$on('ReloadUserList', () => {
                this.loadUsers();
            })
            // Reload user list after 3 second
            // setInterval(() => this.loadUsers(), 3000);
        }
    }
</script>
