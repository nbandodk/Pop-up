<?php require 'config/config.php'; //connect to database  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome <?php if(isset($_SESSION['username'])) echo $_SESSION['username']  ?> !</title>

  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/myicon/pop-up.ico">

    <!-- css including boostrap -->
    <link href="assets/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Begin emoji-picker Stylesheets -->
    <link href="assets/emoji_lib/css/nanoscroller.css" rel="stylesheet">
    <link href="assets/emoji_lib/css/emoji.css" rel="stylesheet">
    <!-- End emoji-picker Stylesheets -->

    <!-- custom styles for this page -->
    <link href="assets/css/flat-ui.css" rel="stylesheet">
    <link href="assets/css/home_style.css" rel="stylesheet">
    <link href="assets/css/profile_style.css" rel="stylesheet">
    <link href="assets/css/search_style.css" rel="stylesheet">
    <link href="assets/css/messages_style.css" rel="stylesheet">
    
    <!--for upload picture-->
    <link href="assets/css/jquery.Jcrop.css" rel="stylesheet">

    <style>  
        //search bar drop down
        .search_result_ajax {
          position: absolute;
          background-color: #f9f9f9;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          padding: 12px 16px;
        }
        
        /* Set black background color, white text and some padding */
        footer {
          background-color: #555;
          color: white;
          padding: 15px 0;
          height: 50px;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-f navbar-fixed-top ll">
        <div class="container-fluid">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-reorder"></span>
                </button>
                <a href="home.php" class="navbar-brand">Pop-up</a>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <!-- <li class="active"><a href="home.php"><i class="icon-home icon-large"></i> Home</a></li> -->

                    <li><a href="messages.php" id="count_unseen_messages"><i class=" icon-envelope icon-large"></i>
                    <?php
                        echo "Messages <span id='new_message' class='badge'></span>"; 
                    ?>
                    </a></li>
                    
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class=" icon-bell-alt icon-large"></i> Notice <?php
                        $id = $_SESSION['id'];
                        $query = "SELECT friend_id FROM user_friend WHERE user_id='$id' AND block='yes' ";
                        $friendRequest =  mysqli_query($con,$query);
                        $numRows = mysqli_num_rows($friendRequest);
                        if ($numRows != 0) {
                            $output = "<span class='badge'>".$numRows."</span></a>";
                            $output .="<ul class='dropdown-menu'>";
                            while ($row = mysqli_fetch_array($friendRequest)) {
                               $fid = $row['friend_id'];
                               $user_details_query = mysqli_query($con,"select * from users where id='$fid'");
                               $friend_request = mysqli_fetch_array($user_details_query);
                               $output .= "
                                <li>
                                    <div class='row' style='margin-bottom: 5px; margin-top: 6px;'>
                                        <div class='col-xs-7 col-sm-7'>
                                            <img src='".$friend_request['profile_pic']."' class='img-circle' height='25' width='25' style='margin-left:3px;'><span style='color: #fff'> &nbsp".$friend_request['username']."</span>
                                        </div>
                                        <div class='col-xs-4 col-sm-4'>
                                            <input type='hidden' value='".$friend_request['id']."'/>
                                            <input type='hidden' value='".$friend_request['username']."'/>
                                            <a class='Add' style='color: #fff'>
                                                <i class='icon-ok'></i> Pass
                                            </a>
                                        </div>
                                    </div>
                                </li>
                               ";
                            }
                            $output .=" </ul>";
                            echo $output;
                        } 
                        
                        ?>
                        </a>
                        
                    </li>
                </ul>
                <form action="includes/form_handlers/search_handler.php" class="navbar-form navbar-right" method="post" role="search">
                    <div class="form-group input-group">
                        
                        <input type="search" id="searchInput" class="form-control" placeholder="Search.." data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="searchForm">

                        <span class="input-group-btn">
                          <button class="btn" type="submit">
                            <span class="icon-search"></span>
                          </button>
                        </span>
                    </div>
                    
                    <!--To show the search result-->
                    <div class="well search_result_ajax" style="display: none;">
                    </div>
                </form>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php if(isset($_SESSION['username'])) echo $_SESSION['username']  ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="profile.php?<?php echo "username=".$_SESSION['username']."&id=".$_SESSION['id']?>"><i class="icon-user icon-large"></i> My profile</a></li>
                            <li class="divider"></li>
                            <li><a href="includes/form_handlers/logout_handler.php"><i class="icon-signout icon-large"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<!-- Bootstrap core JavaScript-->
<script type="text/javascript" src="assets/Bootstrap/js/bootstrap.min.js"></script>

<!-- Custom Javascript -->
<script type="text/javascript" src="assets/js/home.js"></script>
<script type="text/javascript">
    // Navbar box shadow on scroll 
    $(function(){
        var navbar = $('.navbar');
        $(window).scroll(function(){
            if($(window).scrollTop() <= 40){
                navbar.css('box-shadow', 'none');
            } else {
              navbar.css('box-shadow', '0px 10px 20px rgba(0, 0, 0, 0.4)'); 
            }
        });  
    });  
</script>

<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="assets/js/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="assets/js/flat.js"></script>
<script src="assets/js/jquery.Jcrop.js"></script>
<script src="assets/js/jcrop_bits.js"></script>

<!-- Begin emoji-picker JavaScript -->
<script src="assets/emoji_lib/js/nanoscroller.min.js"></script>
<script src="assets/emoji_lib/js/tether.min.js"></script>
<script src="assets/emoji_lib/js/config.js"></script>
<script src="assets/emoji_lib/js/util.js"></script>
<script src="assets/emoji_lib/js/jquery.emojiarea.js"></script>
<script src="assets/emoji_lib/js/emoji-picker.js"></script>
<!-- End emoji-picker JavaScript -->