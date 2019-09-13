$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){
	$('.edit').click(function(){
		$(".error").hide();
		let id = $(this).data('id');
		//Edit
		$.ajax({
			url : 'admin/category/'+id+'/edit',
			dataType : 'json',
			type : 'get',
			success :function($result){
				console.log($result);
				$('.name').val($result.name);
				$('.title').text($result.name);
				if($result.status == 1){
					$('.ht').attr('selected','selected');
				}
				else{
					$('.kht').attr('selected','selected');
				}
			}
		});
		$('.update').click(function(){
			let ten = $('.name').val();
			let status = $('.status').val();
			$.ajax({
				url : 'admin/category/'+id,
				data : {
					name : ten,
					status : status
				},
				type : 'put',
				dataType : 'json',
				success :function($result){
					console.log($result);
					if($result.error == 'true'){
						$(".error").show();
						$(".error").text($result.message.name[0]);
					}
					else{
						toastr.success($result.success, 'Thông báo', {timeOut: 5000});
						$('#edit').modal('hide');
						location.reload();
					}

				}
			});
		});
	});
	//Delete category
	$('.delete').click(function(){
		let id =$(this).data('id');
		$('.del').click(function(){
			$.ajax({
				url : 'admin/category/'+id,
				dataType : 'json',
				type : 'delete',
				success : function($result){
					toastr.success($result.success, 'Thông báo', {timeOut: 5000});
					$('#delete').modal('hide');
					location.reload();
				}
			});
		});
	});

	//Edit ProductType
	$('.editProducttype').click(function(){
		$(".error").hide();
		let id = $(this).data('id');
		$.ajax({
			url : 'admin/producttype/'+id+'/edit',
			dataType : 'json',
			type: 'get',
			success : function($result){
				$('.name').val($result.producttype.name);
				var html = '';
				$.each($result.category, function($key,$value){
					if($value['id'] == $result.producttype.idCategory){
						html += '<option value='+$value['id']+' selected>';
							html += $value['name'];
						html += '</option>';
					}else{
						html += '<option value='+$value['id']+' >';
							html += $value['name'];
						html += '</option>';
					}
				});
				$('.idCategory').html(html);
				if($result.producttype.status == 1){
					$('.ht').attr('selected','selected');
				}
				else{
					$('.kht').attr('selected','selected');
				}
			}
		});
		$('.updateProductType').click(function(){
			let idCategory = $('.idCategory').val();
			let name = $('.name').val();
			let status = $('.status').val();
			$.ajax({
				url : 'admin/producttype/'+id,
				dataType : 'json',
				data : {
					idCategory : idCategory,
					name : name,
					status : status
				},
				type : 'put',
				success : function($data){
					console.log($data);
					if($data.error == 'true'){
						$('.error').show();
						$('.error').text($data.message.name[0]);
					}
					else{
						toastr.success($data.result, 'Thông báo', {timeOut: 5000});
						$('#edit').modal('hide');
						location.reload();
					}
				}
			});
		});
	});
	//Delete producttype
	$('.deleteProducttype').click(function(){
		let id = $(this).data('id');
		$('.del-producttype').click(function(){
			$.ajax({
				url : 'admin/producttype/'+id,
				dataType : 'json',
				type : 'delete',
				success : function($data){
					toastr.success($data.result, 'Thông báo', {timeOut: 5000});
					$('#delete').modal('hide');
					location.reload();
				}
			});
		});
	});
	//Lấy loại sản phẩm theo danh mục sản phẩm
	// $('.cateProduct').change(function(){
	// 	let idCate = $(this).val();
	// 	$.ajax({
	// 		url : 'getproducttype',
	// 		data : {
	// 			idCate : idCate
	// 		},
	// 		type : 'get',
	// 		dataType : 'json',
	// 		success : function($data){
	// 			console.log($data);
	// 			var html = '';
	// 			$.each($data, function($key,$value){
	// 				html += '<option value='+$value['id']+'>';
	// 					html += $value['name'];
	// 				html += '</option>';
	// 			});
	// 			$('.proTypeProduct').html(html);
	// 		}
	// 	});
	// });
	//Edit product
	// $('.editProduct').click(function(){
	// 	let id = $(this).data('id');
	// 	$.ajax({
	// 		url : 'admin/product/'+id+'/edit',
	// 		dataType : 'json',
	// 		type : 'get',
	// 		success : function($data){
	// 			$('.name').val($data.product.name);
	// 			$('.quantity').val($data.product.quantity);
	// 			$('.price').val($data.product.price);
	// 			$('.promotion').val($data.product.promotion);
	// 			$('.imageThumb').attr('src','img/upload/product/'+$data.product.image);
	// 			//$('.description').val($data.product.description);
	// 			CKEDITOR.instances['demo'].setData(data.product.description);
	// 		}
	// 	});
	// });
	//Delete product
	$('.deleteProduct').click(function(){
		let id = $(this).data('id');
		$('.delProduct').click(function(){
			$.ajax({
				url : 'admin/product/'+id,
				dataType : 'json',
				type : 'delete',
				success : function($data){
					toastr.success($data.result, 'Thông báo', {timeOut: 5000});
					$('#delete').modal('hide');
					location.reload();
				}
			});
		});		
	});

});