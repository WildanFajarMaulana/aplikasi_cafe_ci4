   function readGambar(){
        const sampul=document.querySelector('#fotoInput');
        
        const imgPreview=document.querySelector('.fotoProfile');

       

        const fileSampul=new FileReader();
        fileSampul.readAsDataURL(sampul.files[0]);

        fileSampul.onload =function(e){
          // $('#imagePreview').css('background-image', 'url('+e.target.result +')');
          // imgPreview.style.backgroundImage="url"+(e.target.result )+"";
           imgPreview.src=e.target.result;
        }
   
      }
 $(document).ready(function(){
   
               
    $('.formTambah').submit(function(e){
      e.preventDefault();
      $.ajax({
        type:"post",
        url:$(this).attr('action'),
        data:new FormData(this),
        contentType: false,       
        cache: false,            
        processData:false,  
        dataType:"json",
        beforeSend:function(){
          $(".btn-tambahprofile").attr('disabled','disabled');
          $(".btn-tambahprofile").html(`<div class="spinner-border text-light mt-1" role="status">
            <span class="sr-only">Loading...</span>
          </div>`);
        },
        complete:function(){
          $(".btn-tambahprofile").removeAttr('disabled');
          $(".btn-tambahprofile").removeClass('spinner-border text-light');
          $(".btn-tambahprofile").html('Lengkapi Profil');
        },
        success:function(response){
            $('.csrfCafe').val(response.token);
          if(response.error){
            if(response.error.nama){
              $('#nama').removeClass('d-none');
               $('#nama').addClass('styleValidation');
              $('#nama').html(response.error.nama);
            }else{
              
               $('#nama').remove();
            }

             if(response.error.nomor){
              $('#nomor').removeClass('d-none');
               $('#nomor').addClass('styleValidation');
              $('#nomor').html(response.error.nomor);
            }else{
               
               $('#nomor').remove();
            }

             if(response.error.alamat){
              $('#alamat').removeClass('d-none');
               $('#alamat').addClass('styleValidation');
              $('#alamat').html(response.error.alamat);
            }else{
               
               $('#alamat').remove();
            }

             if(response.error.foto){
              $('#foto').removeClass('d-none');
              $('#foto').addClass('styleValidation');
              $('#foto').html(response.error.foto);
            }else{
              
               $('#foto').remove();
            }
            
          }else{
            if(response.success){
              
              $('#nama').addClass('d-none');
              $('#nomor').addClass('d-none');
              $('#alamat').addClass('d-none');
              $('#foto').addClass('d-none');
               Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text:response.success
              }).then (function() {
                    window.location.href = "/app/pinProfile.html";
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
