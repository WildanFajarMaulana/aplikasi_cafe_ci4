$(document).ready(function(){
	$('.button-keluar').on('click',function(){
    var csrfName = $('.csrfCafe').attr('name'); // CSRF Token name
        var csrfHash = $('.csrfCafe').val(); // CSRF hash
		 $.ajax({
                  type:"post",
                  url:'/app/logout.html',
                  data:{[csrfName]: csrfHash},
                  dataType:"json",
                  success:function(response){
                     $('.csrfCafe').val(response.token);
                      Swal.fire({
	                    type: 'success',
	                    title: 'Logout!',
	                    text: response.data
	                  }).then (function() {
                    window.location.href = "/app/login.html";
                  });
                  },
                  error:function(xhr,ajaxOptions,thrownError){
                    alert(xhr.status+"\n"+xhr.responseText+"\n"+thrownError);
                  }
                
                });
	})
})