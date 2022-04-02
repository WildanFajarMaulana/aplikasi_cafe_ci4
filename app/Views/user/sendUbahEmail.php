<?= $this->extend('template/template_user'); ?>
<?= $this->section('content'); ?>
    
      <!-- header nav -->
       
      <!-- end header nav -->

       <input type="hidden" name="flashdata" value="<?= session()->getFlashdata('flashdataInput') ?>" id="flashdataInput">
          <div class="flashdata" data-flashdata="<?= session()->getFlashdata('pesan') ?>"></div>
        
          <div class="flashdataGagal" data-flashdata="<?= session()->getFlashdata('pesanGagal') ?>"></div>
    
      <!-- content -->
        <form action="" class="formUbahPinEmail"  method="post" enctype="multipart/form-data" >
          <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
          <div class="wrap-input">
            <input type="text" class="f-pps-m" id="inputEmail" name="email" readonly="" value="<?= @$profilByIdLogin['email']  ?>"placeholder="Masukkan Email Anda">
            <label for="" class="f-pps-l">Email Anda</label>
          </div>
         
          <p class="d-none" id="email" style="color: red; margin-left: 4px;" ></p>

        
       
        
          <button type="submit" class="f-pps-l btn-tambahprofile btnReset">Ubah Email</button>
        </form>
      <!-- end content -->

    </section>



  
<?= $this->endSection() ?>
