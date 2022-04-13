<?= $this->extend('template/template_admin'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-clipboard-list mr-2"></i> DATA AKUN</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <?php if(session()->getFlashdata('pesan')){ ?>
            <div class="alert alert-primary"><?= session()->getFlashdata('pesan') ?></div>
            <?php } ?>
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header border-0">
                            <?php if(session()->getFlashdata('lengpass')){ ?>
                            <p style="color:red" id="usernameId">
                                <?= session()->getFlashdata('lengpass')  ?></p>
                            <?php } ?>
                            <p style="color:red" id="usernameId">
                                <?= $validation->getError('username') ?></p>
                            <p style="color:red" id="emailId"><?= $validation->getError('email') ?>
                            </p>
                            <p style="color:red" id="passwordId">
                                <?= $validation->getError('password') ?></p>
                            <a class="btn btn-primary tambahUser" data-toggle="modal" data-target="#modalCreate"
                                style="border-radius: 15px; float: right;"><i class="fas fa-plus"
                                    style="margin-right: 5px; "></i>Create</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($loginUser){?>
                                    <?php $no=1; foreach($loginUser as $ls){ ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $ls['username']; ?></td>
                                        <td><?= $ls['email']; ?></td>
                                        <td>xxxx</td>
                                        <td><?= $ls['role']; ?></td>
                                        <td><?= $ls['is_active']; ?></td>
                                        <td><a class="btn button-update" data-toggle="modal" data-id="<?= $ls['id']; ?>"
                                                data-target="#modalUpdate" title="Edit"><i class="fas fa-pen"></i></a>
                                        </td>
                                        <td><a class="btn" onclick="return confirm('Yakin Untuk Menghapusnya?');"
                                                data-toggle="tooltip" title="Delete"
                                                href="/admin/deleteUser/<?= $ls['id']?>.html"><i
                                                    class="fas fa-trash-alt"></i></a></td>
                                        <td><a class="btn modal-detailProfile" title="Detail" data-toggle="modal"
                                                data-target="#modalDetail" data-id="<?= $ls['id']; ?>"><i
                                                    class="fas fa-info-circle"></i></a></td>
                                    </tr>
                                    <?php } ?>
                                    <?php }else{?>
                                    <div
                                        style="position:absolute;margin: auto;left: 50%;top: 150%;transform: translate(-50%, -50%); text-align:center">
                                        <p>Anda Belum
                                            Menambahkan User</p>
                                    </div>
                                    <?php }?>
                                    <!-- 
                                    <tr>

                                        <th class="pag" colspan="10">
                                            <div class="pagination">

                                                <!-- <a href=""><i class="fas fa-chevron-left"></i></a>
                                                <a href="">1</a>
                                                <a href="">2</a>
                                                <a href="">3</a>
                                                <a href="">4</a>
                                                <a href="">5</a>
                                                <a href="">6</a>
                                                <a href=""><i class="fas fa-chevron-right"></i></a> -->
                                    <!-- </div>
                                        </th>
                                    </tr> -->
                                </tbody>
                            </table>

                        </div>

                        <!-- Create Modal -->
                        <div class="modal fade" id="modalCreate" role="dialog" aria-labelledby="createModal"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/admin/tambahUser.html" method="POST">
                                        <?= csrf_field() ?>
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control">

                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control">

                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control">

                                            </div>

                                            <label>Role</label><br>
                                            <select class="form-group" name="role">
                                                <option value="user">User</option>
                                                <option value="petugas">Petugas</option>
                                            </select>
                                            <br>
                                            <label>Active</label><br>
                                            <input type="radio" name="is_active">

                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <!-- Update Modal -->
                        <!-- Create Modal -->
                        <div class="modal fade" id="modalUpdate" role="dialog" aria-labelledby="createModal"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/admin/updateUser.html" method="POST">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="id" id="id">
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" id="username" class="form-control">

                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" id="email" class="form-control">

                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" id="password"
                                                    class="form-control">

                                            </div>

                                            <label>Role</label><br>
                                            <select class="form-group" name="role" id="role">
                                                <option value="user">User</option>
                                                <option value="petugas">Petugas</option>
                                            </select>
                                            <br>
                                            <label>Active</label><br>
                                            <input type="radio" name="is_active" id="is_active" value="1"><br>

                                            <label>No Active</label><br>
                                            <input type="radio" name="is_active" id="no_active" value="0">

                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- Pop Up Profile -->
                        <div class="modal fade" id="modalDetail" role="dialog" aria-labelledby="detailModal"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">PROFILE</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="pfimg">
                                            <img class="pfmodal" src="" alt="">
                                            <h4 class="txtname"></h4>
                                        </div>

                                        <div class="form-group">
                                            <p><i class="far fa-envelope fa-xl txtemail "></i>
                                            </p>
                                        </div>

                                        <div class="form-group">
                                            <p><i class="fas fa-mobile-alt fa-xl txtnomor"></i></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
        <?= $pager->links('userlogin','paging') ?>
    </div>

    <!-- /.content -->
</div>


<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
$('.tambahUser').on('click', function() {
    console.log('ok')
})

$('.button-update').on('click', function() {


    let id = $(this).attr('data-id')


    $.ajax({
        type: "get",
        url: '/admin/getUserByid.html',
        data: {
            id: id

        },
        dataType: "json",
        success: function(response) {
            $('#id').val(response.id)
            $('#username').val(response.username)
            $('#email').val(response.email)
            $('#password').attr("placeholder", "xxxx")
            if (response.role == 'user') {
                $('#role').val('user').attr("selected", "selected");
            } else if (response.role == 'petugas') {
                $('#role').val('petugas').attr("selected", "selected");
            }

            if (response.is_active == 1) {
                $('#is_active').attr("checked", "checked");
            } else {
                $('#no_active').attr("checked", "checked");
            }


        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
})
$('.modal-detailProfile').on('click', function() {


    let id = $(this).attr('data-id')


    $.ajax({
        type: "get",
        url: '/admin/getUserProfileByid.html',
        data: {
            id: id

        },
        dataType: "json",
        success: function(response) {
            if (response == null) {
                $('.modal-body').addClass('d-none')
            } else {
                $('.modal-body').removeClass('d-none')
                $('.pfmodal').attr('src', `/img/${response.foto}`)
                $('.txtemail').html(' ' + response.email)
                $('.txtname').html(response.nama)
                $('.txtnomor').html(' ' + response.nomor)
            }
            // $('#email').val(response.email)
            // $('#password').attr("placeholder", "xxxx")
            // if (response.role == 'user') {
            //     $('#role').val('user').attr("selected", "selected");
            // } else if (response.role == 'petugas') {
            //     $('#role').val('petugas').attr("selected", "selected");
            // }

            // if (response.is_active == 1) {
            //     $('#is_active').attr("checked", "checked");
            // } else {
            //     $('#no_active').attr("checked", "checked");
            // }


        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
})
</script>

<?= $this->endSection(); ?>