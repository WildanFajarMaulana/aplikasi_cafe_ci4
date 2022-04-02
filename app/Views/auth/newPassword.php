<?= $this->extend('template/template_auth'); ?>
<?= $this->section('content'); ?>
  <section class="body">

        <h2 class="f-pps-m size-head t-a-c txt-login">Buat Sandi Baru</h2>

        <div class="wrap-notification">
          
        </div>

        <div class="wrapp-form">
            <form action="/app/prosesnewpassword.html" class="formNewPassword">
                 <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                 <input type="hidden" name="emailNewPassword" value="<?= $usertokenPasswordGet['email'] ?>">
                 <input type="hidden" name="tokenNewPassword" value="<?= $usertokenPasswordGet['token'] ?>">
                <input type="hidden" name="typeNewPassword" value="<?= $usertokenPasswordGet['type'] ?>">
               <div class="input-form">
                  <input type="password" name="password" id="inputPassword">
                  <label for="" class="f-pps-m" >Sandi Baru</label>
               </div>
               <p class="d-none" id="password" ></p>
               <div class="input-form">
                   <input type="password" name="konfirmasiPassword" id="inputKonfirmasiPassword">
                  <label for="" class="f-pps-m">Konfirmasi Sandi</label>
               </div>
               <p class="d-none"  id="konfirmasiPassword" ></p>
           <button class="f-pps-l btnnewpassword" type="submit">Reset Password</button>
            </form>

        </div>

    </section>
<?= $this->endSection() ?>
