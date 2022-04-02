<?= $this->extend('template/template_user'); ?>
<?= $this->section('content'); ?>
    
      <!-- header nav -->
       
      <!-- end header nav -->


    
    
    
     
      <!-- content -->
      <section class="content">
        <form action="/app/getUserByNomor.html" class="formKirimSaldo">
          <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
              <div class="wrap-input mt-5">
                <input type="text" class="f-pps-m" id="inputNomor" name="nomor" onkeypress="return event.charCode >= 48 && event.charCode <=57" placeholder="Masukkan Nomor "  >
                <label for="" class="f-pps-l">Cari Nomor</label>
              </div>
         
              <p class="d-none" id="nomor" style="color: red; margin-left: 4px;" ></p>
              
          
              <button type="submit" class="f-pps-m cari btn-kirimSaldo">Cari Penerima</button>
        </form>
      </section>
      <!-- end content -->


      <section class="pop-up-discount d-none">
      <div class="wrap-pop-up ">
          <div class="detail-discount-pop-up ">
             
              <div class="close-pop-up-button" id="close-pop-up-button-voucher"></div>
              <div class="wrap-success d-none">
                <div class="wrap-input ">
                  <input type="text" class="f-pps-m" disabled style="background: white;" id="namaNomor">
                  <label for="" class="f-pps-m">Nama Penerima</label>
                </div>
                <div class="wrap-input">
                  <input type="text" class="f-pps-m mt-1" id="inputjumlah" name="saldo"  style="background: white;" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                  <label for="" class="f-pps-m">Jumlah Saldo</label>
                  </div>
                  <p class="d-none" id="jumlah" style="color: red; margin-left: 4px;" ></p>
                  <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                   <button type="submit" class=" f-pps-m btn-kirimSaldo prosesKirimSaldo"><div >Kirim</div></button>
              </div>
          </div>
      </div>
   </section>
 








</section>



  
<?= $this->endSection() ?>
