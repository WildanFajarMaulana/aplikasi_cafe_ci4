<?php if($tampildata){ ?>
        
              <!-- location -->
          <div class="location-user">
              <div class="left">
                <h2 class="text-location-user f-pps-m lokasi">Ups pilih Lokasi dulu</h2>
              </div>
              <div class="right">
                <i class="fas fa-sort-down"></i>
              </div>
          </div>
           <p class="d-none" id="pinNotif" style="color: red;">Pilih Lokasi Terlebih Dahulu</p>
        <!-- end location -->

        <div class="metode-pembayaran">
            <div class="input-group mb-3">
              <select class="custom-select payment" id="inputGroupSelect01" style="height: 60px;font-size:18px">
                <option selected disabled value="metode">Metode Pembayaran</option>
                <option value="tunai">Tunai</option>
                <option value="e_wallet">G-Pay (Rp.<?= $profilByIdLogin['saldo'] ?>)</option>
              </select>
            </div>
        </div>
         <p class="d-none" id="pinNotifs" style="color: red;">Pilih Payment Terlebih Dahulu</p>
        
        <div class="button-pesan f-pps-m">Pesan Sekarang</div>

      </form> 
        
      <?php }else{ } ?>

<script type="text/javascript">


 $('.button-pesan').on('click',function(){
         // CSRF Hash
        var csrfName = $('.csrfCafe').attr('name'); // CSRF Token name
        var csrfHash = $('.csrfCafe').val(); // CSRF hash
        let total_pembayaran=$('.total_pembayaran').html()
        let lokasi=$('.lokasi').html();
        let payment=$('.payment').val();
      
        if(payment==null && lokasi=='Ups pilih Lokasi dulu'){
          $('#pinNotifs').removeClass('d-none');
          $('#pinNotif').removeClass('d-none');
          return false;
        }else if(lokasi=='Ups pilih Lokasi dulu'){
          $('#pinNotif').removeClass('d-none');
          $('#pinNotifs').addClass('d-none');
          return false;
        }else if(payment==null){
          $('#pinNotifs').removeClass('d-none');
           $('#pinNotif').addClass('d-none');
          
          return false;
        }
  

        $.ajax({
        type:"post",
        url:'/app/kirimDataToPinTranksaksi.html',
        data:{total_pembayaran:total_pembayaran,lokasi:lokasi,payment:payment,[csrfName]: csrfHash},
        dataType:"json",
        beforeSend:function(){
          $(".button-pesan").attr('disabled','disabled');
          $(".button-pesan").html(`<div class="spinner-border text-light mt-2" role="status">
            <span class="sr-only">Loading...</span>
          </div>`);;
        },
        complete:function(){
          $(".button-pesan").removeAttr('disabled');
          $(".button-pesan").removeClass('spinner-border text-light');
          $(".button-pesan").html('Pesan Sekarang');
        },
        success:function(response){
          $('.csrfCafe').val(response.token);
          if(response.errorSaldo){
             Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text:response.errorSaldo
                      })
          }else{
            $('#pinNotifs').addClass('d-none');
            $('#pinNotif').addClass('d-none');
            window.location.href=`/app/verifikasiPinTranksaksi/${response.total_pembayaran}/${response.lokasi}/${response.payment}.html`;
            
          }
        },
        error:function(xhr,ajaxOptions,thrownError){
          alert(xhr.status+"\n"+xhr.responseText+"\n"+thrownError);
        }
      })

      })
  $(".location-user").on('click',function(){
  $('body').attr("style","overflow-y:hidden;height:100%");
  $('.pop-up-location').removeClass("d-none")
  setTimeout(()=>{
    $('.detail-location-pop-up').addClass("show-pop-up-location");
  },200)
})

$('#close-pop-up-button-location').on('click',function(e){
  setTimeout(()=>{
    $('.detail-location-pop-up').addClass("close-pop-up-location");
  })

  setTimeout(()=>{
    $('body').attr("style"," ");
    $('.pop-up-location').addClass("d-none");
    $('.detail-location-pop-up').removeClass("show-pop-up-location");
    $('.detail-location-pop-up').removeClass("close-pop-up-location");
  },500)
})


$('.location-list').on('click',function(){
  $('.text-location-user').html($(this).text());

  setTimeout(()=>{
    $('.detail-location-pop-up').addClass("close-pop-up-location");
  })

  setTimeout(()=>{
    $('body').attr("style"," ");
    $('.pop-up-location').addClass("d-none");
    $('.detail-location-pop-up').removeClass("show-pop-up-location");
    $('.detail-location-pop-up').removeClass("close-pop-up-location");
  },500)
})

</script>