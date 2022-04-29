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