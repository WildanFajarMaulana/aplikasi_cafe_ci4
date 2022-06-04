  <?php if(@$cekTranksaksiByIdStatus['status_tranksaksi']=='diproses'){ ?>
  <section class="send-swicth">
      <div class="icon-send">
          <div class="text-send">
              <h2 class="f-pps-m" style="font-size: 15px;">Menunggu Konfirmasi</h2>
              <p class="f-pps-s">Silahkan Tunggu</p>
          </div>

      </div>
  </section>
  <?php }else if(@$cekTranksaksiByIdStatus['status_tranksaksi']=='dikonfirmasi'){ ?>
  <section class="send-swicth">
      <div class="icon-send" style="background-color: yellow">
          <div class="text-send">
              <h2 class="f-pps-m" style="font-size: 15px;">Pesan Antar</h2>
              <p class="f-pps-s">Diantar dalam 10 menit</p>
          </div>

      </div>
  </section>
  <?php }else if(@$cekTranksaksiByIdStatus['status_tranksaksi']=='selesai' && @$cekTranksaksiByIdStatus['show_pemesanan']==0){ ?>
  <div id="wrapper-alert">
      <section class="send-swicth">
          <div class="icon-send" style="background-color: green;">
              <div class="text-send">
                  <h2 class="f-pps-m" style="font-size: 15px;">Pesanan Telah Sampai</h2>
                  <p class="f-pps-s">Terima Kasih</p>
              </div>
              <div class="close-icon">
                  <i class="fal fa-times " id="closeAlert"
                      data-id="<?= $cekTranksaksiByIdStatus['id_tranksaksi'] ?>"></i>
              </div>

          </div>
      </section>
  </div>

  <?php } ?>


  <script type="text/javascript">
$('#closeAlert').on('click', function() {
    const id = $(this).data('id');
    console.log(id);
    $.ajax({
        type: "post",
        url: '/app/hapusAlertPemesanan.html',
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {

            $('#wrapper-alert').remove();
            dataMenuFav();

        },
        error: function(xhr, ajaxOptions, thrownError) {

        }

    });

})
  </script>