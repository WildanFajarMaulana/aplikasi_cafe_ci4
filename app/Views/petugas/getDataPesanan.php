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
    <td><a class="btn" title="Detail" data-toggle="modal" data-target="#modalDetail"><i
                class="fas fa-utensils bg-primary text-white rounded" style="padding: 0.35rem !important;"></i></a></td>
    <?php if($p['status_tranksaksi']=='diproses'){ ?>

    <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
    <input type="hidden" name="id_pembeli" id="id_pembeli" value="<?=$p['id_pembeli'] ?>">
    <td>
        <div class="btn btnkonfirmasi" title="Konfirmasi"><i class="fas fa-check bg-warning text-white rounded"
                style="padding: 0.35rem !important;"></i></div>
    </td>

    <?php }else if($p['status_tranksaksi']=='dikonfirmasi'){?>

    <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
    <input type="hidden" name="id_pembeli" id="id_pembeli" value="<?=$p['id_pembeli'] ?>">
    <input type="hidden" name="payment" value="<?=$p['payment'] ?>">
    <td>
        <div class="btnakhiri" title="Akhiri"><i class="fas fa-check bg-success text-white rounded"
                style="padding: 0.35rem !important;"></i></div>

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

<script>
$(document).ready(function() {
    $('.btn-detail').on('click', function() {
        console.log('okok')
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
        const id_pembeli = $('#id_pembeli').val();
        console.log('s')

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
})
$('.btnakhiri').on('click', function() {
    var csrfName = $('.csrfCafe').attr('name'); // CSRF Token name
    var csrfHash = $('.csrfCafe').val(); // CSRF hash
    const id_pembeli = $('#id_pembeli').val();

    $.ajax({
        type: "post",
        url: '/petugas/akhiriPesanan.html',
        data: {
            id_pembeli: id_pembeli,
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
</script>