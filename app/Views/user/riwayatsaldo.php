<!-- content -->
<?= $this->extend('template/template_user'); ?>
<?= $this->section('content'); ?>

<?php if($riwayatsaldoByuser || $terimaSaldo){?>
<section class="content">
    <div class="wrap-day">
        <?php foreach($riwayatsaldoByuser as $rs){?>

        <?php if($rs['deskripsi']=='Top Up'){?>
        <div class="history">
            <div class="info f-pps-l in">Masuk</div>
            <div class="nominal f-pps-l">+<?= $rs['r_saldo']?></div>
            <div class="date-history f-pps-m"><?= $rs['created_at']?></div>
        </div>
        <?php }?>
        <?php if($rs['deskripsi']=='Saldo Anda Telah Terpotong'){?>
        <div class="history">
            <div class="info f-pps-l out">Keluar</div>
            <div class="nominal f-pps-l">-<?= $rs['r_saldo']?></div>
            <div class="date-history f-pps-m"><?= $rs['created_at']?></div>
        </div>
        <?php }?>

        <?php if($rs['deskripsi']=='Mengirim Saldo'){?>
        <div class="history">
            <div class="info f-pps-l out">Mengirim Saldo</div>
            <div class="nominal f-pps-l">-<?= $rs['r_saldo']?></div>
            <div class="date-history f-pps-m"><?= $rs['created_at']?></div>
        </div>
        <?php }?>


        <!-- <div class="history">
            <div class="info f-pps-l out">Kirim</div>
            <div class="nominal f-pps-l">- 10.000</div>
            <div class="date-history f-pps-m">1 April 2022</div>
        </div>
        <div class="history">
            <div class="info f-pps-l in">Terima</div>
            <div class="nominal f-pps-l">+ 100.000</div>
            <div class="date-history f-pps-m">2 April 2022</div>
        </div> -->
        <?php }?>
        <br><br>
        <hr>
        <?php foreach($terimaSaldo as $rs){?>

        <div class="history">
            <div class="info f-pps-l in">Terima Saldo</div>
            <div class="nominal f-pps-l">+<?= $rs['r_saldo']?></div>
            <div class="date-history f-pps-m"><?= $rs['created_at']?></div>
        </div>


        <?php }?>
    </div>

</section>
<?php }else{?>
<p class="text-center">Tidak Ada Riwayat Saldo</p>
<?php }?>
<!-- end content -->

</section>
<?= $this->endSection() ?>