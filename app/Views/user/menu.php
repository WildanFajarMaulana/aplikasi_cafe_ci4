<?= $this->extend('template/template_user'); ?>
<?= $this->section('content'); ?>
    

   
 


      <!-- button-bar -->
       <?= $this->include('component/bottomBar') ?>
      <!-- end-button-bar -->


      <!-- menu rekomendasi -->
      <section class="menu-rekomendasi">
        <h2 class="text-rekomendasi f-pps-l">Mau Minuman</h2>

        <div class="wrap-menu-rekomendasi menu-minuman">
         
        </div>
      </section>
      <div class="clear"></div>
      <section class="menu-rekomendasi">
        <h2 class="text-rekomendasi f-pps-l">Mau Makanan</h2>

        <div class="wrap-menu-rekomendasi menu-makanan">
         

        </div>
      </section>
      <div class="clear"></div>

     

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
    
  
    </section>
<?= $this->endSection() ?>

