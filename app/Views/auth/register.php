<?= $this->extend('template/template_auth'); ?>
<?= $this->section('content'); ?>
    <section class="body">

        <h2 class="f-pps-m size-head t-a-c txt-login">Login To Continue</h2>

        <div class="wrap-notification">
          
        </div>

        <div class="wrapp-form">
            <form action="/app/prosesregister.html" class="formRegister">
                <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="input-form">
                  <input type="text" name="username" id="inputUsername">
                  <label for="" class="f-pps-l">Username <span>*</span></label>
                  
                </div>
                <p class="d-none" id="username" ></p>

                <div class="input-form">
                  <input type="text" name="email" id="inputEmail">
                  <label for="" class="f-pps-l">Email <span>*</span></label>
                 
                </div>
                 <p class="d-none" id="email" ></p>
              
                <div class="input-form">
                  <input type="password" name="password" id="inputPassword" >
                  <label for="" class="f-pps-l">Password <span>*</span></label>
                 
                </div>
                 <p class="d-none" id="password" ></p>
                <div class="input-form">
                  <input type="password" name="konfirmasiPassword" id="inputKonfirmasiPassword">
                  <label for="" class="f-pps-l">Konfirmasi Password <span>*</span></label>
                  
                </div> 
                <p class="d-none" id="konfirmasiPassword" ></p>
                <button class="login btnregister" type="submit">Register</button>
            </form>

         <!--    <div class="line">
              <label for="" class="f-pps-m">Or</label>
            </div>
            <button class="google-auth">Google</button>
 -->

            <div class="sign-up">
              <p class="f-pps-l">have an account? <a href="/app/login.html" class="f-pps-xl">SIGN IN</a></p>
            </div>
        </div>

    </section>
<?= $this->endSection() ?>
