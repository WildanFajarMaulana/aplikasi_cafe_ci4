function clickEvent(first, last) {
  if (first.value.length) {
    document.querySelector("#" + last).focus();
  }
}

$(document).ready(function () {
  $(".formPin").submit(function (e) {
    e.preventDefault();
    if ($("#first").val() == "" || $("#second").val() == "" || $("#third").val() == "" || $("#fourth").val() == "") {
      $("#pinNotif").removeClass("d-none");
      $("#pinNotif").html("Inputkan Pin");
      return false;
    }
    Swal.fire({
      title: "Yakin Melanjutkan Kirim Saldo?",
      text: "Kamu Tidak Bisa Membatalkannya Lagi!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya,Lanjut",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "post",
          url: "/app/prosesVerifikasiPinSaldo.html",
          data: $(this).serialize(),
          dataType: "json",
          beforeSend: function () {
            $(".btnPin").attr("disabled", "disabled");
            $(".btnPin").html(`<div class="spinner-border text-light mt-1" role="status">
                    <span class="sr-only">Loading...</span>
                  </div>`);
          },
          complete: function () {
            $(".btnPin").removeAttr("disabled");
            $(".btnPin").removeClass("spinner-border text-light");
            $(".btnPin").html(`Verifikasi`);
          },
          success: function (response) {
            $(".csrfCafe").val(response.token);
            if (response.error) {
              $("#pinNotif").removeClass("d-none");
              $("#pinNotif").html(response.error);
            } else {
              if (response.success) {
                Swal.fire("success!", response.success, "success").then(function () {
                  window.location.href = "/app/beranda.html";
                });
              } else {
                Swal.fire("error!", response.errorSaldo, "error");
              }
            }
          },
          error: function (xhr, ajaxOptions, thrownError) {},
        });
      }
    });
    return false;
  });
});
