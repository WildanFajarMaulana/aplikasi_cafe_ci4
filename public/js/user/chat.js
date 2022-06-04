function sendApiChat(id_tranksaksi, name) {
  var tanggal = new Date();

  let time = `${tanggal.getHours()}.${tanggal.getMinutes() < 10 ? "0" : ""}${tanggal.getMinutes()}`;
  $.ajax({
    type: "post",
    url: "https://chat-maucafe.herokuapp.com/message",
    data: {
      id: parseInt(id_tranksaksi),
      name: name,
      time,
    },
    dataType: "json",
    success: function (response) {},
    error: function (xhr, ajaxOptions, thrownError) {},
  });
}
var socket = io.connect("https://chat-maucafe.herokuapp.com");

let id = parseInt($(".body").attr("data-room"));
let role = parseInt($(".body").attr("data-role"));
let names = $(".body").attr("data-name");

// get message

socket.emit("get message", id);

// update message
socket.on("update message", function (msg) {
  if (msg !== null) {
    if (role == 1) {
      $(".name-chat").text(msg.user_room);
    } else {
      $(".name-chat").text(msg.petugas_room);
    }
    const messageId = parseInt(msg.id);
    if (messageId === id) {
      let messages = msg.message;
      let show = ``;
      messages.map((message) => {
        if (message.role == role) {
          show += `
              <div class="body-message out-message">
                <p class="name-box-chat f-mts-l">${message.name}</p>
                <p class="text f-pps-m">${message.msg}</p>
                <p class="time f-mts-l t-r">${message.time}</p>
              </div>`;
        } else {
          show += `
              <div class="body-message in-message">
                <p class="name-box-chat f-mts-l">Petugas</p>
                <p class="text f-pps-m">${message.msg}</p>
                <p class="time f-mts-l t-r">${message.time}</p>
              </div>`;
        }
      });

      $(".body-chatting").html(show);
      window.scrollTo(0, document.body.scrollHeight);
    }
  } else {
    sendApiChat(id, names);
  }
});

// send message
var form = document.getElementById("form");
var input = document.getElementById("input");

form.addEventListener("submit", function (e) {
  e.preventDefault();
  if (input.value) {
    var tanggal = new Date();

    let time = `${tanggal.getHours()}.${tanggal.getMinutes() < 10 ? "0" : ""}${tanggal.getMinutes()}`;

    socket.emit("send message", { id, role, msg: input.value, time, name: names });
    input.value = "";
  }
});
