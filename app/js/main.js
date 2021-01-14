$("#change_num").on("submit", function(){
	$.ajax({
		url: '/basket/edit',
		method: 'post',
		dataType: 'html',
		data: $(this).serialize(),
		success: function(data){
			$('#message').html(data);
		}
	});
});