function clickEvent(first, last) {
  if (first.value.length) {
    document.querySelector("#" + last).focus();
  }
}

function sendApiChat(id_tranksaksi, name) {
  var tanggal = new Date();

  let time = `${tanggal.getHours()}.${tanggal.getMinutes()<10?'0':''}${tanggal.getMinutes()}`;
  $.ajax({
    type: "post",
    url: "https://chat-maucafe.herokuapp.com/message",
    data: {
      id: parseInt(id_tranksaksi),
      name: name,
      time
    },
    dataType: "json",
    success: function (response) {
      console.log(response);
    },
    error: function (xhr, ajaxOptions, thrownError) {}
  });
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
      title: "Yakin Melakukan Tranksaksi?",
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
          url: "/app/prosesVerifikasiPinTranksaksi.html",
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
              sendApiChat(response.id_tranksaksi, response.names);
              console.log(response.names);
              getTotalPesanan();
              Swal.fire("success!", "Tranksaksi Diproses", "success").then(function () {
                window.location.href = `/app/chatting/${response.id_tranksaksi}.html`;
              });
            } else if (response.errorSaldo) {
              Swal.fire({
                icon: "error",
                title: "Gagal",
                text: response.errorSaldo,
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
      }
    });
    return false;
  });
});
