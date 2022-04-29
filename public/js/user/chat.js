var socket = io.connect("https://chat-maucafe.herokuapp.com");

let id = parseInt($(".body").attr("data-room"));
let role = parseInt($(".body").attr("data-role"));
let name = $(".body").attr("data-name");
// get message

socket.emit("get message", id);

// update message
socket.on("update message", function (msg) {
  console.log(msg);
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
  }
});

// send message
var form = document.getElementById("form");
var input = document.getElementById("input");

form.addEventListener("submit", function (e) {
  e.preventDefault();
  if (input.value) {
    let time = "20.00";
    socket.emit("send message", { id, role, msg: input.value, time, name });
    input.value = "";
  }
});
