$(function(){
	$('.updateStatus').click(function(){
		var id = $(this).data('id');
		$('.itemid').val(id);
	})
	$('.viewBorrow').click(function(){
		var id = $(this).data('id');

		$.ajax({
			url:'functions/viewBorrow.php',
			type:'post',
			data:{'id':id},
			success:function(data){
				$('#borrowed').html(data);
			}
		})
	})
});