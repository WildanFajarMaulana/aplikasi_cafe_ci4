
<?= $this->extend('template/template_auth'); ?>
<?= $this->section('content'); ?>
  
    <section class="body">
          <input type="hidden" name="flashdata" value="<?= session()->getFlashdata('flashdataInput') ?>" id="flashdataInput">
          <div class="flashdata" data-flashdata="<?= session()->getFlashdata('pesan') ?>"></div>
        
          <div class="flashdataGagal" data-flashdata="<?= session()->getFlashdata('pesanGagal') ?>"></div>
        
        <h2 class="f-pps-m size-head t-a-c txt-login">Login To Continue</h2>

        <div class="wrap-notification">
          
        </div>

        <div class="wrapp-form">
            <form action="/app/proseslogin.html" class="formLogin">
              <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="input-form">
                  <input type="text" name="email" id="inputEmail" >
                  <label for="" class="f-pps-l">Email/Username</label>
                </div>
                <p class="d-none" id="email" ></p>
                <div class="input-form">
                  <input type="password" name="password" id="inputPassword" >
                  <label for="" class="f-pps-l">Password</label>
                </div>
                <p class="d-none" id="password" ></p>
                <div class="input-form">
                  <div class="wrap-left">
                    <!-- <input type="checkbox" name="remember" id="remember" <?= (isset($_COOKIE["userpassword "]))?'checked':''  ?>>
                    <label for="remember" class="f-pps-m">Remember Me</label> -->
                  </div>
                  <div class="wrap-right">
                    <a href="/app/lupapass.html" class="f-pps-m">Lupa sandi ?</a>
                  </div>
                </div>

                <a href="beranda.html">
                  <button type="submit" class="login button f-pps-m btnLogin" >Login</button>
                </a>
            </form>

           <!--  <div class="line">
              <label for="" class="f-pps-m">Or</label>
            </div>
            <button class="google-auth">Google</button>
 -->

            <div class="sign-up">
              <p class="f-pps-l">Don’t have an account? <a href="/app/register.html" class="f-pps-xl">SIGN UP</a></p>
            </div>
        </div>

    </section>
<?= $this->endSection() ?>

