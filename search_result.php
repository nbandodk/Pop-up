<?php 
	require 'header.php';
	require 'includes/service/user.php';
?>
 <!--body-->

 	<div class="container text-center">
	 	<div class="row sheader">
	 		<div class="col-xs-12 col-sm-2 sleft">
				<h3 class="stitle"><strong>Search Result</strong></h3>
			</div>

			<div class="col-xs-12 col-sm-2 sright">
				<!-- Button trigger modal -->
				<a data-toggle="modal" data-target="#filter" style="float: left;">
				  <i class='icon-cog' aria-hidden='true'></i> Advanced search
				</a>
			</div>			
		</div>
		<hr style="height: 1px; border: none; background-color: #bdc3c7; margin-top: 5px; margin-bottom: 25px;">
		<div class="row">
			<div class="col-sm-12">
 				<?php echo $_SESSION['search_result'] ?>
 			</div>
 		</div>
 	</div>

	<!-- Modal -->
	<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel" style="text-align: center;">Filter Search Result</h4>
			</div>
									
			<div class="modal-body">
				<form action="includes/form_handlers/searchResult_handler.php" class="form-horizontal text-left" method="POST" style="font-size: 16px;">
					<div class="form-group" style="margin-bottom: 5px;">
                        <label for="sear_friend" class="col-sm-4 control-label" style="text-align: left; padding-top: 5px; padding-bottom: 5px;">Search your friend</label>
                        <div class="col-sm-5">
							<label class="checkbox-inline">
								<input type="radio" name="isFriend" id="optionsRadios1" value="1" checked>Yes
							</label>
							<label class="checkbox-inline">
								<input type="radio" name="isFriend" id="optionsRadios2"  value="0">No
							</label>
						</div>
                    </div>

                    <div class="form-group" style="margin-bottom: 5px;">
                        <label for="sear_username" class="col-sm-4 control-label" style="text-align: left">Search username</label>
                        <div class="col-sm-8" style="margin-bottom: 5px;">
                        	<input type="text" name="username" class="form-control" placeholder="username">
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 5px;">
                        <label for="sear_age" class="col-sm-4 control-label" style="text-align: left">Search user age</label>
                        <div class="col-sm-8" style="margin-bottom: 5px;">
                        	<input type="number" name="age" class="form-control" placeholder="age" min=0 max=200>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 5px;">
                    	<label for="sear_gender" class="col-sm-4 control-label" style="text-align: left; padding-top: 5px; padding-bottom: 5px;">Search user gender</label>
                        <div class="col-sm-5">
							<label class="checkbox-inline">
								<input type="radio" name="gender" id="optionsRadios1" value="male" checked> Male
							</label>
							<label class="checkbox-inline">
								<input type="radio" name="gender" id="optionsRadios2"  value="female"> Female
							</label>
						</div>
                    </div>

                    <div class="form-group" style="margin-bottom: 5px;">
                        <label for="sear_street" class="col-sm-4 control-label" style="text-align: left">Search street</label>
                        <div class="col-sm-8" style="margin-bottom: 5px;">
                        	<input type="text" name="street" class="form-control" placeholder="street">
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 5px;">
                        <label for="sear_city" class="col-sm-4 control-label" style="text-align: left">Search city</label>
                        <div class="col-sm-8" style="margin-bottom: 5px;">
                        	<input type="text" name="city" class="form-control" placeholder="city">
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 5px;">
                        <label for="sear_state" class="col-sm-4 control-label" style="text-align: left">Search state</label>
                        <div class="col-sm-8" style="margin-bottom: 5px;">
                        	<input type="text" name="province" class="form-control" placeholder="province">
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 5px;">
                        <label for="sear_country" class="col-sm-4 control-label" style="text-align: left">Search country</label>
                        <div class="col-sm-8" style="margin-bottom: 5px;">
                        	<input type="text" name="country" class="form-control" placeholder="country">
                        </div>
                    </div>
                    <div class="form-group text-right" style="margin-bottom: 0; padding: 15px 15px 5px 15px; ">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary" id="fSRSumbit">Confirm</button>
                    </div>
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