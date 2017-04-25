//for delete or modify posts
$(document).ready(function() {
	//for post deletion
	$('div.posts_area').on('click','.post_box_header a:has(i)',function(){
		var postId = $(this).parent().parent().attr('value');
		if(confirm("Are you sure to delete")){
			$.ajax({
				url: "includes/form_handlers/delete_post_handler.php",
				type: "POST",
				data: "postId="+postId+"&delete_post=true",
				cache: false,

				success: function(returnedData) {
					$('div.posts_area').find('div.well[value='+postId+']').remove();
					var $it = $('#postNum p.profile_p_count');
					$it.empty();
					$it.append(returnedData);
				}
			});
		}
		return false;
	});
	

	//for adding likes
	$('div.posts_area').on('click','.like>a:has(i)',function(){
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
	$('div.posts_area').on('click','.commentdis>a',function(){
		var $targetElement = $(this).parent().parent().parent().next();
		$targetElement.toggle('slow');
	});

	//for adding each comment in .comment area
	$('div.posts_area').on('click', '.comment button', function(){	
		var $this = $(this);
		var postId = $this.parent().parent().parent().parent().attr('value');
		var username = $('input:hidden:eq(0)').val();
		var userId = $('input:hidden:eq(1)').val();
		var profile_pic = $('input:hidden:eq(2)').attr('value');
		var comment = $this.prev().find('p>div').text();	
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
						$this.prev().find('p>div').text("");
						$this.parent().parent().next().empty();
						$this.parent().parent().next().append(returnedData);
					}
				}
		});
		return false;
	});

	//for comment deletion
	$('div.posts_area').on('click','#each_comment i',function(){
		var $this = $(this);
		var commentId = $this.parent().parent().parent().attr('value');
		if(confirm("Are you sure to delete")){
			$.ajax({
				url: "includes/form_handlers/delete_comment_handler.php",
				type: "POST",
				data: "commentId="+commentId+"&delete_comment=true",
				cache: false,

				success: function(returnedData) {
					$this.parent().parent().parent().remove();
				}
			});
		}
		return false;
	});

	//for search ajax
	$("nav #searchInput").keyup(function(){
		var searchedUsername = this.value;
		searchedUsername = $.trim(searchedUsername);
		if (searchedUsername == '') {
			$("nav").find('.search_result_ajax').hide('slow','swing');
		}else{
			$("nav").find('.search_result_ajax').show('slow','swing');
			
			$.ajax({
				url: "includes/form_handlers/search_handler.php",
				type: "POST",
				data: "searchRegisteredUserAjax=true"+
					  "&searchedUsername="+searchedUsername,
				cache: false,

				success: function(returnedData) {
					$("nav").find('.search_result_ajax').empty();
					$("nav").find('.search_result_ajax').append(returnedData);
				}
			});
		}
	});
	
	//for share ajax
	$('div.posts_area').on('click','.share>a',function(){
		var shareContent = $(this).parent().parent().prev().html();
		var shareUsername = $(this).parent().parent().parent().prev().find('.post_info>p').text();
		$.ajax({
				url: "includes/form_handlers/share_handler.php",
				type: "POST",
				data: "shareContent="+shareContent+"&shareUsername="+shareUsername,
				cache: false,
				success: function(returnedData) {
						alert("Shared!");
						location.reload();
						return false;
				}
		});
		
	});

	$(window).click(function(){
		$("nav").find('.search_result_ajax').hide('slow','swing');
	});
});

update();
function update() {
    $.ajax({
        url: 'includes/form_handlers/check_num_unseen_messages.php',
        type: 'GET',
        success: function(data) {
        	if(data!=0){
                var add_this =  " "+data ;
                $("#new_message").html(add_this);
                /*var container = document.getElementById("yourDiv");
                var content = container.innerHTML;
                container.innerHTML= content;*/
            }
            else{
            	$("#new_message").empty();
            }
        }
    });
}

setInterval('update()', 2000); // refresh div after 2 secs

//--------------------Search Ajax Add & Delete Friend------------------
$(document).ready(function() {
	$('nav .search_result_ajax').on("click", ".Add", function(){
		var $thisObj = $(this);
		var addFriendByName = $(this).prev().prev().val();
		if (confirm("Add "+addFriendByName+" as your friend?")) {
			var addFriendById = $(this).prev().val();
			$.ajax({
			url: "includes/form_handlers/friend_handler.php",
			type: "POST",
			data: "addFriendById="+addFriendById,
			cache: false,

			success: function(returnedData) {
				var result = $.parseJSON(returnedData);
				$thisObj.replaceWith(result[0]);
				if(result[1] == 1){
					alert(addFriendByName+" is your friend now");
				}else{
					alert("Wait for "+addFriendByName+"'s respond");
				}
				
				return false;
			}
		});
		}
	});

	$('nav .search_result_ajax').on("click", ".Delete", function(){
		var $thisObj = $(this);
		var deleteFriendByName = $(this).prev().prev().val();
		if (confirm("Delete "+deleteFriendByName+" ?")) {

			var deleteFriendById = $(this).prev().val();
			$.ajax({
			url: "includes/form_handlers/friend_handler.php",
			type: "POST",
			data: "deleteFriendById="+deleteFriendById,
			cache: false,

			success: function(returnedData) {
				$thisObj.replaceWith(returnedData);

				alert("Delete friend successfully");
				return false;
			}
		});
		}
		
	});

	$('ul.navbar-nav').on("click", ".Add", function(){
		var addFriendByName = $(this).prev().val();
		if (confirm("Add "+addFriendByName+" as your friend?")) {
			var addFriendById = $(this).prev().prev().val();
			$.ajax({
			url: "includes/form_handlers/friend_handler.php",
			type: "POST",
			data: "addFriendById="+addFriendById,
			cache: false,

			success: function(returnedData) {
				alert(addFriendByName+" is your friend now");
				location.reload();
				return false;
			}
		});
		}
	});

});