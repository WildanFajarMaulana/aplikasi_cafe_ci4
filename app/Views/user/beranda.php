<?= $this->extend('template/template_user'); ?>
<?= $this->section('content'); ?>
   
      <!-- end header nav -->
      <!-- button-bar -->
      
      <?= $this->include('component/bottomBar') ?>
      <!-- end-button-bar -->
      <!-- end-button-bar -->
      <!-- search form -->
      <<!-- div class="search-wrap">
        <form action="" method="">
          <input type="text" name="username" placeholder="Mau makan apa hari ini ?" class="f-pps-s">
        </form>
      </div> -->
      <!-- end search form -->
      <!-- wrap info beranda -->
      <?php if(!$profilByIdLogin){ ?>
         <div class="beranda-info">
        <div class="g-pay-info">
          <h3 class="label-name f-pps-l">G-Pay</h3>
          <div>
            <h2 class="balance f-pps-l">Rp. -</h2>
          </div>
        </div>
        <div class="wrap-three-buton">
          <a href="otp.html">
            <a href="/app/profile.html"><div class="t-btn t-btn-1">
              <i class="far fa-arrow-up"></i>
              <label for="" class="f-pps-l">Kirim</label>
            </div>
          </a>
          <a href="otp.html">
            <a href="/app/profile.html"><div class="t-btn t-btn-2">
            <i class="far fa-plus"></i>
              <label for="" class="f-pps-l">Isi Saldo</label>
            </div>
            </a>
          </a>
          <a href="riwayat">
            <a href="/app/profile.html"><div class="t-btn t-btn-3">
            <i class="far fa-clipboard-list"></i>
              <label for="" class="f-pps-l">Riwayat</label>
            </div></a>
          </a>
        </div>
      </div>
      <?php }else{ ?>
         <div class="beranda-info">
        <div class="g-pay-info">
          <h3 class="label-name f-pps-l">G-Pay</h3>
          <div>
            <h2 class="balance f-pps-l">Rp.<?= $profilByIdLogin['saldo'] ?></h2>
          </div>
        </div>
        <div class="wrap-three-buton">
          <a href="/app/kirimSaldo.html">
            <div class="t-btn t-btn-1">
              <i class="far fa-arrow-up"></i>
              <label for="" class="f-pps-l">Kirim</label>
            </div>
          </a>
          <a href="otp.html">
            <div class="t-btn t-btn-2">
              <i class="far fa-plus"></i>
              <label for="" class="f-pps-l">Isi Saldo</label>
            </div>
          </a>
          <a href="riwayat">
            <div class="t-btn t-btn-3">
              <i class="far fa-clipboard-list"></i>
              <label for="" class="f-pps-l">Riwayat</label>
            </div>
          </a>
        </div>
      </div>
      <?php } ?>
     
      <!-- end wrap info beranda -->
      <!-- wrap pengiriman -->
       <div id="alert-pemesanan">

       </div>
       <div id="backupAlert">
           <?php if(@$cekTranksaksiByIdStatus['status_tranksaksi']=='diproses'){ ?>
      <section class="send-swicth">
        <div class="icon-send">
          <div class="text-send">
            <h2 class="f-pps-m" style="font-size: 15px;">Menunggu Konfirmasi</h2>
            <p class="f-pps-s">Silahkan Tunggu</p>
          </div>
          
        </div>
      </section>
      <?php }else if(@$cekTranksaksiByIdStatus['status_tranksaksi']=='dikonfirmasi'){ ?>
        <section class="send-swicth">
        <div class="icon-send" style="background-color: yellow">
          <div class="text-send">
            <h2 class="f-pps-m" style="font-size: 15px;">Pesan Antar</h2>
            <p class="f-pps-s">Diantar dalam 10 menit</p>
          </div>
          
        </div>
      </section>
    <?php }else if(@$cekTranksaksiByIdStatus['status_tranksaksi']=='selesai' && @$cekTranksaksiByIdStatus['show_pemesanan']==0){ ?>
      <div id="wrapper-alert">
         <section class="send-swicth">
        <div class="icon-send" style="background-color: green;">
          <div class="text-send" >
            <h2 class="f-pps-m" style="font-size: 15px;">Pesanan Telah Sampai</h2>
            <p class="f-pps-s">Terima Kasih</p>
          </div>
          <div class="close-icon">
            <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
              <i class="fal fa-times " id="closeAlert" data-id="<?= $cekTranksaksiByIdStatus['id'] ?>"></i>
          </div>
          
        </div>
      </section>
      </div>

    <?php } ?>

       </div>
      <!-- end wrap pengiriman -->
      <!-- menu rekomendasi -->
      <section class="menu-rekomendasi">
        <h2 class="text-rekomendasi f-pps-l">Rekomendasi</h2>
        <div class="wrap-menu-rekomendasi rekomendasiMenu">
        
        </div>
      </section>
      <!-- end menu rekomendasi -->
      <!-- menu list -->
      <div class="clear"></div>
      <section class="menu-list mt-2">
         <h2 class="text-rekomendasi f-pps-l">Menu 1</h2>
        <div class="wrap-menu-list rekomendasiMinuman">
         
          
          
        </div>
      </section>
       <div class="clear"></div>
       <section class="menu-list mt-2">
        <h2 class="text-rekomendasi f-pps-l ">Menu 2</h2>
        <div class="wrap-menu-list rekomendasiMakanan">
          
          
          
        </div>
      </section>
      <div class="clear"></div>
    <!--   end menu list -->
    <!-- </section>  -->
    <!-- pop up -->
    <section class="pop-up d-none">
      <div class="wrap-pop-up">
        <form action="/app/tambahKeranjang.html" class="formMenu">
           <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
        <div class="detail-pop-up">
          <div class="close-pop-up-button"></div>
          <div class="thumbnail-pop-up" style="background-image: url('/img/bandeng-presto.png');"></div>
          <div class="desc-pop-up">
           
            <input type="hidden" name="id_menu" id="id_menu">
            <input type="hidden" name="harga" id="harga">
            <input type="hidden" name="nama_menu" id="nama_menu">
            <input type="hidden" name="gambar_menu" id="gambar_menu" >
            <h2 class="title nama-makanan f-pps-l">Bandeng ePresto</h2>
            <p class="harga h-makanan f-mts-m">Rp. 10.000</p>
            <div class="button-add">
              <div class="column-button-add button-minus">
                <i class="fas fa-minus"></i>
              </div>
              <div class="column-button-add">
                <input type="" name="jumlah" class="value-pesan" value="0"></input>
              </div>
              <div class="column-button-add button-plus">
                <i class="fas fa-plus"></i>
              </div>
            </div>
          </div>
          <button type="submit" ><div class="button-submit-pesanan f-pps-l btnMenu" >Tambahkan ke keranjang</div></button>
        </div>
        </form>
      </div>
    </section>
<?= $this->endSection() ?>

