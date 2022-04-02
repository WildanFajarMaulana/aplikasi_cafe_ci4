  const flashDataPesan=$('.flashdata').data('flashdata');
  const flashDataPesanGagal=$('.flashdataGagal').data('flashdata');
  const inputFlashdata=$("#flashdataInput").val();
    if(inputFlashdata==""){

    }else{
      if(flashDataPesan){
         Swal.fire({
                    type: 'success',
                    title: 'Verifikasi Berhasil',
                    text: flashDataPesan
                  });
       }else{
        Swal.fire({
                    type: 'error',
                    title: 'Verifikasi Gagal',
                    text: flashDataPesanGagal
                  });
       }
    }
   
    
        
  $(document).ready(function(){
    $('.formUbahPinEmail').submit(function(e){
      e.preventDefault();
      console.log('ok');
      $.ajax({
        type:"post",
        url:'/app/prosesUbahEmail.html',
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
          $(".btnReset").attr('disabled','disabled');
           $(".btnReset").html(`<div class="spinner-border text-light mt-1" role="status">
            <span class="sr-only">Loading...</span>
          </div>`);
          
        },
        complete:function(){
          $(".btnReset").removeAttr('disabled');
          $(".btnReset").removeClass('spinner-border text-light');
         $(".btnReset").html('Kirim Email')
        },
        success:function(response){
           $('.csrfCafe').val(response.token);
        if(response.errorValid){
            if(response.errorValid.email){
              $('#email').removeClass('d-none');
              $('#email').addClass('styleValidation');
              $('#email').html(response.errorValid.email);
            }else{
               
               $('#email').remove();
            }
             
         }else{
            if(response.success){
            
              $('#email').addClass('d-none');
              Swal.fire({
                    type: 'success',
                    title: 'Berhasil',
                    text: response.success
                  });
            }else{
              $("#inputEmail").val("");
               $('#email').addClass('d-none');
              Swal.fire({
                    type: 'error',
                    title: 'Gagal',
                    text: response.error
                  });

            }
         }
          
        },
        error:function(xhr,ajaxOptions,thrownError){
          alert(xhr.status+"\n"+xhr.responseText+"\n"+thrownError);
        }
      })
      return false;
    })
  })
