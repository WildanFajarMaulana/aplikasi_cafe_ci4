 function clickEvent(first,last){
          if(first.value.length){
            document.querySelector("#"+last).focus();
          }
      }
function clickSameEvent(first,last){
          if(first.value.length){
            document.querySelector("#"+last).focus();
          }
      }
 $(document).ready(function(){
   $('.backToAwal').on('click',function(e){
    e.preventDefault();
    $('.btnPin').addClass('d-none');
    $('.konfirmasiPin').addClass('d-none');
    $('.pin').removeClass('d-none');
    $('.btnPinAwal').removeClass('d-none');
   })
    
  $('.btnPinAwal').on('click',function(e){
    e.preventDefault();
    $('.konfirmasiPin').removeClass('d-none');
    $('.pin').addClass('d-none');
    $('.btnPinAwal').addClass('d-none');
    $('.btnPin').removeClass('d-none');
  })
     
    $('.formPin').submit(function(e){
      e.preventDefault();
      console.log('ok');
      if($('#first').val()=='' ||$('#second').val()=='' ||$('#third').val()=='' ||$('#fourth').val()==''){
        $('.btnPin').addClass('d-none');
        $('.konfirmasiPin').addClass('d-none');
        $('.pin').removeClass('d-none');
        $('.btnPinAwal').removeClass('d-none');
         $('#pinNotif').removeClass('d-none');
         $('#pinNotif').html('Inputkan Pin');
         return false;
      }
      $.ajax({
        type:"post",
        url:$(this).attr('action'),
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
          $(".btnPin").attr('disabled','disabled');
          $(".btnPin").html(`<div class="spinner-border text-light mt-1" role="status">
            <span class="sr-only">Loading...</span>
          </div>`);
        },
        complete:function(){
          $(".btnPin").removeAttr('disabled');
          $(".btnPin").removeClass('spinner-border text-light');
          $(".btnPin").html(`Verifikasi`);
        },
        success:function(response){
          $('.csrfCafe').val(response.token);
          
            if(response.success){
               Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text:response.success
              }).then (function() {
                    window.location.href = "/app/profile.html";
                  });
            }else if(response.errorPin){
              $('#pinNotifs').removeClass('d-none');
              $('#pinNotifs').html(response.errorPin);
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
        error:function(xhr,ajaxOptions,thrownError){
          alert(xhr.status+"\n"+xhr.responseText+"\n"+thrownError);
        }
      })
      return false;
    })
  })
