
<?= $this->extend('template/template_user'); ?>
<?= $this->section('content'); ?>

        <h2 class="f-pps-m size-head t-a-c txt-login">Buat Pin Anda</h2>

        <div class="wrap-notification">
          
        </div>

        <div class="wrapp-form ">
            <form class="formPin"  action="/app/tambahPinProfile.html">
                 <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="pin">
                    
                 <p>Masukkan Pin Baru</p>
                <input type="text" id="first" name="first" maxlength="1" onkeypress="return event.charCode >= 48 && event.charCode <=57" onkeyup="clickEvent(this,'second')">
                <input type="text" id="second" maxlength="1" name="second" onkeypress="return event.charCode >= 48 && event.charCode <=57" onkeyup="clickEvent(this,'third')">
                <input type="text" id="third" maxlength="1" name="third" onkeypress="return event.charCode >= 48 && event.charCode <=57" onkeyup="clickEvent(this,'fourth')">
                <input type="text" id="fourth" maxlength="1" onkeypress="return event.charCode >= 48 && event.charCode <=57" name="fourth">
                  <p class="d-none" id="pinNotif" style="color: red;"></p>
                </div>
                
                <div class="konfirmasiPin d-none">
                <i class="fas fa-arrow-left mb-4 backToAwal"></i>
                <p>Konfirmasi Pin</p>
                 <input type="text" id="firstsame" name="samefirst" maxlength="1" onkeypress="return event.charCode >= 48 && event.charCode <=57" onkeyup="clickSameEvent(this,'secondsame')">
                <input type="text" id="secondsame" maxlength="1" name="samesecond" onkeypress="return event.charCode >= 48 && event.charCode <=57" onkeyup="clickSameEvent(this,'thirdsame')">
                <input type="text" id="thirdsame" maxlength="1" name="samethird" onkeypress="return event.charCode >= 48 && event.charCode <=57" onkeyup="clickSameEvent(this,'fourthsame')">
                <input type="text" id="fourthsame" maxlength="1" onkeypress="return event.charCode >= 48 && event.charCode <=57" name="samefourth">
                <p class="d-none" id="pinNotifs" style="color: red;"></p>

                </div>
           
            <div class="f-pps-1 btnPinAwal">Pin</div>
           <button type="submit" class="f-pps-l btnPin d-none">Verifikasi Pin</button>
            </form>
        </div>

    </section>
<?= $this->endSection() ?>