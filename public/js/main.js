$(document).ready(() => {
	// showPopUp();
	closePopUp();  
	increment();
	decrement();
	// tambahMenu();
});



// function show pop up
// const showPopUp = () => {
// 	$('.tambah-menu').on('click',function(e){
// 		console.log('pl');
// 		$('body').attr("style","overflow-y:hidden;height:100%");
// 		$('.pop-up').removeClass("d-none")
// 		setTimeout(()=>{
// 			$('.pop-up').addClass("pop-up-size");
// 			$('.detail-pop-up').addClass("show-pop-up");
// 		},200)
// 	})
// 	$('.tambah-menu-list').on('click',function(e){
// 		$('body').attr("style","overflow-y:hidden;height:100%");
// 		$('.pop-up').removeClass("d-none")
// 		setTimeout(()=>{
// 			$('.pop-up').addClass("pop-up-size");
// 			$('.detail-pop-up').addClass("show-pop-up");
// 		},200)
// 	})
// }


const closePopUp = () =>{
	$('.close-pop-up-button').on('click',function(e){
		setTimeout(()=>{
			$('.detail-pop-up').addClass("close-pop-up");
		})

		setTimeout(()=>{
			$('body').attr("style"," ");
			$('.pop-up').addClass("d-none");
			$('.detail-pop-up').removeClass("show-pop-up");
			$('.detail-pop-up').removeClass("close-pop-up");
		},500)
	})
}

const increment = () => {
	$('.button-plus').on('click',()=>{
		let value = parseInt($('.value-pesan').val());
		if(value>=0){
			value +=1;
		}else{
			value = 0;
		}
			
		$('.value-pesan').val(value)
	})
}

const decrement = () => {
	$('.button-minus').on('click',()=>{
		let value = parseInt($('.value-pesan').val());
		if(value>0){
			value -=1;
		}else{
			value = 0;
		}
		$('.value-pesan').val(value)
	})
}


// const tambahMenu = () => {
// 	let element = `<div class="wrapper-add-menu">
//                 		<div class="col-3-button-add">
//                     		<i class="fa-solid fa-minus minus-menu"></i>
//                 		</div>
//                 		<div class="col-3-button-add">
//                   			<input type="number" value="0" class="value-pesan-menu" disabled>
//                 		</div>
//                 		<div class="col-3-button-add add-menu">
//                     		<i class="fa-solid fa-plus"></i>
//                 		</div>
//               		</div>`;

// 	$('.tambah-menu').on('click',function(e){
// 		$(this).addClass('b-none');
// 		$(this).html(element);
// 	})

// 	$('.tambah-menu-list').on('click',function(e){
// 		$(this).addClass('b-none');
// 		$(this).html(element);
// 	})
// }