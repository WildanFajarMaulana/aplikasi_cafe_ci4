



  <?php if($tampildata){ ?>

	<?php foreach($tampildata as $td){ ?>
	<div class="box-menu">
            <div class="thumbnail-food thumbnail-click" style="background-image: url('/img/<?= $td['gambar'] ?>');">
            </div>
            <h1 class="title-food f-pps-l"><?= $td['nama'] ?></h1>
            <p class="harga f-pps-m"><?= $td['harga'] ?></p>
             <?php if(!$profilByIdLogin){ ?>
                   <a href="/app/profile.html" class="tambah-menu-no-login f-pps-l" style="text-decoration: none; color: black;">Tambah</a>
                  <?php }else{ ?>
             <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
            <div class="tambah-menu f-pps-l" data-id="<?= $td['id'] ?>">Tambah</div>
          <?php } ?>
        </div>
    <?php } ?>

  <?php }else{ ?>
  
    <p class="text-center mt-4">Menu Favorit Sedang Kosong</p>
  <?php } ?>

    <script type="text/javascript">
          
         $(document).ready(() => {
                   
          $('.tambah-menu').on('click',function(){
               // CSRF Hash
             var csrfName = $('.csrfCafe').attr('name'); // CSRF Token name
             var csrfHash = $('.csrfCafe').val(); // CSRF hash
            const id=$(this).data('id');
            console.log(id);
             $('body').attr("style","overflow-y:hidden;height:100%");
            $('.pop-up').removeClass("d-none")
            setTimeout(()=>{
              $('.pop-up').addClass("pop-up-size");
              $('.detail-pop-up').addClass("show-pop-up");
            },200)

            $.ajax({
             type:"post",
             url:'/app/dataPopupMinuman.html',
             data:{id:id,[csrfName]: csrfHash},
             dataType:"json",
              success:function(response){
                $('.csrfCafe').val(response.token);
                $('.thumbnail-pop-up ').attr("style","background-image:url(/img/"+response.data[0]['gambar']+")");
                $('.nama-makanan').html(response.data[0]['nama']);
                $('.h-makanan').html("Rp. "+response.data[0]['harga']);
                $('#harga').val(response.data[0]['harga']);
                $('#id_menu').val(response.data[0]['id']);
                $('#nama_menu').val(response.data[0]['nama']);
                $('#gambar_menu').val(response.data[0]['gambar']);
              },
              error:function(xhr,ajaxOptions,thrownError){
                alert(xhr.status+"\n"+xhr.responseText+"\n"+thrownError);
              }
            
          });
           
            })
          
          // tambahMenu();
        });
       </script>