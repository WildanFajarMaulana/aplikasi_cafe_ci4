function keranjangUser() {
  $.ajax({
    url: "/app/keranjangUser.html",
    dataType: "json",
    success: function (response) {
      $(".keranjangUser").html(response.data);
    },
    error: function (xhr, ajaxOptions, thrownError) {},
  });
}
function getStatustranksaksi() {
  $.ajax({
    url: "/app/getStatustranksaksi.html",
    dataType: "json",
    success: function (response) {
      if (response.data["status_tranksaksi"] == "dikonfirmasi") {
        $("#statusTrx").html("Silahkan Tunggu,Pesanan Sedang Diantarkan");
      } else {
        $("#statusTrx").html("Sip, tinggal dikonfirmasi aja nih");
        // $('#bgImageTrx')
      }
    },
    error: function (xhr, ajaxOptions, thrownError) {},
  });
}
function formPesan() {
  $.ajax({
    url: "/app/formPesan.html",
    dataType: "json",
    success: function (response) {
      $("#kotakformpesan").html(response.data);
    },
    error: function (xhr, ajaxOptions, thrownError) {},
  });
}
$(document).ready(function () {
  // setInterval(function () {
  //   getStatustranksaksi();
  // }, 10000);
  keranjangUser();
  formPesan();

  $("#cariLokasi").keyup(function () {
    var keyword = $("#cariLokasi").val();
    var csrfName = $(".csrfCafe").attr("name"); // CSRF Token name
    var csrfHash = $(".csrfCafe").val(); // CSRF hash
    // load_data(keyword,csrfName,csrfHash);
    var pengambilan = $(".pengambilan").val();

    $.ajax({
      type: "post",
      url: "/app/searchLokasi.html",
      data: { keyword: keyword, [csrfName]: csrfHash },
      dataType: "json",
      success: function (response) {
        $(".csrfCafe").val(response.token);
        if (pengambilan == "diambil") {
          $(".result-location").html(response.data);

          $(".wrap-input-search").addClass("d-none");
          $("#location-list3").removeClass("d-none");
          $("#location-list2").addClass("d-none");
        } else if (pengambilan == "diantarkan") {
          $(".result-location").html(response.data);
          $(".wrap-input-search").removeClass("d-none");
          $("#location-list2").removeClass("d-none");
          $("#location-list3").addClass("d-none");
        }
      },
    });
  });

  $(".pengambilan").on("change", function () {
    if (this.value == "diambil") {
      $(".wrap-input-search").addClass("d-none");
      $("#location-list3").removeClass("d-none");
      $("#location-list2").addClass("d-none");
      $("#textOpsi").addClass("d-none");
    } else if (this.value == "diantarkan") {
      $(".wrap-input-search").removeClass("d-none");
      $("#location-list2").removeClass("d-none");
      $("#location-list3").addClass("d-none");
      $("#textOpsi").addClass("d-none");
    } else {
      $(".wrap-input-search").removeClass("d-none");
    }
  });
});
