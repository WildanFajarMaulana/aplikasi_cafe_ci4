 $(document).ready(function(){
    // CSRF Hash
    
    $('.formRegister').submit(function(e){
      e.preventDefault();
      console.log('ok');
      $.ajax({
        type:"post",
        url:$(this).attr('action'),
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
          $(".btnregister").attr('disabled','disabled');
          $(".btnregister").html(`<div class="spinner-border text-light mt-2" role="status">
            <span class="sr-only">Loading...</span>
          </div>`);;
        },
        complete:function(){
          $(".btnregister").removeAttr('disabled');
          $(".btnregister").removeClass('spinner-border text-light');
          $(".btnregister").html('Register');
        },
        success:function(response){
          $('.csrfCafe').val(response.token);
          if(response.error){
            if(response.error.username){
              $('#username').removeClass('d-none');
               $('#username').addClass('styleValidation');
              $('#username').html(response.error.username);
            }else{
              
               $('#username').remove();
            }

             if(response.error.email){
              $('#email').removeClass('d-none');
               $('#email').addClass('styleValidation');
              $('#email').html(response.error.email);
            }else{
               
               $('#email').remove();
            }

             if(response.error.password){
              $('#password').removeClass('d-none');
               $('#password').addClass('styleValidation');
              $('#password').html(response.error.password);
            }else{
               
               $('#password').remove();
            }

             if(response.error.konfirmasiPassword){
              $('#konfirmasiPassword').removeClass('d-none');
              $('#konfirmasiPassword').addClass('styleValidation');
              $('#konfirmasiPassword').html(response.error.konfirmasiPassword);
            }else{
              
               $('#konfirmasiPassword').remove();
            }
          }else{
            if(response.success){

              $('#inputUsername').val('');
              $('#inputEmail').val('');
              $('#inputPassword').val('');
              $('#inputKonfirmasiPassword').val('');

              $('#username').addClass('d-none');
              $('#email').addClass('d-none');
              $('#password').addClass('d-none');
              $('#konfirmasiPassword').addClass('d-none');
              swal.fire({
                icon:'success',
                title:'Berhasil',
                text:response.success

              })
              
              
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
