<?php 
	require 'header.php';
?>
 <!--body-->

 	<div class="container text-center">
 		<h1 style="color: blue;">Search Result</h1>
 		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#filter">
		  Filter Search Result
		</button>
		<hr>
 		<?php echo $_SESSION['search_result'] ?>
 	</div>

 	<!-- Modal -->
	<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Filter Search Result</h4>
			</div>
									
			<div class="modal-body">
				<form action="includes/form_handlers/searchResult_handler.php" method="POST">
					<label for="1">Yes</label>
					<input type="radio" name="isFriend" class="form-control" value="1">
					<label for="0">No</label>
					<input type="radio" name="isFriend" class="form-control" value="0">
					<br>
					<input type="text" name="username" class="form-control" placeholder="username">
					<br>
					<input type="text" name="age" class="form-control" placeholder="age">
					<br>
					<input type="text" name="gender" class="form-control" placeholder="gender">
					<br>
					<input type="text" name="street" class="form-control" placeholder="street">
					<br>
					<input type="text" name="city" class="form-control" placeholder="city">
					<br>
					<input type="text" name="province" class="form-control" placeholder="province">
					<br>
					<input type="text" name="country" class="form-control" placeholder="country">
					<br>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary" id="fSRSumbit">Submit</button>
				</form>
			</div>
		</div>

	  </div>
	</div>

 	<script type="text/javascript">
 		$(document).ready(function() {
 			$('div.container').on("click", ".Add", function(){
 				var $thisObj = $(this);
 				var addFriendByName = $(this).parent().find('p').text();
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

 			$('div.container').on("click", ".Delete",function(){
 				var $thisObj = $(this);
 				var deleteFriendByName = $(this).parent().find('p').text();
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
 		});

 	</script>
 </body>
</html>