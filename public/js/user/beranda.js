function dataMenuFav() {
  $.ajax({
    url: "/app/dataMenuFav.html",
    dataType: "json",
    success: function (response) {
      $(".rekomendasiMenu").html(response.data);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    },
  });
}
function dataMinumanNew() {
  $.ajax({
    url: "/app/dataMinumanNew.html",
    dataType: "json",
    success: function (response) {
      $(".rekomendasiMinuman").html(response.data);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    },
  });
}
function dataMakananNew() {
  $.ajax({
    url: "/app/dataMakananNew.html",
    dataType: "json",
    success: function (response) {
      $(".rekomendasiMakanan").html(response.data);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    },
  });
}

$(document).ready(function () {
  setInterval(function () {
    dataAlert();
  }, 10000);
  dataMenuFav();
  dataMinumanNew();
  dataMakananNew();

  $("#closeAlert").on("click", function () {
    const id = $(this).data("id");
    console.log(id);
    var csrfName = $(".csrfCafe").attr("name"); // CSRF Token name
    var csrfHash = $(".csrfCafe").val(); // CSRF hash
    $.ajax({
      type: "post",
      url: "/app/hapusAlertPemesanan.html",
      data: { id: id, [csrfName]: csrfHash },
      dataType: "json",
      success: function (response) {
        $(".csrfCafe").val(response.token);
        $("#wrapper-alert").remove();
        dataMenuFav();
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
      },
    });
  });
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
          dataMenuFav();
          dataMinumanNew();
          dataMakananNew();
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
          dataMenuFav();
          dataMinumanNew();
          dataMakananNew();
          $(".value-pesan").val("0");
        } else if (response.errorJumlah) {
          Swal.fire({
            icon: "warning",
            title: "Warning",
            text: response.errorJumlah,
          });
          dataMenuFav();
          dataMinumanNew();
          dataMakananNew();
          $(".value-pesan").val("0");
        } else {
          Swal.fire({
            icon: "warning",
            title: "Warning",
            text: response.errorTranksaksi,
          });
          dataMenuFav();
          dataMinumanNew();
          dataMakananNew();
          $(".value-pesan").val("0");
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
      },
    });
    return false;
  });
});
