<?= $this->extend('template/template_user'); ?>
<?= $this->section('content'); ?>
   
      <!-- header nav -->
       
      <!-- end header nav -->


    

      <!-- content -->
      <section class="content" >
               
        <div class="wrap-setting ws1" style="margin-top:40px">
          <h2 class="name-setting-root f-pps-l">Keamanan</h2>
          <div class="menu-setting">
            <a href="/app/verifikasiPin.html">
              <div class="name-setting f-pps-m">
                ubah pin
            </div>
              <div class="icon">
                <i class="fas fa-chevron-right"></i>
              </div>
            </a>
          </div>

          <div class="menu-setting">
            <a href="/app/ubahPinEmail.html">
              <div class="name-setting f-pps-m">
                ubah pin dengan email
              </div>
              <div class="icon">
                <i class="fas fa-chevron-right"></i>
              </div>
            </a>
          </div>

              <div class="menu-setting">
            <a href="/app/ubahEmail.html">
              <div class="name-setting f-pps-m">
                ubah email
              </div>
              <div class="icon">
                <i class="fas fa-chevron-right"></i>
              </div>
            </a>
          </div>

         

        </div>

       
    
      </section>
      <!-- end content -->



    </section>
  
<?= $this->endSection() ?>
