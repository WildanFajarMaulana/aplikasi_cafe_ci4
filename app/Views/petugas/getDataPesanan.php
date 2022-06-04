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
    <td><a class="btn btn-detail" title="Detail" data-id="<?= $p['id_pembeli']?>" data-trx="<?= $p['id_tranksaksi']?>"
            data-toggle="modal" data-target="#modalDetail"><i class="fas fa-utensils bg-primary text-white rounded"
                style="padding: 0.35rem !important;"></i></a></td>
    <td><a class="btn btn-tambah" title="Add" data-id="<?= $p['id_pembeli']?>" data-trx="<?= $p['id_tranksaksi']?>"
            data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus bg-secondary text-white rounded"
                style="padding: 0.35rem !important;"></i></a></td>
    <td><a class="btn btn-message" title="Message" href="/petugas/messageTranksaksi/<?= $p['id_tranksaksi'] ?>.html"><i
                class="fas fa-comment-alt-lines bg-success text-white rounded"
                style="padding: 0.35rem !important;"></i></a></td>

    <?php if($p['status_tranksaksi']=='diproses'){ ?>

    <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
    <input type="hidden" name="id_pembeli" id="id_pembeli" value="<?=$p['id_pembeli'] ?>">
    <td>
        <div class="btn btnkonfirmasi" data-id="<?= $p['id_pembeli']?>" title="Konfirmasi"><i
                class="fas fa-check bg-warning text-white rounded" style="padding: 0.35rem !important;"></i></div>
    </td>

    <?php }else if($p['status_tranksaksi']=='dikonfirmasi'){?>

    <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
    <input type="hidden" name="id_pembeli" id="id_pembeli" value="<?=$p['id_pembeli'] ?>">
    <input type="hidden" name="payment" value="<?=$p['payment'] ?>">
    <td>
        <div class="btnakhiri" data-id="<?= $p['id_pembeli']?>" data-payment="<?= $p['payment']?>" title="Akhiri">
            <i class="fas fa-check bg-success text-white rounded" style="padding: 0.35rem !important;"></i>
        </div>
    </td>

    <?php } ?>
    <td><a class="btn" title="Delete" href="/petugas/deletePesanan/<?= $p['id_tranksaksi'] ?>.html"
            onclick="return confirm('apakah anda yakin')"><i class="fas fa-times bg-danger text-white rounded"
                style="padding: 0.35rem !important;"></i></a></td>
</tr>

<?php } ?>
<?php }else{?>
<div style="position:absolute;margin: auto;left: 50%;top: 150%;transform: translate(-50%, -50%); text-align:center">
    <p>Belum Ada Pesanan</p>
</div>
<?php }?>
<!-- Create Modal -->
<div class="modal fade" id="modalTambah" role="dialog" aria-labelledby="createModal" aria-hidden="true">
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
<div class="modal fade" id="notifModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

$(document).ready(function() {
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