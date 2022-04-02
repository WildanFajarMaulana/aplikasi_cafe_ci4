<?= $this->extend('template/template_user'); ?>
<?= $this->section('content'); ?>
    
      <!-- header nav -->
       
      <!-- end header nav -->


    
      <!-- content -->
        <form action="/app/prosesUbahPassword.html" class="formUbahPassword"  method="post" enctype="multipart/form-data" >
          <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
          <div class="wrap-input">
            <input type="password" class="f-pps-m" id="inputPasswordLama" name="passwordLama" placeholder="Masukkan Password Lama">
            <label for="" class="f-pps-l">Password Lama</label>
          </div>
          <p class="d-none" id="passwordLama" style="color: red; margin-left: 4px;"></p>

          <div class="wrap-input">
            <input type="password" class="f-pps-m" id="inputPasswordBaru" name="passwordBaru" placeholder="Masukkan Password Baru">
            <label for="" class="f-pps-l">Password Baru</label>
          </div>
          <p class="d-none" id="passwordBaru" style="color: red; margin-left: 4px;"></p>

           <div class="wrap-input">
            <input type="password" class="f-pps-m" id="inputKonfirmasiPasswordBaru" name="konfirmasiPasswordBaru" placeholder="Konfirmasi Password Baru">
            <label for="" class="f-pps-l">Konfirmasi Password</label>
          </div>
          <p class="d-none" id="konfirmasiPasswordBaru" style="color: red; margin-left: 4px;" ></p>

        
          <br>
          <p class="d-none" id="foto" ></p>
        
          <button type="submit" class="f-pps-l btn-tambahprofile btnubahpassword">Ubah Password</button>
        </form>
      <!-- end content -->

    </section>



  
<?= $this->endSection() ?>
