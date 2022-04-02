<?= $this->extend('template/template_user'); ?>
<?= $this->section('content'); ?>
    <section class="body">
      <!-- header nav -->
       
      <!-- end header nav -->


     <?= $this->include('component/bottomBar') ?>
    

      <!-- content -->
      <section class="content">
        <?php if($profilByIdLogin){ ?>
        <div class="wrap-profile">
            <div class="photo-profile" style="background-image:url('/img/<?= $profilByIdLogin['foto'] ?>');"></div>
            <div class="detail-profile">
              <h1 class="username f-pps-l"><?= $profilByIdLogin['nama'] ?></h1>
              <p><a href="" class="f-pps-m text-action"><?= $profilByIdLogin['nomor'] ?></a></p>
            </div>
        </div>
        <div class="wrap-setting ws1">
          <h2 class="name-setting-root f-pps-l">Akun</h2>
          <div class="menu-setting">
            <a href="/app/editProfile.html">
              <div class="name-setting f-pps-m">
                ubah Profil
              </div>
              <div class="icon">
                <i class="fas fa-chevron-right"></i>
              </div>
            </a>
          </div>

          <div class="menu-setting">
            <a href="/app/ubahPasswordUser.html">
              <div class="name-setting f-pps-m">
                ubah Kata Sandi
              </div>
              <div class="icon">
                <i class="fas fa-chevron-right"></i>
              </div>
            </a>
          </div>

          <div class="menu-setting">
            <a href="/app/keamanan.html">
              <div class="name-setting f-pps-m">
                keamanan akun
              </div>
              <div class="icon">
                <i class="fas fa-chevron-right"></i>
              </div>
            </a>
          </div>

        </div>

        <div class="wrap-setting">
          <h2 class="name-setting-root f-pps-l">Umum</h2>

          <div class="menu-setting">
            <a href="">
              <div class="name-setting f-pps-m">
                isi ulang saldo
              </div>
              <div class="icon">
                <i class="fas fa-chevron-right"></i>
              </div>
            </a>
          </div>

        

          <div class="menu-setting">
            <a href="">
              <div class="name-setting f-pps-m">
                riwayat transaksi
              </div>
              <div class="icon">
                <i class="fas fa-chevron-right"></i>
              </div>
            </a>
          </div>

          <div class="menu-setting">
            <a href="">
              <div class="name-setting f-pps-m">
                pusat bantuan
              </div>
              <div class="icon">
                <i class="fas fa-chevron-right"></i>
              </div>
            </a>
          </div>

        </div>
      <?php }else{ ?>
         <div class="wrap-profile">
            
            
        </div>
      <center>
       <h4 style="margin-top: 200px; text-align: center; font-size: 18px;">Anda Belum Mengisi Data Profil Anda</h4>
       <a href="/app/tambahProfile.html" class="btn btn-secondary mt-2">Lengkapi Profil</a>
      </center>
      <?php } ?>
      </section>
      <!-- end content -->

      <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
      <div class="button-keluar f-pps-l">Keluar</div>

    </section>
  
<?= $this->endSection() ?>
