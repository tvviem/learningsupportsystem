<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-white" style="background-image:url('../img/user-cover.jpg')">
                        <h3 class="widget-user-username">Elizabeth Pierce</h3>
                        <h5 class="widget-user-desc">Web Designer</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" src="" alt="User Avatar">
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
            </div>
            
            <!-- tab -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                        <li class="nav-item"><a class="nav-link active show" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- Activity Tab -->
                            <div class="tab-pane" id="activity">
                                <h3 class="text-center">Display User Activity</h3>
                            </div>
                            <!-- Setting Tab -->
                            <div class="tab-pane active show" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-8 control-label">User Name</label>
                                        <div class="col-sm-12">
                                            <input type="" v-model="form.username" class="form-control" id="inputName" placeholder="Username">
                                            <has-error :form="form" field="username"></has-error>
                                        </div>
                                    </div>

                                    <!-- User Email -->
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-12">
                                        <input type="email" v-model="form.email" class="form-control" id="inputEmail" placeholder="Email">
                                        <has-error :form="form" field="email"></has-error>
                                        </div>                                        
                                    </div>

                                    <div class="form-row align-items-center">
                                        <div class="form-group col-9">
                                            <div class="col-sm-12">
                                            <input type="password"  v-model="form.password" class="form-control" id="password" placeholder="Passport (leave empty if not changing)">
                                            <has-error :form="form" field="password"></has-error>
                                            </div>
                                        </div>
                                        <!-- Edit Status using System -->
                                        <div class="form-group col-3">
                                            <div class="form-check form-check-inline">
                                                <input v-model="form.active" class="form-check-input" type="checkbox" id="isActived">
                                                <label class="form-check-label" for="isActived">Actived</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FirstName and LastName -->
                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <label for="lastName" class="col-sm-12 control-label">Last Name</label>
                                            <div class="col-sm-12">
                                                <input v-model="form.last_name" type="text" name="last_name" placeholder="Last name" id="lastName"
                                                    class="form-control" :class="{ 'is-invalid': form.errors.has('last_name') }">
                                                <has-error :form="form" field="last_name"></has-error>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="firstName" class="col-sm-12 control-label">First Name</label>
                                            <div class="col-sm-12">
                                                <input v-model="form.first_name" type="text" name="first_name" placeholder="First name" id="firstName"
                                                    class="form-control" :class="{ 'is-invalid': form.errors.has('first_name') }">
                                                <has-error :form="form" field="first_name"></has-error>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Code and work_place -->
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="codeInWork" class="col-sm-12 control-label">Code in work</label>
                                            <div class="col-sm-12">
                                                <input v-model="form.code" type="text" name="code" placeholder="Code" id="codeInWork"
                                                    class="form-control" :class="{ 'is-invalid': form.errors.has('code') }">
                                                <has-error :form="form" field="code"></has-error>
                                            </div>
                                        </div>
                                        <div class="form-group col">
                                            <label for="workPlace" class="col-sm-12 control-label">Work place</label>
                                            <div class="col-sm-12">
                                                <input v-model="form.work_place" type="text" name="work_place" placeholder="Workplace" id="workPlace"
                                                    class="form-control" :class="{ 'is-invalid': form.errors.has('work_place') }">
                                                <has-error :form="form" field="work_place"></has-error>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Update Avatar and Role -->
                                    <div class="form-row">
                                        <!-- Update avatar -->
                                        <div class="form-group col">
                                            <label for="photo" class="col-sm-12 control-label">Avatar Photo</label>
                                            <div class="col-sm-12">
                                                <input type="file" @change="updateProfile" name="photo" class="form-input">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-12">
                                        <button @click.prevent="updateInfo" type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
          </div>
          <!-- end tabs -->
        </div>
    </div>
</template>

<style scoped>
.widget-user-header {
    background-position: center center;
    background-size: cover;
}
</style>

<script>
    export default {
        data() {
            return {
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
                    path_avatar: null
                })
            }
        },
        methods: {
            updateInfo(){
                this.$Progress.start();
                if(this.form.password == ''){
                    this.form.password = undefined;
                }
                this.form.put('../api/profile')
                .then(()=>{
                    this.$Progress.finish();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            },
            updateProfile(e){
                // console.log('uploading');
                    let file = e.target.files[0];
                    console.log(file);
                    let reader = new FileReader();
                    // let vm = this;
                    if(file['size'] < 2111775){
                        reader.onloadend = (file) => {
                            // console.log('RESULT', reader.result)
                            this.form.photo = reader.result;
                        }
                        reader.readAsDataURL(file);
                    }else{
                         swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'You are uploading a large file',
                        })
                    }
            }
        },
        created() {
            axios.get('../api/profile')
            .then(({data}) => (this.form.fill(data)));
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
