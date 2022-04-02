
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- my css -->
    <link rel="stylesheet" href="/css/style/<?= $css; ?>">
    <link rel="stylesheet" href="/css/style/media-query.css">
    <!-- font awesome -->
    <script src="/js/font-awesome.js" ></script>

    <title><?= $title ?></title>
  </head>
  <body>
    <!-- jangan diubah -->
    <?php $request = \Config\Services::request();
    if($request->uri->getSegment(2)=='profile.html' ){ ?>

    <?php }else if($request->uri->getSegment(2)=='pinProfile.html' ){ ?>
      <section class="body">
    <?php }else{ ?>
       <section class="body">
      <!-- header nav -->
      <section class="header-nav">
        
        <div class="wrapper-header-nav">
          <!-- button back -->
          <div class="button-back">
            <i class="fas fa-arrow-left"></i>
          </div>
          <!-- end button back -->
          <!-- location dropdown -->
          <div class="loc-drop"></div>
          <!-- end location dropdown -->
          <!-- button love -->
          <div class="buton-love">
            <i class="fas fa-heart" style="color:#ff4d4d;"></i>
          </div>
          <!-- end button love -->
        </div>
      </section>
    <?php } ?>
    <?= $this->renderSection('content'); ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/sweetalert/package/dist/sweetalert2.all.js"></script>
    <script src="/js/main.js"></script>
    <script type="text/javascript" src="/js/user/<?= $js ?>"></script>
    <script type="text/javascript">
        function getKeranjangByPembeli(){
        $.ajax({
          url:"/app/getKeranjangByPembeli.html",
          dataType:"json",
          success:function(response){
            if(response.data==0){
               
            }else{
              $('#totalkeranjang').addClass('totalKeranjang');
              $('#totalkeranjang').html(response.data);

             }
          },
          error:function(xhr,ajaxOptions,thrownError){
            alert(xhr.status+"\n"+xhr.responseText+"\n"+thrownError);
          }
      
        });
      }
         function getTotalPesanan(){
        $.ajax({
          url:"/app/getStatustranksaksi.html",
          dataType:"json",
          success:function(response){
            if(response.dataPesanan==0){
               
            }else{
              console.log(response.dataPesanan);
              $('#totalPesanan').addClass('totalKeranjang');
              $('#totalPesanan').html(response.dataPesanan);

             }
          },
          error:function(xhr,ajaxOptions,thrownError){
            alert(xhr.status+"\n"+xhr.responseText+"\n"+thrownError);
          }
      
        });
      }
       function dataAlert(){
           $.ajax({
          url:"/app/getAlertPemesanan.html",
          dataType:"json",
          success:function(response){

              $('#backupAlert').addClass('d-none');
              $('#alert-pemesanan').html(response.data);
          },
          error:function(xhr,ajaxOptions,thrownError){
            alert(xhr.status+"\n"+xhr.responseText+"\n"+thrownError);
          }
      
        });
       }
      $(document).ready(function(){
         
         getTotalPesanan();
         getKeranjangByPembeli();


        $('.button-back').on('click',()=>{
          console.log('ok');
          history.back();
        })

      })



    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>