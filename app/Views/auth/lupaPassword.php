<?= $this->extend('template/template_auth'); ?>
<?= $this->section('content'); ?>
    <section class="body">

        <h2 class="f-pps-m size-head t-a-c txt-login">Masukan Email Anda</h2>

        <div class="wrap-notification">
          
        </div>

        <div class="wrapp-form">
            <form action="/app/lupapassword.html" class="formLupaPassword">
                <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="input-form">
                  <input type="text" name="email" id="inputEmail">
                  <label for="" class="f-pps-l">Email</label>
                </div>
                 <p class="d-none" id="email" ></p>
           <button class="f-pps-l btnReset" type="submit">Reset Password</button>
            </form>

        </div>

    </section>
<?= $this->endSection() ?>

