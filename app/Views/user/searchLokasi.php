 <?php if($searchLokasi){ ?>
   <div class="location-list d-none" id="location-list3">
      <h2 class="f-pps-m">Ambil Ditempat Cafe</h2>
    </div>
    <div  id="location-list2" class="d-none">
        <?php foreach($searchLokasi as $ls){ ?>
          <div class="location-list ">
              <h2 class="f-pps-m"><?= $ls['lokasi'] ?></h2>
          </div>
      <?php } ?>
    </div>
<?php }else{ ?>
  <p class="text-center mt-5">Data Tida Ada</p>
<?php } ?>


<script type="text/javascript">
  $(".location-user").on('click',function(){
  $('body').attr("style","overflow-y:hidden;height:100%");
  $('.pop-up-location').removeClass("d-none")
  setTimeout(()=>{
    $('.detail-location-pop-up').addClass("show-pop-up-location");
  },200)
})

$('#close-pop-up-button-location').on('click',function(e){
  setTimeout(()=>{
    $('.detail-location-pop-up').addClass("close-pop-up-location");
  })

  setTimeout(()=>{
    $('body').attr("style"," ");
    $('.pop-up-location').addClass("d-none");
    $('.detail-location-pop-up').removeClass("show-pop-up-location");
    $('.detail-location-pop-up').removeClass("close-pop-up-location");
  },500)
})


$('.location-list').on('click',function(){
  $('.text-location-user').html($(this).text());

  setTimeout(()=>{
    $('.detail-location-pop-up').addClass("close-pop-up-location");
  })

  setTimeout(()=>{
    $('body').attr("style"," ");
    $('.pop-up-location').addClass("d-none");
    $('.detail-location-pop-up').removeClass("show-pop-up-location");
    $('.detail-location-pop-up').removeClass("close-pop-up-location");
  },500)
})

</script>