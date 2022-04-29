<?php foreach($keranjangDetail as $k){?>
<!-- <div class="menu">
    <img class="pfmenu" src="/img/<?= $k['gambar_menu']?>" alt="">
    <div class="text-menu">
        <p><?= $k['nama_menu']?></p>
        <p class="banyak-menu">x<?= $k['jumlah']?></p>
        <h5 class="harga-menu">Rp. <?= $k['total_harga']?></h5>
    </div style="margin-left:100px">
    <div> <i class="fas fa-trash-alt hapusMenuKeranjang" data-id="<?= $k['id'] ?>"></i>
    </div>
</div> -->
<div class="order-list">
    <div class="left">
        <h2 class="title-menu f-pps-l"><?= $k['nama_menu'] ?></h2>

        <p class="harga-menu f-mts-l"><?= $k['total_harga'] ?></p>


        <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

        <i class="fas fa-trash-alt hapusMenuKeranjang" data-id="<?= $k['id'] ?>"></i>

    </div>

    <div class="right">

        <div class="thumbnail-menu-order" style="background-image: url('/img/<?= $k['gambar_menu'] ?>');"></div>

        <div class="count-order-menu">
            <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

            <button data-id="0" data-no="<?= $k['id'] ?>" class="button-minus">
                <i class="fas fa-minus"></i>
            </button>

            <div class="f-pps-m value-order"><?= $k['jumlah'] ?></div>

            <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

            <button data-id="0" class="button-plus" data-no="<?= $k['id'] ?>">
                <i class="fas fa-plus"></i>
            </button>

        </div>
    </div>
</div>

<hr>
<?php }  ?>

<script>
$(document).ready(function() {
    $('.hapusMenuKeranjang').on('click', function() {
        console.log('dalam  ')
    })
})
</script>