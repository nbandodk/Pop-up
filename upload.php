<?php 
require 'header.php';
require 'includes/service/user.php';
require 'includes/form_handlers/home_handler.php';
$profile_id = $user['username'];
$imgSrc = "";
$result_path = "";
$msg = "";
/***********************************************************
	0 - Remove The Temp image if it exists
***********************************************************/
	if (!isset($_POST['x']) && !isset($_FILES['image']['name']) ){
		//Delete users temp image
			$temppath = 'assets/images/profile_pics/'.$profile_id.'_temp.jpeg';
			if (file_exists ($temppath)){ @unlink($temppath); }
	} 
if(isset($_FILES['image']['name'])){	
/***********************************************************
	1 - Upload Original Image To Server
***********************************************************/	
	//Get Name | Size | Temp Location		    
		$ImageName = $_FILES['image']['name'];
		$ImageSize = $_FILES['image']['size'];
		$ImageTempName = $_FILES['image']['tmp_name'];
	//Get File Ext   
		$ImageType = @explode('/', $_FILES['image']['type']);
		$type = $ImageType[1]; //file type	
	//Set Upload directory    
		$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/Pop-up/assets/images/profile_pics';
	//Set File name	
		$file_temp_name = $profile_id.'_original.'.md5(time()).'n'.$type; //the temp file name
		$fullpath = $uploaddir."/".$file_temp_name; // the temp file path
		$file_name = $profile_id.'_temp.jpeg'; //$profile_id.'_temp.'.$type; // for the final resized image
		$fullpath_2 = $uploaddir."/".$file_name; //for the final resized image
	//Move the file to correct location
		$move = move_uploaded_file($ImageTempName ,$fullpath) ; 
		chmod($fullpath, 0777);  
		//Check for valid uplaod
		if (!$move) { 
			die ('File didnt upload');
		} else { 
			$imgSrc= "assets/images/profile_pics/".$file_name; // the image to display in crop area
			$msg= "Upload Complete!";  	//message to page
			$src = $file_name;	 		//the file name to post from cropping form to the resize		
		} 
/***********************************************************
	2  - Resize The Image To Fit In Cropping Area
***********************************************************/		
		//get the uploaded image size	
			clearstatcache();				
			$original_size = getimagesize($fullpath);
			$original_width = $original_size[0];
			$original_height = $original_size[1];	
		// Specify The new size
			$main_width = 500; // set the width of the image
			$main_height = $original_height / ($original_width / $main_width);	// this sets the height in ratio									
		//create new image using correct php func			
			if($_FILES["image"]["type"] == "image/gif"){
				$src2 = imagecreatefromgif($fullpath);
			}elseif($_FILES["image"]["type"] == "image/jpeg" || $_FILES["image"]["type"] == "image/pjpeg"){
				$src2 = imagecreatefromjpeg($fullpath);
			}elseif($_FILES["image"]["type"] == "image/png"){ 
				$src2 = imagecreatefrompng($fullpath);
			}else{ 
				$msg .= "There was an error uploading the file. Please upload a .jpg, .gif or .png file. <br />";
			}
		//create the new resized image
			$main = imagecreatetruecolor($main_width,$main_height);
			imagecopyresampled($main,$src2,0, 0, 0, 0,$main_width,$main_height,$original_width,$original_height);
		//upload new version
			$main_temp = $fullpath_2;
			imagejpeg($main, $main_temp, 90);
			chmod($main_temp,0777);
		//free up memory
			imagedestroy($src2);
			imagedestroy($main);
			//imagedestroy($fullpath);
			@ unlink($fullpath); // delete the original upload					
									
}//ADD Image 	
/***********************************************************
	3- Cropping & Converting The Image To Jpg
***********************************************************/
if (isset($_POST['x'])){
	
	//the file type posted
		$type = $_POST['type'];	
	//the image src
		$src = 'assets/images/profile_pics/'.$_POST['src'];	
		$finalname = $profile_id.md5(time());	
	
	if($type == 'jpg' || $type == 'jpeg' || $type == 'JPG' || $type == 'JPEG'){	
	
		//the target dimensions 150x150
			$targ_w = $targ_h = 150;
		//quality of the output
			$jpeg_quality = 90;
		//create a cropped copy of the image
			$img_r = imagecreatefromjpeg($src);
			$dst_r = imagecreatetruecolor( $targ_w, $targ_h );
			imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
			$targ_w,$targ_h,$_POST['w'],$_POST['h']);
		//save the new cropped version
			imagejpeg($dst_r, "assets/images/profile_pics/".$finalname."n.jpeg", 90); 	
			 		
	}else if($type == 'png' || $type == 'PNG'){
		
		//the target dimensions 150x150
			$targ_w = $targ_h = 150;
		//quality of the output
			$jpeg_quality = 90;
		//create a cropped copy of the image
			$img_r = imagecreatefrompng($src);
			$dst_r = imagecreatetruecolor( $targ_w, $targ_h );		
			imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
			$targ_w,$targ_h,$_POST['w'],$_POST['h']);
		//save the new cropped version
			imagejpeg($dst_r, "assets/images/profile_pics/".$finalname."n.jpeg", 90); 	
						
	}else if($type == 'gif' || $type == 'GIF'){
		
		//the target dimensions 150x150
			$targ_w = $targ_h = 150;
		//quality of the output
			$jpeg_quality = 90;
		//create a cropped copy of the image
			$img_r = imagecreatefromgif($src);
			$dst_r = imagecreatetruecolor( $targ_w, $targ_h );		
			imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
			$targ_w,$targ_h,$_POST['w'],$_POST['h']);
		//save the new cropped version
			imagejpeg($dst_r, "assets/images/profile_pics/".$finalname."n.jpeg", 90); 	
		
	}
		//free up memory
			imagedestroy($img_r); // free up memory
			imagedestroy($dst_r); //free up memory
			@ unlink($src); // delete the original upload					
		
		//return cropped image to page	
		$result_path ="assets/images/profile_pics/".$finalname."n.jpeg";
		// getting the id of the user to insert path of profile_pic into database
		$user_id = $user['id'];
		$username = $user['username'];
		
		//Insert image into users table
		$insert_pic_query = mysqli_query($con, "UPDATE users SET profile_pic='$result_path' WHERE id='$user_id'");
		//Insert image into comments table
		mysqli_query($con, "UPDATE comments SET profile_pic='$result_path' WHERE comment_by_id='$user_id'");
		//Insert image into likes table
		mysqli_query($con, "UPDATE likes SET profile_pic='$result_path' WHERE user_id='$user_id'");
		header("Location: profile.php?username=".$username."&id=".$user_id);
}// post x
?>
<link rel="stylesheet" type="text/css" href="assets/css/upload_style.css">
<div id="Overlay" style=" width:100%; height:100%; border:0px #990000 solid; position:absolute; top:0px; left:0px; z-index:2000; display:none;"></div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 upload_profile_pic_area">

			<div id="formExample">
			    <p><b> <?=$msg?> </b></p>

			    <div class="form_header">
		        	<h4 style="color: #000">Update Your Profile Picture!</h4>
		        </div>

		        <hr style="height: 1px; border: none; border-top: 2px solid #ddd;">
			    
			    <form action="upload.php" method="post" enctype="multipart/form-data">
			    	<div class="row">
			    		<div class="col-xs-5 col-sm-2">
			   	 			<input class="btn btn-primary" type="button" id="image" name="image" onclick="myImage.click();" value="Browse" style="font-size: 14px; width: 85px;">
			   	 		</div>
			   	 		<div class="col-xs-7 col-sm-8 col-sm-offset-2">
			   	 			<input type="text" class='form-control filename' id="filename" style="" disabled="true">
							<input type="file" id="myImage" name="image" onchange="filename.value=this.value" style="display: none" required><br>
						</div>
					</div>

			        <!--<input type="file" class="btn btn-default" id="image" name="image">-->
			        <input type="submit" class="btn btn-success" value="Submit" style="margin-top: 30px; font-size: 14px; width: 85px;">
			    </form>
			    
			</div> <!-- Form-->
		</div>

    <?php
    if($imgSrc){ //if an image has been uploaded display cropping area?>
	    <script>
	    	$('#Overlay').show();
			$('#formExample').hide();
	    </script>
	    <div class="col-sm-10 col-sm-offset-1">
		    <div id="CroppingContainer" style="background-color: #FFF; position: relative; margin-right: auto; margin-left: auto; overflow: hidden; border: 2px #666 solid; z-index: 2001; padding-bottom: 0px;">  
		    
		        <div id="CroppingArea" style="width: 500px; max-height: 400px; position: relative; overflow: hidden; margin: 40px 0px 40px 40px; border: 2px #666 solid; float: left;">	
		            <img src="<?=$imgSrc?>" border="0" id="jcrop_target" style="border:0px #990000 solid; position:relative; margin:0px 0px 0px 0px; padding:0px; " />
		        </div>  

		        <div id="InfoArea" style="width:180px; height:150px; position:relative; overflow:hidden; margin:40px 0px 0px 40px; border:0px #666 solid; float:left;">	
		           	<p style="margin:0px; padding:0px; color:#444; font-size:18px;">          
		                <b>Crop Profile Image</b><br /><br />
		                <span style="font-size:14px;">
		                    Crop / resize your uploaded profile image. <br>
		                    Once you are happy with your profile image then please click Upload.
		                </span>
		           	</p>
		        </div>  

		        <br>

		        <div id="CropImageForm" style="width:100px; height:30px; float:left; margin:10px 0px 0px 40px;" >  
		            <form action="upload.php" method="post" onsubmit="return checkCoords();">
		                <input type="hidden" id="x" name="x" />
		                <input type="hidden" id="y" name="y" />
		                <input type="hidden" id="w" name="w" />
		                <input type="hidden" id="h" name="h" />
		                <input type="hidden" value="jpeg" name="type" /> <?php // $type ?> 
		                <input type="hidden" value="<?=$src?>" name="src" />
		                <input type="submit" value="Upload" style="width:100px; height:30px;" />
		            </form>
		        </div>

		        <div id="CropImageForm2" style="width:100px; height:30px; float:left; margin:10px 0px 0px 40px;" >  
		            <form action="upload.php" method="post" onsubmit="return cancelCrop();">
		                <input type="submit" value="Drop Changes" style="width:100px; height:30px;" />
		            </form>
		        </div>
		            
		    </div><!-- CroppingContainer -->
	    </div>
		<?php 
		} ?>
	</div>
</div>


<?php if($result_path) {
 ?>
 	<img src="<?=$result_path?>" style="position:relative; margin:10px auto; width:150px; height:150px;" />
<?php } ?>

<br><br>