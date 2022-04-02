  <?php foreach($tampildata as $td){ ?>
  <?php 
      $favMenuModel=new App\Models\favMenuModel;;
      $favMenu=$favMenuModel->getFavMenu(@$profilByIdLogin['id'],$td['id']);
  ?>
	  	<div class="box-menu-list">
            <div class="detail-menu-list">
              <h2 class="title-menu-list f-pps-l"><?= $td['nama'] ?></h2>
              <p><?= $td['kategori'] ?></p>
              <p class="harga-menu f-pps-l">Rp <?= $td['harga'] ?></p>
            </div>
            <div class="thumbnail-menu-list  thumbnail-click" style="background-image: url('/img/<?= $td['gambar'] ?>');"></div>
             <?php if(!$profilByIdLogin){ ?>
                   <a href="/app/profile.html" class="tambah-menu-list f-pps-l" style="text-decoration: none; color: black;">Tambah</a>
                  <?php }else{ ?>
            <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
            <div class="tambah-menu-list m-makanan f-pps-l" data-id="<?= $td['id'] ?>">Tambah</div>
          <?php } ?>
            <?php if(!$profilByIdLogin){ ?>
                      <a href="/app/profile.html" style="color: black;"> <i class="fas fa-heart" ></i></a>
            <?php }else{ ?>
              <?php if($favMenu){ ?>
                <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <i class="fas fa-heart deleteLikeMakanan active" data-id="<?= $td['id'] ?>"></i>
              <?php }else{ ?>
                <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <i class="fas fa-heart likeMakanan" data-id="<?= $td['id'] ?>"></i>
              <?php } ?>
            <?php } ?>
          </div>
     <?php } ?>

<script type="text/javascript">
  $(document).ready(()=>{
     $('.m-makanan').on('click',function(){
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

              $('.deleteLikeMakanan').on('click',function(){
               let id_menu=$(this).data('id');
                var csrfName = $('.csrfCafe').attr('name'); // CSRF Token name
               var csrfHash = $('.csrfCafe').val(); // CSRF hash
                $.ajax({
                  type:"post",
                  url:'/app/deleteLikeMenu.html',
                  data:{id_menu:id_menu,[csrfName]: csrfHash},
                  dataType:"json",
                  success:function(response){
                     $('.csrfCafe').val(response.token);
                    console.log(response.data);
                    dataMakananNew();
                    dataMenuFav();
                  },
                  error:function(xhr,ajaxOptions,thrownError){
                    alert(xhr.status+"\n"+xhr.responseText+"\n"+thrownError);
                  }
                
                });
            })
            $('.likeMakanan').on('click',function(){
               let id_menu=$(this).data('id');
                var csrfName = $('.csrfCafe').attr('name'); // CSRF Token name
               var csrfHash = $('.csrfCafe').val(); // CSRF hash
                $.ajax({
                  type:"post",
                  url:'/app/likeMenu.html',
                  data:{id_menu:id_menu,[csrfName]: csrfHash},
                  dataType:"json",
                  success:function(response){
                     $('.csrfCafe').val(response.token);
                    console.log(response.data);
                    dataMakananNew();
                    dataMenuFav();
                  },
                  error:function(xhr,ajaxOptions,thrownError){
                    alert(xhr.status+"\n"+xhr.responseText+"\n"+thrownError);
                  }
                
                });
            })
  })
</script>