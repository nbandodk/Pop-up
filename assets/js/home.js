//for delete or modify posts
$(document).ready(function() {
	$('div.posts_area').on('click','a',function(){
		var postId = $(this).parent().attr('value');
		if(confirm("Are you sure to delete")){
			$.ajax({
				url: "includes/form_handlers/delete_post_handler.php",
				type: "POST",
				data: "postId="+postId+"&delete_post=true",
				cache: false,

				success: function(returnedData) {
					$('div.posts_area').find('div.well[value='+postId+']').remove();
				}
			});
		}
		return false;
	});
	
	
	
	

});


