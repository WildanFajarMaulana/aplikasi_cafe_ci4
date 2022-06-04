    <?php if($status=='diprosesDanKonfirmasi'){ ?>
    <?php if($tampildata){ ?>
    <?php 
          $proses;
          if($tampildata['status_tranksaksi']=='diproses'){
            $proses='Menunggu Konfirmasi';
          }elseif ($tampildata['status_tranksaksi']=='dikonfirmasi') {
            $proses='Pesanan Diantarkan';
          }

         ?>
    <div class="history">
        <div class="icon-history" style="background-image: url('/img/shopping_bag.png');"></div>
        <div class="detail-history">
            <h2 class="f-pps-l- text-ruang"><?= $tampildata['pengiriman'] ?></h2>
            <p class="f-pps-m text-proses"><?= $proses ?></p>
            <span style="float:right"><a href="/app/chatting/<?= $tampildata['id_tranksaksi'] ?>.html"
                    style="color:black"><i class="fas fa-comment-alt-dots"></i></a></span>
            <p class="f-pp-sm text-tanggal " style="margin-top:-4.5px"><?= $tampildata['created_at'] ?></p>

        </div>
    </div>

    <?php }else{ ?>
    <p class="text-center">Tidak Ada Pesanan Berlangsung</p>
    <?php } ?>
    <?php }else{ ?>
    <?php if($tampildataselesai){ ?>
    <?php foreach($tampildataselesai as $ts){ ?>
    <div class="history ">
        <div class="icon-history" style="background-image: url('/img/shopping_bag.png');"></div>
        <div class="detail-history">
            <h2 class="f-pps-l- text-ruang"><?= $ts['pengiriman'] ?></h2>
            <p class="f-pps-m text-proses">Selesai</p>
            <span style="float:right"><a href="/app/chatting/<?= $ts['id_tranksaksi'] ?>.html" style="color:black"><i
                        class="fas fa-comment-alt-dots"></i></a></span>
            <p class="f-pp-sm text-tanggal"><?= $ts['created_at'] ?></p>
        </div>
    </div>
    <?php } ?>
    <?php }else{ ?>
    <p class="text-center">Tidak Ada Riwayat Tranksaksi</p>
    <?php } ?>
    <?php } ?>


    <script>
var socket = io.connect("https://chat-maucafe.herokuapp.com");

let id = parseInt($(".body").attr("data-room"));
let role = parseInt($(".body").attr("data-role"));
let names = $(".body").attr("data-name");

// get message

socket.emit("get message", id);

// update message
socket.on("update message", function(msg) {

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

form.addEventListener("submit", function(e) {
    e.preventDefault();
    if (input.value) {
        var tanggal = new Date();

        let time = `${tanggal.getHours()}.${tanggal.getMinutes()<10?'0':''}${tanggal.getMinutes()}`;

        socket.emit("send message", {
            id,
            role,
            msg: input.value,
            time,
            name: names
        });
        input.value = "";
    }
});
    </script>