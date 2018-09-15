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
            <div class="modal-body">
                Cac truong cung cap cho user
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Create</button>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
