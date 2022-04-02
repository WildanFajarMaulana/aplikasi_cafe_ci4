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
    
   
    $('.formLogin').submit(function(e){
      e.preventDefault();
      console.log('ok');
      $.ajax({
        type:"post",
        url:$(this).attr('action'),
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
          $(".btnLogin").attr('disabled','disabled');
          $(".btnLogin").html(`<div class="spinner-border text-light mt-2" role="status">
            <span class="sr-only">Loading...</span>
          </div>`);
        },
        complete:function(){
          $(".btnLogin").removeAttr('disabled');
          $(".btnLogin").removeClass('spinner-border text-light');
          $(".btnLogin").html('Login');
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
             if(response.errorValid.password){
              $('#password').removeClass('d-none');
              $('#password').addClass('styleValidation');
              $('#password').html(response.errorValid.password);
            }else{
               
               $('#password').remove();
            }
         }else{
          if(response.successUser){
            $("#inputEmail").val("");
            $("#inputPassword").val("");
            $('#email').addClass('d-none');
            $('#password').addClass('d-none');
            $('#remember').removeAttr('checked');
             Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "/app/beranda.html";
                  });
          }else if(response.successPetugas){
            $("#inputEmail").val("");
            $("#inputPassword").val("");
            $('#email').addClass('d-none');
            $('#password').addClass('d-none');
            $('#remember').removeAttr('checked');
             Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = '/petugas/managePesanan.html';
                  });
          }else if(response.successAdmin){
            $("#inputEmail").val("");
            $("#inputPassword").val("");
            $('#email').addClass('d-none');
            $('#password').addClass('d-none');
            $('#remember').removeAttr('checked');
             Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "/admin/manageAkun.html";
                  });
          }else if(response.successNull){
            $("#inputEmail").val("");
            $("#inputPassword").val("");
             $('#email').addClass('d-none');
            $('#password').addClass('d-none');
              Swal.fire({
                    type: 'error',
                    title: 'Login Gagal!',
                    text: response.successNull
                  });
          }else if(response.errorPassword){
            $("#inputEmail").val("");
            $("#inputPassword").val("");
             $('#email').addClass('d-none');
            $('#password').addClass('d-none');
              Swal.fire({
                    type: 'error',
                    title: 'Login Gagal!',
                    text: response.errorPassword
                  });
          }else if(response.errorAktif){
            $("#inputEmail").val("");
            $("#inputPassword").val("");
             $('#email').addClass('d-none');
            $('#password').addClass('d-none');
              Swal.fire({
                    type: 'error',
                    title: 'Login Gagal!',
                    text: response.errorAktif
                  });
          }else{
            $("#inputEmail").val("");
            $("#inputPassword").val("");
             $('#email').addClass('d-none');
            $('#password').addClass('d-none');
              Swal.fire({
                    type: 'error',
                    title: 'Login Gagal!',
                    text: response.errorEmail
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