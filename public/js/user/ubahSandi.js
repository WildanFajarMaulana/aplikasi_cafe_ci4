$(document).ready(function () {
  $(".formUbahPassword").submit(function (e) {
    e.preventDefault();
    if ($("#inputPasswordLama").val() == "" || $("#inputPasswordBaru").val() == "" || $("#inputKonfirmasiPasswordBaru").val() == "") {
      $("#passwordLama").removeClass("d-none");
      $("#passwordLama").html("Input Tidak Boleh Kosong");
      $("#passwordBaru").removeClass("d-none");
      $("#passwordBaru").html("Input Tidak Boleh Kosong");
      $("#konfirmasiPasswordBaru").removeClass("d-none");
      $("#konfirmasiPasswordBaru").html("Input Tidak Boleh Kosong");

      return false;
    }
    console.log("ok");
    $.ajax({
      type: "post",
      url: $(this).attr("action"),
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function () {
        $(".btnubahpassword").attr("disabled", "disabled");
        $(".btnubahpassword").html(`<div class="spinner-border text-light mt-1" role="status">
            <span class="sr-only">Loading...</span>
          </div>`);
      },
      complete: function () {
        $(".btnubahpassword").removeAttr("disabled");
        $(".btnubahpassword").removeClass("spinner-border text-light");
        $(".btnubahpassword").html("Ubah Password");
      },
      success: function (response) {
        $(".csrfCafe").val(response.token);
        if (response.error) {
          if (response.error.passwordBaru) {
            $("#passwordBaru").removeClass("d-none");
            $("#passwordBaru").html(response.error.passwordBaru);
          } else {
            $("#passwordBaru").remove();
          }
          if (response.error.konfirmasiPasswordBaru) {
            $("#konfirmasiPasswordBaru").removeClass("d-none");
            $("#konfirmasiPasswordBaru").html(response.error.konfirmasiPasswordBaru);
          } else {
            $("#konfirmasiPasswordBaru").remove();
          }
        } else if (response.errorPasswordLama) {
          $("#passwordLama").removeClass("d-none");
          $("#passwordLama").html(response.errorPasswordLama);
        } else {
          $("#passwordBaru").addClass("d-none");
          $("#konfirmasiPasswordBaru").addClass("d-none");
          $("#passwordLama").addClass("d-none");

          $("#inputPasswordLama").val("");
          $("#inputPasswordBaru").val("");
          $("#inputKonfirmasiPasswordBaru").val("");
          swal.fire({
            icon: "success",
            title: "Berhasil",
            text: response.success,
          });
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {},
    });
    return false;
  });
});
