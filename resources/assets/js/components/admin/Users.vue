<template>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users Table</h3>

                <div class="card-tools">
                  <button class="btn btn-success" @click="newModal">
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
                    <th>Roles</th>
                    <th>Created_at</th>
                    <th>Status</th>
                    <th>Modify</th>
                  </tr>
                  <tr v-for="user in users" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.username | upText }}</td>
                    <td>{{ user.email }}</td>
                    <td style="text-align: center"><input type="checkbox" v-model="user.active" disabled/></td>
                    <td>{{ user.first_name }}</td>
                    <td>{{ user.last_name }}</td>
                    <td>
                        <span v-for="role in user.roles" :key="role.id">
                            {{role.slug }}
                        </span>
                    </td>
                    <td>{{ user.created_at | showDate }}</td>
                    <td><span class="tag tag-success">On/offline</span></td>
                    <td>
                        <a href="#" title="Edit User info" @click="editModal(user)"><i class="fa fa-edit blue "></i></a>
                        <!-- Except admin role with id=1 -->
                        <span v-show="!(user.id===1)">
                            |
                            <a href="#" title="Delete this user" @click="deleteUser(user.id)"><i class="fa fa-trash red"></i></a>
                        </span>
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
                <h5 class="modal-title">{{editmode ? 'Update User Info' : 'Add New'}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="editmode ? updateUser() : createUser()">
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
                        <div class="form-group col-3" v-show="!(form.id===1)">
                            <div class="form-check form-check-inline">
                                <input v-model="form.active" class="form-check-input" type="checkbox" id="isActived">
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
                    <!-- Show all roles in system, mode: add new -->
                    <div class="form-row">
                        <div class="form-group col" v-for="role in roles" :key="role.id">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" :id="role.id" :value="role.slug" v-model="role.checked">
                                <label class="form-check-label" :for="role.id">{{role.slug}}</label>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-row" v-show="editmode">
                        <div class="form-group col" v-for="role in roles" :key="role.id">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" :id="role.id" :value="role.slug" :checked="form.selected_roles.findIndex(roleUser=>roleUser.id===role.id)>=0?true:false">
                                <input type="checkbox" class="form-check-input" :id="role.id" :value="role.slug" v-model="role.checked">
                                <label class="form-check-label" :for="role.id">{{role.slug}}</label>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-row">
                        <span>role selected of Roles: {{ roles }} </span> <br>
                    </div>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"> {{editmode ? 'Update' : 'Create'}}</button>
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
                editmode: false,
                users: {}, // load all users in sys
                roles: [], // Load all roles in system
                form: new Form({
                    id: 0,
                    username: '',
                    email: '',
                    password: '',
                    active: false,
                    code: '',
                    first_name: '',
                    last_name: '',
                    work_place: '',
                    path_avatar: null,
                    selected_roles: [] // roles of this user when add or update
                })
            }
        },
        methods: {
            newModal() {
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
                // this.form.selected_roles.push('student');
                this.roles.map(role => role.checked=(role.slug==='student'?true:false)); // set default role
            },
            editModal(user) {
                this.editmode = true;
                // let arrStringRole = this.roles.map(x => x.slug) // only get slug column in role
                // 
                this.roles.map(role => {
                    user.roles.findIndex(roleUser => {
                      (roleUser.id===role.id)?role.checked=true:role.checked=false;
                    });
                });
                $('#addNew').modal('show');
                this.form.fill(user);
            },
            loadUsers() {
                axios.get("/api/user").then(({ data }) => (this.users = data.data));
            },
            emptySelectedRoles() {
                this.form.selected_roles = [];
                this.roles.forEach(role => {
                    if(role.checked) {
                        this.form.selected_roles.push(role.slug);
                    }
                });
                if(this.form.selected_roles.length>0)
                    return false;
                return true;
            },
            createUser() {
                if(this.emptySelectedRoles()) {
                    toast({
                        type: 'warning',
                        title: 'Please select least role of user'
                    });
                    return;
                }
                this.$Progress.start();
                this.form.post('/api/user')
                .then(()=>{
                    Fire.$emit('ReloadUserList');
                    $('#addNew').modal('hide');

                    toast({
                        type: 'success',
                        title: 'User Created in successfully'
                    });
                    this.$Progress.finish();
                })
                .catch((error) => {
                    toast({
                        type: 'error',
                        title: 'Can not create user!'
                    });
                    this.$Progress.fail();
                });
                
            },
            updateUser() {
                this.$Progress.start();
                this.form.put('../api/user/' + this.form.id)
                .then(() => {
                    Fire.$emit('ReloadUserList');
                    $('#addNew').modal('hide');
                    swal('Updated!', 'Information has been updated.', 'success');
                    this.$Progress.finish();
                })
                .catch(()=>{
                    toast({
                        type: 'error',
                        title: 'Update not successfully!'
                    });
                    this.$Progress.fail();
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
                        this.form.delete('/api/user/' + id).then(() => {
                            swal('Deleted!', 'A user has been deleted.', 'success');
                            Fire.$emit('ReloadUserList');
                        }).catch(() => {
                            swal('Failed!', 'There was something wrongs.', 'warning');
                        });
                    }
                })
            }
            
        },
        created() {
            Fire.$on('ReloadUserList', () => {
                this.loadUsers();
            })
            
            // Reload user list after 3 second
            // setInterval(() => this.loadUsers(), 3000);
        },
        mounted() {
            this.loadUsers();
            axios.get('/api/role').then(response => {
                // this.form.selected_roles=response.data;
                return response.data;
            })
            .then(allRoles => {
                allRoles.forEach(role => {
                    let roleCustom = {id:role.id, slug:role.slug, checked: false}
                    // this.form.selected_roles.push(roleCustom);
                    this.roles.push(roleCustom);
                    // console.log('Adding checked property: ' + this.form.selected_roles);
                });
            })
            .catch(err => {
                console.log(err);
            });
        }
    }
</script>
