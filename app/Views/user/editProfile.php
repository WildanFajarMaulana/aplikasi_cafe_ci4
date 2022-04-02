<?= $this->extend('template/template_user'); ?>
<?= $this->section('content'); ?>
    
      <!-- header nav -->
       
      <!-- end header nav -->


    
    
      <!-- content -->
        <form action="/app/prosesEditProfile.html" class="formEdit"  method="post" enctype="multipart/form-data" >
            <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
          <input type="hidden" name="fotoLama" value="<?= $profilByIdLogin['foto'] ?>">

          <div class="wrap-input">
            <input type="text" class="f-pps-m" name="nama" placeholder="Masukkan Nama" value="<?= $profilByIdLogin['nama'] ?>">
            <label for="" class="f-pps-l">Nama</label>
          </div>
          <p class="d-none" id="nama" ></p>

          <div class="wrap-input">
            <input type="text" class="f-pps-m" name="nomor" placeholder="Masukkan Nomor" value="<?= $profilByIdLogin['nomor'] ?>">
            <label for="" class="f-pps-l">Nomor</label>
          </div>
          <p class="d-none" id="nomor" ></p>

           <div class="wrap-input">
            <input type="text" class="f-pps-m" name="alamat" placeholder="Masukkan Alamat" value="<?= $profilByIdLogin['alamat'] ?>">
            <label for="" class="f-pps-l">Alamat</label>
          </div>
          <p class="d-none" id="alamat" ></p>
          <!-- <div class="fotoProfile " style="background-image: url('/img/<?= $profilByIdLogin['foto'] ?>');"> -->
          <img src="/img/<?= $profilByIdLogin['foto'] ?>" class="fotoProfile" width="200px">
          </div>
           <div class="wrap-input">
            <input type="file" class="f-pps-m pt-4" name="foto" id="fotoInput" style="height: 70px;" onchange="readGambar()">
            <label for="" class="f-pps-l">Foto</label>
          </div>
          <br>
          <p class="d-none" id="foto" ></p>
        
          <button type="submit" class="f-pps-l btn-editProfile">Edit Profil</button>
        </form>
      <!-- end content -->

    </section>



  
<?= $this->endSection() ?>
