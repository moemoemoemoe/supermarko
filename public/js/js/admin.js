$(document).ready(function(){
	$('.editBtn').click(function(e) {
	 	var labelId = $(this).attr('id');
	 	var labelName = $(this).attr('data-label');
	 	var bootboxContent = $('#myModal-'+labelId).html();
	 	//alert(bootboxContent);
	        var dialog = bootbox.dialog({
			    title: 'Edit Label - '+labelName,
			    message: '<p><i class="fa fa-spin fa-spinner"></i> Loading...</p>'
			});
			dialog.init(function(){
			    setTimeout(function(){
			        dialog.find('.bootbox-body').html(bootboxContent);
			    }, 200);
			});
	});

})
