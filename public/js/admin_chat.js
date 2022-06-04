var socket = io.connect("https://chat-maucafe.herokuapp.com");

const id_trx = $("#id_tranksaksi_data").attr("data-id");
let id = parseInt(id_trx);
let role = 0;
let names = "Petugas";

socket.emit("get message", id);

// update message
socket.on("update message", function (msg) {
  if (msg !== null) {
    if (role == 0) {
      $(".name-chat").text(msg.petugas_room);
    } else {
      $(".name-chat").text(msg.user_room);
    }

    const messageId = parseInt(msg.id);
    if (messageId === id) {
      let messages = msg.message;
      let show = ``;
      messages.map((message) => {
        if (message.role == role) {
          show += `
            <div class="chat-box-admin">
            <p class="name-box">Petugas</p>
                ${message.msg}
            <p class="time">${message.time}</p>
            </div>
            <div class="clear"></div> 
            `;
        } else {
          show += `
            <div class="chat-box-user">
            <p class="name-box">${message.name}</p>
                ${message.msg}
            <p class="time">${message.time}</p>
            </div>
            <div class="clear"></div>    
          `;
        }
      });

      $(".chat-section").html(show);
      let chat_section = document.querySelector(".chat-section");
      chat_section.scrollTop = chat_section.scrollHeight;
    }
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
