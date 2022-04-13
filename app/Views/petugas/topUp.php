<?= $this->extend('template/template_admin'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-dollar-sign mr-2"></i> TOP UP</h1>
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
            <?php if(session()->getFlashdata('pesanError')){ ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('pesanError') ?></div>
            <?php } ?>
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header border-0">
                            <button type="button" class="btn" style="margin-top: 0px;">Top Up</button>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>

                                </thead>
                                <tbody>

                                    <td>
                                        Nominal


                                        <select name="generateSaldo" id="generateSaldo" class="btn dropdown-toggle">
                                            <option value="50000" class="
                                        dropdown-item">50.000</option>
                                            <option value="100000" class="
                                        dropdown-item">100.000</option>
                                        </select>

                                        <a class="btn btn-primary generateCek"
                                            style="background-color: #007bff; margin-top: 0px;" data-toggle="tooltip"
                                            title="Generate">Generate</a>
                                    </td>


                                    <tr class="formTopUp d-none">
                                        <td>Nomor</td>

                                    </tr>
                                    <tr class="formTopUp d-none">
                                        <form action="/petugas/prosesTopup.html" method="post">
                                            <?= csrf_field()?>
                                            <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>"
                                                value="<?= csrf_hash() ?>" />
                                            <td>
                                                <input type="hidden" class="saldoTopup" name="saldo">
                                                <input type="text" name="nomor" class="form-control" style="width: 25%;"
                                                    placeholder="Masukkan Nomor"
                                                    onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                            </td>
                                    </tr>
                                    <tr class="formTopUp d-none">
                                        <td><button type="submit"
                                                onClick="return confirm('Yakin? Tidak Bisa Dibatalkan')"
                                                class="btn btn-primary"
                                                style="background-color: #007bff; margin-top: 0px;">Top
                                                Up</button>
                                            </form>
                                        </td>
                                    </tr>





                                    <!-- <tr>
                      <th class="pag" colspan="10">
                        <div class="pagination">
                          <a href=""><i class="fas fa-chevron-left"></i></a>
                          <a href="">1</a>
                          <a href="">2</a>
                          <a href="">3</a>
                          <a href="">4</a>
                          <a href="">5</a>
                          <a href="">6</a>
                          <a href=""><i class="fas fa-chevron-right"></i></a>
                        </div>
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

                                    <div class="modal-body">
                                        <form action="/admin/tambahUser.html" method="post">
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
                        <div class="modal fade" id="modalUpdate" role="dialog" aria-labelledby="updateModal"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" name="" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>No. HP</label>
                                                <input type="text" name="" class="form-control">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                                    </div>

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
                                            <img class="pfmodal" src="/img/profile.jpg" alt="">
                                            <h4 class="txtname">Rangga Adi Pradana</h4>
                                        </div>

                                        <div class="form-group">
                                            <p><i class="far fa-envelope fa-xl"></i>ranggapradana161@gmail.com</p>
                                        </div>

                                        <div class="form-group">
                                            <p><i class="fas fa-mobile-alt fa-xl"></i>08xxxxxxxxxx</p>
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
    </div>
    <!-- /.content -->
</div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
$('.generateCek').on('click', function() {
    let generateSaldo = $('#generateSaldo').val();
    $.ajax({
        type: "get",
        url: '/petugas/generateSaldo.html',
        data: {
            generateSaldo: generateSaldo
        },
        dataType: "json",
        beforeSend: function() {
            $(".generateCek").attr('disabled', 'disabled');
            $(".generateCek").html(`<div class="spinner-border text-light mt-2" role="status">
            <span class="sr-only">Loading...</span>
          </div>`);;
        },
        complete: function() {
            $(".generateCek").removeAttr('disabled');
            $(".generateCek").removeClass('spinner-border text-light');
            $(".generateCek").html('Generate');
        },
        success: function(response) {
            if (response.success) {
                alert('Berhasil Generate Saldo')
                $('.formTopUp').removeClass('d-none');
                $('.saldoTopup').val(response.success)
            } else if (response.error) {
                alert(response.error)
                $('.formTopUp').addClass('d-none');
            }

        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    })
})
</script>
<?= $this->endSection(); ?>