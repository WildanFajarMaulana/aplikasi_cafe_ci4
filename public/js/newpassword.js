
  $(document).ready(function(){
    $('.formNewPassword').submit(function(e){
      e.preventDefault();
      console.log('ok');
      $.ajax({
        type:"post",
        url:$(this).attr('action'),
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
          $(".btnnewpassword").attr('disabled','disabled');
          $(".btnnewpassword").html(`<div class="spinner-border text-light mt-2" role="status">
            <span class="sr-only">Loading...</span>
          </div>`);
        },
        complete:function(){
          $(".btnnewpassword").removeAttr('disabled');
          $(".btnnewpassword").removeClass('spinner-border text-light');
          $(".btnnewpassword").html('Register');
        },
        success:function(response){
            $('.csrfCafe').val(response.token);
         if(response.error){
          let data=response.error;
          if(data.errorPassword){
            $('#password').removeClass('d-none');
            $('#password').addClass('styleValidation');
            $('#password').html(data.errorPassword);
          }else{
              $('#password').remove();
          }
          if(data.errorKonfirmasiPassword){
            $('#konfirmasiPassword').removeClass('d-none');
            $('#konfirmasiPassword').addClass('styleValidation');
            $('#konfirmasiPassword').html(data.errorKonfirmasiPassword);
          }else{
             $('#konfirmasiPassword').remove();
          }

         }else{

            if(response.success){
                $('#password').addClass('d-none');
                $('#konfirmasiPassword').addClass('d-none');
                Swal.fire({
                    type: 'success',
                    title: 'Berhasil',
                    text: response.success
                  })
                .then (function() {
                    window.location.href = "/app/login.html";
                  });
            }else{
                $('#password').addClass('d-none');
                $('#konfirmasiPassword').addClass('d-none');
                Swal.fire({
                    type: 'error',
                    title: 'Gagal ',
                    text: response.errorToken
                  })
                .then (function() {
                    window.location.href = "/app/login.html";
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
