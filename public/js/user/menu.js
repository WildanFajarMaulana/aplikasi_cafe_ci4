function dataMinuman() {
  console.log("minuman");
  $.ajax({
    url: "/app/dataMinuman.html",
    dataType: "json",
    success: function (response) {
      $(".menu-minuman").html(response.data);
    },
    error: function (xhr, ajaxOptions, thrownError) {},
  });
}
function dataMakanan() {
  console.log("makanan");
  $.ajax({
    url: "/app/dataMakanan.html",
    dataType: "json",
    success: function (response) {
      $(".menu-makanan").html(response.data);
    },
    error: function (xhr, ajaxOptions, thrownError) {},
  });
}

$(document).ready(function () {
  dataMinuman();
  dataMakanan();

  $(".formMenu").submit(function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: $(this).attr("action"),
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function () {
        $(".btnMenu").attr("disabled", "disabled");
        $(".btnMenu").html(`<div class="spinner-border text-light mt-2" role="status">
            <span class="sr-only">Loading...</span>
          </div>`);
      },
      complete: function () {
        $(".btnMenu").removeAttr("disabled");
        $(".btnMenu").removeClass("spinner-border text-light");
        $(".btnMenu").html("Tambahkan Keranjang");
      },
      success: function (response) {
        $(".csrfCafe").val(response.token);
        if (response.success) {
          Swal.fire({
            icon: "success",
            title: "Berhasil",
            text: response.success,
          });

          dataMinuman();
          dataMakanan();
          getKeranjangByPembeli();
          $(".value-pesan").val("0");
          setTimeout(() => {
            $(".detail-pop-up").addClass("close-pop-up");
          }, 1000);

          setTimeout(() => {
            $("body").attr("style", " ");
            $(".pop-up").addClass("d-none");
            $(".detail-pop-up").removeClass("show-pop-up");
            $(".detail-pop-up").removeClass("close-pop-up");
          }, 1500);
        } else if (response.errorKeranjang) {
          Swal.fire({
            icon: "warning",
            title: "Warning",
            text: response.errorKeranjang,
          });

          dataMinuman();
          dataMakanan();
          $(".value-pesan").val("0");
        } else if (response.errorJumlah) {
          Swal.fire({
            icon: "warning",
            title: "Warning",
            text: response.errorJumlah,
          });

          dataMinuman();
          dataMakanan();
          $(".value-pesan").val("0");
        } else {
          Swal.fire({
            icon: "warning",
            title: "Warning",
            text: response.errorTranksaksi,
          });

          dataMinuman();
          dataMakanan();
          $(".value-pesan").val("0");
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {},
    });
    return false;
  });
});
