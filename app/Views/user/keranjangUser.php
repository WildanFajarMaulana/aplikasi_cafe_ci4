  <!-- order list -->
  <?php if($tampildata){ ?>
  <div class="wrap-list-order" style="margin-bottom: 0px;">
      <?php foreach($tampildata as $td){ ?>
      <div class="order-list">
          <div class="left">
              <h2 class="title-menu f-pps-l"><?= $td['nama_menu'] ?></h2>
              <?php if($cekTranksaksiByIdStatus){ ?>
              <p class="harga-menu f-mts-l"><?= $td['jumlah'] ?> x <?= $td['harga'] ?></p>
              <?php }else{ ?>
              <p class="harga-menu f-mts-l"><?= $td['harga'] ?></p>
              <?php }?>

              <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
              <?php if($cekTranksaksiByIdStatus){ ?>

              <?php }else{ ?>
              <i class="fas fa-trash-alt hapusMenuKeranjang" data-id="<?= $td['id'] ?>"></i>
              <?php }?>
          </div>

          <div class="right">
              <?php if($cekTranksaksiByIdStatus){ ?>
              <div class="thumbnail-menu-order"
                  style="background-image: url('/img/<?= $td['gambar_menu'] ?>');height:100%"></div>
              <?php }else{ ?>
              <div class="thumbnail-menu-order" style="background-image: url('/img/<?= $td['gambar_menu'] ?>');"></div>
              <?php }?>

              <div class="count-order-menu">
                  <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                  <?php if($cekTranksaksiByIdStatus){ ?>

                  <?php }else{ ?>
                  <button data-id="0" data-no="<?= $td['id'] ?>" class="button-minus">
                      <i class="fas fa-minus"></i>
                  </button>
                  <?php }?>
                  <?php if($cekTranksaksiByIdStatus){ ?>

                  <?php }else{ ?>
                  <div class="f-pps-m value-order"><?= $td['jumlah'] ?></div>
                  <?php }?>
                  <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                  <?php if($cekTranksaksiByIdStatus){ ?>

                  <?php }else{ ?>
                  <button data-id="0" class="button-plus" data-no="<?= $td['id'] ?>">
                      <i class="fas fa-plus"></i>
                  </button>
                  <?php }?>
              </div>
          </div>
      </div>
      <?php } ?>

      <!-- end order lis -->
  </div>


  <!-- total -->
  <section class="total-pembelian">
      <h2 class="text-ringkasan-pembelian f-pps-l">Ringkasan Pembelian</h2>

      <?php foreach($tampildata as $td){ ?>

      <div class="order-menu-total">
          <div class="title-order">
              <h2 class="f-pps-l" style="margin-top:1px"><?= $td['nama_menu'] ?></h2>
          </div>
          <div class=" price-order">
              <h2 class="f-pps-l" id="harga_menu" style="margin-top:1px"><?= $td['total_harga']  ?></h2>
          </div>
      </div>

      <?php } ?>



      <hr>
      <form>
          <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
          <div class="order-menu-total total-order-price">
              <div class="title-order">
                  <h2 class="f-pps-l" style="margin-top:1px">Total</h2>
              </div>
              <div class="price-order">
                  <h2 class="f-pps-l total_pembayaran" style="margin-top:1px"><?= $total_pembayaran[0]['total_harga'] ?>
                  </h2>
              </div>
          </div>

  </section>

  <!-- end total -->


  <?php }else{ ?>
  <p class="text-center mt-5">Keranjang Kosong</p>
  <?php } ?>

  <script type="text/javascript">
$('.button-plus').on('click', function() {
    // CSRF Hash
    var csrfName = $('.csrfCafe').attr('name'); // CSRF Token name
    var csrfHash = $('.csrfCafe').val(); // CSRF hash
    let id_menu = $(this).attr('data-no')


    $.ajax({
        type: "post",
        url: '/app/plusKeranjang.html',
        data: {
            id_menu: id_menu,
            [csrfName]: csrfHash
        },
        dataType: "json",
        success: function(response) {
            $('.csrfCafe').val(response.token);
            keranjangUser();


        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
})

$('.button-minus').on('click', function() {
    // CSRF Hash
    var csrfName = $('.csrfCafe').attr('name'); // CSRF Token name
    var csrfHash = $('.csrfCafe').val(); // CSRF hash
    let id_menu = $(this).attr('data-no')
    console.log(id_menu)

    $.ajax({
        type: "post",
        url: '/app/minKeranjang.html',
        data: {
            id_menu: id_menu,
            [csrfName]: csrfHash
        },
        dataType: "json",
        success: function(response) {
            $('.csrfCafe').val(response.token);
            if (response.error) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: response.error
                });
            } else {
                keranjangUser();
            }

        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
})



// modal location

$('.hapusMenuKeranjang').on('click', function() {

    // CSRF Hash
    var csrfName = $('.csrfCafe').attr('name'); // CSRF Token name
    var csrfHash = $('.csrfCafe').val(); // CSRF hash
    let id = $(this).attr('data-id');

    Swal.fire({
        title: 'Yakin Hapus Menu?',
        text: "Kamu Tidak Bisa Mengembalikannya Lagi!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya,Hapus'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: '/app/hapusMenuKeranjang.html',
                data: {
                    id: id,
                    [csrfName]: csrfHash
                },
                dataType: "json",
                success: function(response) {
                    $('.csrfCafe').val(response.token);
                    if (response.success) {
                        Swal.fire(
                            'Deleted!',
                            'deleted.',
                            'success'
                        )
                        keranjangUser();
                        formPesan();
                        getKeranjangByPembeli();
                    }


                },
                error: function(xhr, ajaxOptions, thrownError) {

                }
            });

        }
    })

})



// modal voucher
$(".voucher").on('click', function() {
    console.log('ok');
    $('body').attr("style", "overflow-y:hidden;height:100%");
    $('.pop-up-discount').removeClass("d-none")
    setTimeout(() => {
        $('.detail-discount-pop-up').addClass("show-pop-up-discount");
    }, 200)
})

$('#close-pop-up-button-voucher').on('click', function(e) {
    setTimeout(() => {
        $('.detail-discount-pop-up').addClass("close-pop-up-discount");
    })

    setTimeout(() => {
        $('body').attr("style", " ");
        $('.pop-up-discount').addClass("d-none");
        $('.detail-discount-pop-up').removeClass("show-pop-up-discount");
        $('.detail-discount-pop-up').removeClass("close-pop-up-discount");
    }, 500)
})

$('.discount-list').on('click', function() {
    let diskon = $(this).attr("data-diskon")
    $('.detail-voucher').html(`
    <h2 class="text-voucher f-pps-l" id="text-voucher">Yeayy kamu dapat diskon ${diskon} %</h2>
        </div>`)

    setTimeout(() => {
        $('.detail-discount-pop-up').addClass("close-pop-up-discount");
    })

    setTimeout(() => {
        $('body').attr("style", " ");
        $('.pop-up-discount').addClass("d-none");
        $('.detail-discount-pop-up').removeClass("show-pop-up-discount");
        $('.detail-discount-pop-up').removeClass("close-pop-up-discount");
    }, 500)
})
  </script>