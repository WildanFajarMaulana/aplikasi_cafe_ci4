function riwayatSelesai() {
  $.ajax({
    url: "/app/riwayatSelesai.html",
    dataType: "json",
    success: function (response) {
      $(".content").html(response.data);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    },
  });
}
function riwayatProses() {
  $.ajax({
    url: "/app/riwayatProses.html",
    dataType: "json",
    success: function (response) {
      // $("#contentCadangan").addClass('d-none');
      $(".content").html(response.data);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    },
  });
}
$(document).ready(function () {
  setInterval(function () {
    $(".riwayatSelesai").removeClass("aktif");
    $(".riwayatProses").addClass("aktif");
    riwayatProses();
  }, 10000);
  riwayatProses();

  $(".riwayatSelesai").on("click", function () {
    $(".riwayatSelesai").addClass("aktif");
    $(".riwayatProses").removeClass("aktif");
    riwayatSelesai();
  });
  $(".riwayatProses").on("click", function () {
    $(".riwayatSelesai").removeClass("aktif");
    $(".riwayatProses").addClass("aktif");
    riwayatProses();
  });
});
