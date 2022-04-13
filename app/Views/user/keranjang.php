<?= $this->extend('template/template_user'); ?>
<?= $this->section('content'); ?>







<style type="text/css">
.wrapper {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    padding: 15px;
    text-align: center;
}

.image {
    width: 100%;
    height: 80%;
    background-size: cover;
    margin-bottom: 5px;
}

h2 {
    font-size: 21px;
    margin-top: 20px;
}

p {
    font-size: 17px;
    margin-top: 7.5px;
}
</style>



<!-- content -->
<section class="content">
    <div class="keranjangUser">

    </div>

    <div id="kotakformpesan">
    </div>

</section>
<!-- end content -->

</section>




<!-- pop up location -->
<section class="pop-up-location d-none">
    <div class="wrap-pop-up">
        <div class="detail-location-pop-up">
            <div class="close-pop-up-button" id="close-pop-up-button-location"></div>
            <div class="metode-pembayaran">
                <div class="input-group mb-3">
                    <select class="custom-select pengambilan" id="inputGroupSelect01"
                        style="height: 60px;font-size:18px">
                        <option selected disabled value="metode">Metode Pengiriman</option>
                        <option value="diantarkan">Diantarkan</option>
                        <option value="diambil">Diambil Di Tempat Cafe</option>
                    </select>
                </div>
            </div>
            <div class="search-location-pop-up ">
                <p class="text-center mt-5" id="textOpsi">Pilih Opsimu Terlebih Dahulu</p>
                <div class="wrap-input-search d-none">
                    <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <input type="text" class="search-location f-pps-m" placeholder="Cari Lokasi" id="cariLokasi">
                    <i class="fas fa-search-location"></i>
                </div>

                <div class="result-location">
                    <div class="location-list d-none" id="location-list3">
                        <h2 class="f-pps-m">Ambil Ditempat Cafe</h2>
                    </div>
                    <div id="location-list2" class="d-none">
                        <?php foreach($lokasi as $ls){ ?>
                        <div class="location-list ">
                            <h2 class="f-pps-m"><?= $ls['lokasi'] ?></h2>
                        </div>
                        <?php } ?>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- pop up location -->


<!-- pop up location -->
<section class="pop-up-discount d-none">
    <div class="wrap-pop-up ">
        <div class="detail-discount-pop-up ">
            <div class="close-pop-up-button" id="close-pop-up-button-voucher"></div>
            <div class="search-discount-pop-up">
                <div class="result-discount auto">

                    <div class="discount-list" data-diskon="10">
                        <h2 class="f-pps-m">Potongan 10%</h2>
                    </div>

                    <div class="discount-list" data-diskon="10">
                        <h2 class="f-pps-m">Potongan 10%</h2>
                    </div>

                    <div class="discount-list" data-diskon="10">
                        <h2 class="f-pps-m">Potongan 10%</h2>
                    </div>

                    <div class="discount-list" data-diskon="5">
                        <h2 class="f-pps-m">Potongan 5%</h2>
                    </div>

                    <div class="discount-list" data-diskon="5">
                        <h2 class="f-pps-m">Potongan 5%</h2>
                    </div>

                    <div class="discount-list" data-diskon="10">
                        <h2 class="f-pps-m">Potongan 10%</h2>
                    </div>

                    <div class="discount-list" data-diskon="10">
                        <h2 class="f-pps-m">Potongan 10%</h2>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

</section>

<?= $this->endSection() ?>