
  $(document).ready(function(){
    $('.formLupaPassword').submit(function(e){
      e.preventDefault();
      console.log('ok');
      $.ajax({
        type:"post",
        url:$(this).attr('action'),
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
           $(".btnReset").html('Reset Password');  
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
             $("#inputEmail").val("");
              $('#email').addClass('d-none');
              Swal.fire({
                    type: 'success',
                    title: 'Reset Password Berhasil',
                    text: response.success
                  });
            }else{
              $("#inputEmail").val("");
               $('#email').addClass('d-none');
              Swal.fire({
                    type: 'error',
                    title: 'Reset Password Gagal',
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
