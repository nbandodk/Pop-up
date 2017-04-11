<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title></title>
</head>
<body>
<?php 
    require 'config/config.php';
    require 'includes/service/search.php';
    //$query = "SELECT * FROM users WHERE (id in (SELECT friend_id FROM user_friend WHERE user_id='3' AND block='no') OR id='3') AND username LIKE 'n%' AND user_closed = 'no' ";
    // $search_result = new search($con,3);
    // echo $search_result->filteredSearch(1, "n", 29, "male", "a", "a", "in", "us");

    //search friend
    // $friendResultSet = mysqli_query($con, $query); 
    // while ($row = mysqli_fetch_array($friendResultSet)){
    //     echo $row['id']." ";
    // }
    echo strpos("mmwww.youtube.com/watch?v=ss", "www.youtube.com/watch?v=")    
?>

</body>

</html>