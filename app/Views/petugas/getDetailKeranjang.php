<?php foreach($keranjangDetail as $k){?>
<div class="menu">
    <img class="pfmenu" src="/img/<?= $k['gambar_menu']?>" alt="">
    <div class="text-menu">
        <p><?= $k['nama_menu']?></p>
        <p class="banyak-menu">x<?= $k['jumlah']?></p>
        <h5 class="harga-menu">Rp. <?= $k['total_harga']?></h5>
    </div>
</div>
<hr>
<?php }  ?>