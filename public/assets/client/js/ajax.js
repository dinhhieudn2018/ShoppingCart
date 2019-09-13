// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });
// $(document).ready(function(){
// 	//cập nhật số lượng
// 	$('.qty').blur(function(){
// 		let rowId = $(this).data('id');
// 		$.ajax({
// 			url : 'cart/'+rowId,
// 			type : 'put',
// 			dataType : 'json',
// 			data : {
// 				qty : $(this).val(),
// 			},
// 			success : function(data){
// 				console.log(data);
// 				if(data.error){
// 					toastr.error(data.error, 'Thông báo', {timeOut: 5000});
// 				}
// 				else{
// 					toastr.success(data.result, 'Thông báo', {timeOut: 5000});
// 					window.location.reload(true);
// 				}	
// 			}
// 		});
// 	});
// 	//Xóa sản phẩm khỏi giỏ hàng
// 	$('.close1').click(function(){
// 		let rowId = $(this).data('id');
// 		$.ajax({
// 			url : 'cart/'+rowId,
// 			type : 'delete',
// 			dataType : 'json',
// 			success : function(data){
// 				console.log(data);
// 				toastr.success(data.result, 'Thông báo', {timeOut: 5000});
// 				window.location.reload(true);
// 			}
// 		});
// 	});
// });