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
    console.log("ok");
    $.ajax({
      type: "post",
      url: "/app/prosesVerifikasiPin.html",
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
        if (response.success) {
          Swal.fire({
            icon: "success",
            title: "Berhasil",
            text: response.success,
          }).then(function () {
            window.location.href = "/app/ubahPin.html";
          });
        } else {
          $("#pinNotif").removeClass("d-none");
          $("#pinNotif").html(response.error);
        }
        // else{
        //    Swal.fire({
        //     icon: 'Error',
        //     title: 'Gagal',
        //     text:response.error
        //   }).then (function() {
        //         window.location.href = "/app/profile.html";
        //       });

        // }
      },
      error: function (xhr, ajaxOptions, thrownError) {},
    });
    return false;
  });
});
