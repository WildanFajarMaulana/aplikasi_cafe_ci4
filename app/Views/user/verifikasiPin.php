
<?= $this->extend('template/template_user'); ?>
<?= $this->section('content'); ?>

        <h2 class="f-pps-m size-head t-a-c txt-login">Verifikasi Pin Anda</h2>

        

        <div class="wrapp-form ">
            <form class="formPin"  action="">
                <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div>
                 <p>Masukkan Pin</p>
                <input type="text" id="first" name="first" maxlength="1" onkeypress="return event.charCode >= 48 && event.charCode <=57" onkeyup="clickEvent(this,'second')">
                <input type="text" id="second" maxlength="1" name="second" onkeypress="return event.charCode >= 48 && event.charCode <=57" onkeyup="clickEvent(this,'third')">
                <input type="text" id="third" maxlength="1" name="third" onkeypress="return event.charCode >= 48 && event.charCode <=57" onkeyup="clickEvent(this,'fourth')">
                <input type="text" id="fourth" maxlength="1" onkeypress="return event.charCode >= 48 && event.charCode <=57" name="fourth">
                </div>
                <p class="d-none" id="pinNotif" style="color: red;"></p>
           <button type="submit" class="f-pps-l btnPin">Verifikasi</button>
            </form>
        </div>

    </section>
<?= $this->endSection() ?>