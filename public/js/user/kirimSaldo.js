 $(document).ready(function(){

    $('.prosesKirimSaldo').on('click',function(){
       var csrfName = $('.csrfCafe').attr('name'); // CSRF Token name
        var csrfHash = $('.csrfCafe').val(); // CSRF hash
      console.log('ok')
       let jumlah=$('#inputjumlah').val();
       let nomor=$('#inputNomor').val();
      if(jumlah==''){
        $('#jumlah').removeClass('d-none');
        $('#jumlah').html('Inputkan jumlah Yang Anda Kirim');
        return false;
      }
      if(jumlah<10000){
        $('#jumlah').removeClass('d-none');
        $('#jumlah').html('Minimal Transfer Adalah Rp.10000');
        return false;
      }

        $.ajax({
        type:"post",
        url:'/app/kirimDataToPinSaldo.html',
        data:{nomor:nomor,saldo:jumlah,[csrfName]: csrfHash},
        dataType:"json",
        beforeSend:function(){
          $(".prosesKirimSaldo").attr('disabled','disabled');
          $(".prosesKirimSaldo").html(`<div class="spinner-border text-light mt-1" role="status">
            <span class="sr-only">Loading...</span>
          </div>`);;
        },
        complete:function(){
          $(".prosesKirimSaldo").removeAttr('disabled');
          $(".prosesKirimSaldo").removeClass('spinner-border text-light');
          $(".prosesKirimSaldo").html('Kirim');

        },
        success:function(response){
          $('.csrfCafe').val(response.token);
          if(response.errorSaldo){
            swal.fire({
                icon:'error',
                title:'error',
                text:response.errorSaldo

              })
          }else{
            $('#jumlah').addClass('d-none');
            window.location.href=`/app/verifikasiPinKirimSaldo/${response.nomor}/${response.saldo}.html`; 
          }
        },
        error:function(xhr,ajaxOptions,thrownError){
          alert(xhr.status+"\n"+xhr.responseText+"\n"+thrownError);
        }
      })
    })
    $('.formKirimSaldo').submit(function(e){
      e.preventDefault();
      let nomor=$('#inputNomor').val();
      if(nomor==''){
        $('#nomor').removeClass('d-none');
        $('#nomor').html('Inputkan Nomor Yang Anda Cari');
        return false;
      }
      $.ajax({
        type:"post",
        url:$(this).attr('action'),
        data:$(this).serialize(),
        dataType:"json",
             beforeSend:function(){
              $(".cari").attr('disabled','disabled');
              $(".cari").html(`<div class="spinner-border text-light mt-1" role="status">
                <span class="sr-only">Loading...</span>
              </div>`);;
            },
            complete:function(){
              $(".cari").removeAttr('disabled');
              $(".cari").removeClass('spinner-border text-light');
               $(".cari").html('Cari Penerima');
            },
            success:function(response){
              $('.csrfCafe').val(response.token);
            if(response.data){
                //open Modal
                $('body').attr("style","overflow-y:hidden;height:100%");
                $('.pop-up-discount').removeClass("d-none")
                setTimeout(()=>{
                  $('.detail-discount-pop-up').addClass("show-pop-up-discount");
                },200)
                //insert Data
               $('.wrap-success').removeClass('d-none');
               $('#namaNomor').val(response.data['nama']);
                $('#nomor').addClass('d-none');
             

            }else{
              $('#nomor').removeClass('d-none');
              $('#nomor').html(response.error);
              $('.wrap-success').html(``)
            }
                    
              },
            error:function(xhr,ajaxOptions,thrownError){
              alert(xhr.status+"\n"+xhr.responseText+"\n"+thrownError);
            }
                
    });
      return false;
    })
  })


$('#close-pop-up-button-voucher').on('click',function(e){
  setTimeout(()=>{
    $('.detail-discount-pop-up').addClass("close-pop-up-discount");
  })

  setTimeout(()=>{
    $('body').attr("style"," ");
    $('.pop-up-discount').addClass("d-none");
    $('.detail-discount-pop-up').removeClass("show-pop-up-discount");
    $('.detail-discount-pop-up').removeClass("close-pop-up-discount");
  },500)
})


$('.button-back').on('click',()=>{
  history.back();
})