//for delete or modify posts
$(document).ready(function() {
	//for post deletion
	$('div.posts_area').on('click','a:has(i)',function(){
		var postId = $(this).parent().parent().attr('value');
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
	

	//for adding likes
	$('div.posts_area').on('click','.like>button:has(i)',function(){
		var $this = $(this);
		var postId = $this.parent().parent().attr('value');
		var username = $('input:hidden:eq(0)').val();
		var userId = $('input:hidden:eq(1)').val();
		var profile_pic = $('input:hidden:eq(2)').attr('value');
		$.ajax({
				url: "includes/form_handlers/like_handler.php",
				type: "POST",
				data: "postId="+postId+
					  "&username="+username+
					  "&userId="+userId+
					  "&profile_pic="+profile_pic,
				cache: false,

				success: function(returnedData) {
					$this.nextAll().remove();
					$this.after(returnedData);
				}
		});

		$.ajax({
				url: "includes/form_handlers/like_handler.php",
				type: "POST",
				data: "postId="+postId,
				cache: false,

				success: function(returnedData) {
					$this.empty();
					$this.append(returnedData);
				}
		});
		return false;
	});

	//for adding toggle to comment button next to the like button 
	$('div.posts_area').on('click','.commentdis>button',function(){
		var $targetElement = $(this).parent().parent().parent().next();
		var targetElement = $targetElement.get(0);
		if(targetElement.style.display == "block") 
			targetElement.style.display = "none";
		else 
			targetElement.style.display = "block";
	});

	//for adding each comment in .comment area
	$('div.posts_area').on('click', '.comment button', function(){	
		var $this = $(this);
		var postId = $this.parent().parent().parent().parent().attr('value');
		var username = $('input:hidden:eq(0)').val();
		var userId = $('input:hidden:eq(1)').val();
		var profile_pic = $('input:hidden:eq(2)').attr('value');
		var comment = $this.prev().find('input').val();	
		// if <p> exists before <form></form> delete it
		$this.parent().prevAll('p').remove();
		$.ajax({
				url: "includes/form_handlers/comment_handler.php",
				type: "POST",
				data: "postId="+postId+
					  "&username="+username+
					  "&userId="+userId+
					  "&profile_pic="+profile_pic+
					  "&comment="+comment,
				cache: false,

				success: function(returnedData) {
					var error = "Please enter the content!";
					if(returnedData.indexOf(error) >=0){
						$this.parent().before(returnedData);
					}else{
						$this.prev().find('input').val("");
						$this.parent().parent().next().empty();
						$this.parent().parent().next().append(returnedData);
					}
				}
		});
		return false;
	});

	//for comment deletion
	$('div.posts_area').on('click','.eachComment>span',function(){
		var $this = $(this);
		var commentId = $this.parent().attr('value');
		if(confirm("Are you sure to delete")){
			$.ajax({
				url: "includes/form_handlers/delete_comment_handler.php",
				type: "POST",
				data: "commentId="+commentId+"&delete_comment=true",
				cache: false,

				success: function(returnedData) {
					$this.parent().remove();
				}
			});
		}
		return false;
	});
});


