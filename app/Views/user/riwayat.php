 <?= $this->extend('template/template_user'); ?>
 <?= $this->section('content'); ?>



 <!-- button-bar -->

 <?= $this->include('component/bottomBar') ?>

 <!-- end-button-bar -->


 <!-- button switch page -->
 <section class="switch-page">
     <div class="wrap-switch-page">
         <div class="switch f-pps-l aktif riwayatProses">Dalam Proses</div>
         <div class="switch f-pps-l riwayatSelesai">Riwayat</div>


     </div>
 </section>
 <!-- end button switch page -->


 <!-- content -->
 <!--  <section class="content" id="contentCadangan" >
          <?php if($tampildata){ ?>
         <?php 
          $proses='';
          if($tampildata['status_tranksaksi']=='diproses'){
            $proses='Menunggu Konfirmasi';
          }elseif ($tampildata['status_tranksaksi']=='dikonfirmasi') {
            $proses='Pesanan Diantarkan';
          }

         ?>
         <div class="history">
              <div class="icon-history" style="background-image: url('/img/shopping_bag.png');"></div>
              <div class="detail-history">  
                  <h2 class="f-pps-l- text-ruang"><?= $tampildata['pengiriman'] ?></h2>
                  <p class="f-pps-m text-proses"><?= $proses ?></p>
                  <p class="f-pp-sm text-tanggal"><?= $tampildata['created_at'] ?></p>
              </div>  
          </div>

        <?php }else{ ?>
            <p class="text-center">Tidak Ada Pesanan Berlangsung</p>
        <?php } ?>
        </section> -->
 <section class="content">

 </section>

 <!-- end content -->

 </section>




 <?= $this->endSection() ?>