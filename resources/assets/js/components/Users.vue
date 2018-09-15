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
                    <th>Type</th>
                    <th>Status</th>
                    <th>Modify</th>
                  </tr>
                  <tr>
                    <td>183</td>
                    <td>tvviem</td>
                    <td>tvviem@blu.edu.vn</td>
                    <td><input type="checkbox" id="actived" value="1"/></td>
                    <td>Vinh Viem</td>
                    <td>Trieu</td>
                    <td>Khoa CNTT</td>
                    <td>Admin</td>
                    <td><span class="tag tag-success">Approved</span></td>
                    <td>
                        <a href="#"><i class="fa fa-edit blue"></i></a>
                        /
                        <a href="#"><i class="fa fa-trash red"></i></a>
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
                            <input v-model="form.code" type="text" name="code" placeholder="User code"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('code') }">
                            <has-error :form="form" field="code"></has-error>
                        </div>
                        <div class="form-group col">
                            <input v-model="form.work_place" type="text" name="work_place" placeholder="Workplace"
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
                        <input v-model="form.path_avatar" type="text" name="path_avatar" placeholder="Choose your avatar"
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
                form: new Form({
                    username: '',
                    email: '',
                    password: '',
                    is_actived: false,
                    code: '',
                    first_name: '',
                    last_name: '',
                    work_place: '',
                    path_avatar: 'profile.png'
                })
            }
        },
        methods: {
            createUser() {
                // Submit the form via a POST request
                // this.form.post('api/user').then(({ data }) => { console.log(data) })
                this.form.post('api/user');
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
