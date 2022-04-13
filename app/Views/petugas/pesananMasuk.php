<?= $this->extend('template/template_admin'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <?php if(session()->getFlashdata('pesan')){ ?>
            <div class="alert alert-primary"><?= session()->getFlashdata('pesan') ?></div>
            <?php } ?>
            <div class="alert alert-primary d-none" id="notifJs"></div>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-utensils mr-2"></i> PESANAN MASUK</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header border-0">
                            <!-- <button id="dropdownMenuButton" type="button" class="btn dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #dddddd;">Menu</button>
                <button id="dropdownMenuButton" type="button" class="btn dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #dddddd;">Harga</button>
                <button id="dropdownMenuButton" type="button" class="btn dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #dddddd;">Tanggal</button>
                <button id="dropdownMenuButton" type="button" class="btn dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #dddddd;">Tanggal</button>
              
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Deby Saputra Pratama</a>
                  <a class="dropdown-item" href="#">Rangga Adi Pradana</a>
                </div> -->

                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Payment</th>
                                        <th>Total_pembayaran</th>
                                        <th>Pengiriman</th>
                                        <th>Status Tranksaksi</th>
                                        <th>Tanggal</th>
                                        <th colspan="3">Konfirmasi</th>
                                    </tr>
                                </thead>
                                <tbody class="dataPesanan">
                                    <div class="cadanganPesanan">
                                        <?php if($pesananMasuk){?>
                                        <?php $no=1; foreach($pesananMasuk as $p){?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $p['nama_pembeli'] ?></td>
                                            <td><?= $p['email'] ?></td>
                                            <td><?= $p['payment'] ?></td>
                                            <td><?= $p['total_pembayaran'] ?></td>
                                            <td><?= $p['pengiriman'] ?></td>
                                            <td><?= $p['status_tranksaksi'] ?></td>
                                            <td><?= $p['created_at'] ?></td>
                                            <td><a class="btn btn-detail" title="Detail"
                                                    data-id="<?= $p['id_pembeli']?>" data-toggle="modal"
                                                    data-target="#modalDetail"><i
                                                        class="fas fa-utensils bg-primary text-white rounded"
                                                        style="padding: 0.35rem !important;"></i></a></td>
                                            <?php if($p['status_tranksaksi']=='diproses'){ ?>

                                            <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>"
                                                value="<?= csrf_hash() ?>" />
                                            <input type="hidden" name="id_pembeli" id="id_pembeli"
                                                value="<?=$p['id_pembeli'] ?>">
                                            <td>
                                                <div class="btn btnkonfirmasi" data-id="<?= $p['id_pembeli']?>"
                                                    title="Konfirmasi"><i
                                                        class="fas fa-check bg-warning text-white rounded"
                                                        style="padding: 0.35rem !important;"></i></div>
                                            </td>

                                            <?php }else if($p['status_tranksaksi']=='dikonfirmasi'){?>

                                            <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>"
                                                value="<?= csrf_hash() ?>" />
                                            <input type="hidden" name="id_pembeli" id="id_pembeli"
                                                value="<?=$p['id_pembeli'] ?>">
                                            <input type="hidden" name="payment" value="<?=$p['payment'] ?>">
                                            <td>
                                                <div class="btnakhiri" data-id="<?= $p['id_pembeli']?>"
                                                    data-payment="<?= $p['payment']?>" title="Akhiri">
                                                    <i class="fas fa-check bg-success text-white rounded"
                                                        style="padding: 0.35rem !important;"></i>
                                                </div>
                                            </td>

                                            <?php } ?>
                                            <td><a class="btn"
                                                    href="/petugas/deletePesanan/<?= $p['id_tranksaksi'] ?>.html"
                                                    title="Delete" onclick="return confirm('apakah anda yakin')"><i
                                                        class="fas fa-times bg-danger text-white rounded"
                                                        style="padding: 0.35rem !important;"></i></a></td>
                                        </tr>
                                        <?php } ?>
                                        <?php }else{?>
                                        <div
                                            style="position:absolute;margin: auto;left: 50%;top: 150%;transform: translate(-50%, -50%); text-align:center">
                                            <p>Belum Ada Pesanan</p>
                                        </div>
                                        <?php }?>
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
                                    </div>
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

                        <div class="modal fade" id="modalDetail" role="dialog" aria-labelledby="detailModal"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Pesanan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">



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
        <?= $pager->links('useraccpesan','paging') ?>
    </div>
    <!-- /.content -->
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
function dataPesanan() {
    $.ajax({
        url: "/petugas/getDataPesanan.html",
        dataType: "json",
        success: function(response) {
            $('.cadanganPesanan').remove();
            $(".dataPesanan").html(response.data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        },
    });
}

$(document).ready(function() {
    setInterval(function() {
        dataPesanan();
    }, 10000);

    $('.btn-detail').on('click', function() {
        const id_pembeli = $(this).attr('data-id')
        $.ajax({
            type: "get",
            url: '/petugas/getDetailKeranjangByidpembeli.html',
            data: {
                id_pembeli: id_pembeli

            },
            dataType: "json",
            success: function(response) {
                $('.modal-body').html(response.data)



            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    })
    $('.btnkonfirmasi').on('click', function() {
        var csrfName = $('.csrfCafe').attr('name'); // CSRF Token name
        var csrfHash = $('.csrfCafe').val(); // CSRF hash
        const id_pembeli = $(this).attr('data-id')
        console.log(id_pembeli);
        $.ajax({
            type: "post",
            url: '/petugas/konfirmasiPesanan.html',
            data: {
                id_pembeli: id_pembeli,
                [csrfName]: csrfHash
            },
            dataType: "json",
            success: function(response) {
                $('.csrfCafe').val(response.token);
                if (response.success) {
                    $('#notifJs').removeClass('d-none');
                    $('#notifJs').html('Pesanan Berhasil Dikonfirmasi')
                    setTimeout(function() {
                        window.location.href = '/petugas/managePesanan.html';
                    }, 1300)


                }


            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })
        return false;
    })
    $('.btnakhiri').on('click', function() {
        var csrfName = $('.csrfCafe').attr('name'); // CSRF Token name
        var csrfHash = $('.csrfCafe').val(); // CSRF hash
        const id_pembeli = $(this).attr('data-id')
        const payment = $(this).attr('data-payment')
        $.ajax({
            type: "post",
            url: '/petugas/akhiriPesanan.html',
            data: {
                id_pembeli: id_pembeli,
                payment: payment,
                [csrfName]: csrfHash
            },
            dataType: "json",
            success: function(response) {
                $('.csrfCafe').val(response.token);
                if (response.success) {
                    $('#notifJs').removeClass('d-none');
                    $('#notifJs').html('Pesanan Berhasil Diakhiri')
                    setTimeout(function() {
                        window.location.href = '/petugas/managePesanan.html';
                    }, 1300)


                }


            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })
        return false;
    })
})
</script>

<?= $this->endSection(); ?>