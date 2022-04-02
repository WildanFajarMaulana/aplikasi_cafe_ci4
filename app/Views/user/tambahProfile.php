<?= $this->extend('template/template_user'); ?>
<?= $this->section('content'); ?>
    
      <!-- header nav -->
       
      <!-- end header nav -->


     
    
      <!-- content -->
        <form action="/app/prosesProfile.html" class="formTambah"  method="post" enctype="multipart/form-data" >
          <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
          <div class="wrap-input">
            <input type="text" class="f-pps-m" name="nama" placeholder="Masukkan Nama">
            <label for="" class="f-pps-l">Nama</label>
          </div>
          <p class="d-none" id="nama" ></p>

          <div class="wrap-input">
            <input type="text" class="f-pps-m" name="nomor" placeholder="Masukkan Nomor">
            <label for="" class="f-pps-l">Nomor</label>
          </div>
          <p class="d-none" id="nomor" ></p>

           <div class="wrap-input">
            <input type="text" class="f-pps-m" name="alamat" placeholder="Masukkan Alamat">
            <label for="" class="f-pps-l">Alamat</label>
          </div>
          <p class="d-none" id="alamat" ></p>

            <img src="/img/default.jpg" class="fotoProfile" width="200px">
           <div class="wrap-input">
            <input type="file" class="f-pps-m pt-4" name="foto" id="fotoInput" onchange="readGambar()" style="height: 70px;">
            <label for="" class="f-pps-l">Foto</label>
          </div>
          <br>
          <p class="d-none" id="foto" ></p>
        
          <button type="submit" class="f-pps-l btn-tambahprofile">Lengkapi Profil</button>
        </form>
      <!-- end content -->

    </section>



  
<?= $this->endSection() ?>
