<?= $this->extend('template/template_admin'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <?php if(session()->getFlashdata('pesan')){ ?>
            <div class="alert alert-primary"><?= session()->getFlashdata('pesan') ?></div>
            <?php } ?>
            <?php if(session()->getFlashdata('pesanError')){ ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('pesanError') ?></div>
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


                        <!-- Modal -->
                        <div class="modal fade" id="notifModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Chat</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body pesanNotif">



                                    </div>

                                </div>
                            </div>
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
                                                    data-id="<?= $p['id_pembeli']?>"
                                                    data-trx="<?= $p['id_tranksaksi']?>" data-toggle="modal"
                                                    data-target="#modalDetail"><i
                                                        class="fas fa-utensils bg-primary text-white rounded"
                                                        style="padding: 0.35rem !important;"></i></a></td>
                                            <td><a class="btn btn-tambah" title="Add" data-id="<?= $p['id_pembeli']?>"
                                                    data-trx="<?= $p['id_tranksaksi']?>" data-toggle="modal"
                                                    data-target="#modalTambah"><i
                                                        class="fas fa-plus bg-secondary text-white rounded"
                                                        style="padding: 0.35rem !important;"></i></a></td>
                                            <td><a class="btn btn-message" title="Message"
                                                    href="/petugas/messageTranksaksi/<?= $p['id_tranksaksi'] ?>.html"><i
                                                        class="fas fa-comment-alt-lines bg-success text-white rounded"
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
                        <div class="modal fade" id="modalTambah" role="dialog" aria-labelledby="createModal"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Menu</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="/petugas/tambahMenuTranksaksi.html" method="post">
                                            <?= csrf_field()?>
                                            <input type="hidden" name="id_pembeli" class="id_pembeli_add">
                                            <input type="hidden" name="id_tranksaksi" class="id_tranksaksi_add">

                                            <label>Menu</label><br>
                                            <select class="form-group" name="id_menu">
                                                <?php foreach($menuAll as $m){?>
                                                <option value="<?= $m['id']?>"><?= $m['nama']?>(<?= $m['harga'] ?>)
                                                </option>
                                                <?php }?>
                                            </select>
                                            <br>
                                            <label>jumlah</label><br>
                                            <input type="text" name="jumlah_add" id="jumlah_add"
                                                onkeypress="return event.charCode >= 48 && event.charCode <=57">

                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                    </form>
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

                                    <div class="modal-body modal-detail">



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
var socket = io.connect("https://chat-maucafe.herokuapp.com");
socket.on("admin notif", function(msg) {
    let pesanNotif = ` <div class="dataPesanNotif">
                                            <h5 style="font-weight:bold">${msg.name}</h5>
                                            <p >${msg.msg}</p>
                                            <hr>
                                        </div>`;
    $('.pesanNotif').append(pesanNotif);
    showNotifModal();

});

const showNotifModal = () => {
    $('#notifModal').modal('show');
}






























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

function getDetaildata() {
    $('.btn-detail').on('click', function() {
        const id_pembeli = $(this).attr('data-id')
        const id_tranksaksi = $(this).attr('data-trx')
        console.log(id_pembeli)
        console.log(id_tranksaksi)
        $.ajax({
            type: "get",
            url: '/petugas/getDetailKeranjangByidpembeli.html',
            data: {
                id_pembeli: id_pembeli,
                id_tranksaksi: id_tranksaksi

            },
            dataType: "json",
            success: function(response) {
                $('.modal-detail').html(response.data)



            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    })
}

$(document).ready(function() {
    setInterval(function() {
        dataPesanan();
    }, 10000);
    $('.hapusMenuKeranjang').on('click', function() {
        console.log('luar')
    })
    getDetaildata();
    $('.btn-tambah').on('click', function() {
        const id_pembeli = $(this).attr('data-id')
        const id_tranksaksi = $(this).attr('data-trx')
        $('.id_pembeli_add').val(id_pembeli)
        $('.id_tranksaksi_add').val(id_tranksaksi)
        console.log(id_pembeli)
        console.log(id_tranksaksi)
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
                if (response.errorSaldo) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Gagal',
                        text: response.errorSaldo

                    })
                }
                if (response.errorPayment) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Gagal',
                        text: response.errorPayment

                    })
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