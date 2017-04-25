<!DOCTYPE HTML>
<head>
<title>数据</title>
<meta characterset="utf-8" />
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.2.min.js" ></script>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="javascript:void(0)" id="a1" onclick="chcolor(1)">首页</a></li>
            <li><a href="javascript:void(0)" id="a2" onclick="chcolor(2)">添加</a></li>
            <li><a href="javascript:void(0)" id="a3" onclick="chcolor(3)">管理</a></li>
            <li><a href="javascript:void(0)" id="a4" onclick="chcolor(4)">操作</a></li>
            </ul>
    <nav>
</header>
</body>
<script type="text/javascript">
    function chcolor(ids)
    {
        for(var i=1;i<5;i++)
        {
            $("#a"+i).css({"color":"#000","font-size":"14px","background-color":"#fff"});
        }
        $("#a"+ids).css({"color":"red","font-size":"20px","background-color":"#333"});
    }
</script>
</html>


//---------------------------------------
                $outputStr = "";
                $friend = new user($this->con, $friend_id);
                //output the data from result set
                while ($row = mysqli_fetch_array($data)) {
                    $outputStr .= "
                        <div class='well' value='".$row['id']."'>
                            <a href='#' class='close'
                                data-dismiss='alert'
                                aria-label='close'><i class='fa fa-window-close'aria-hidden='true'></i></a>
                            <img src='".$this->user_obj->getProfile_pic()."' class='img-circle' height='55' width='55'>
                            <br>
                            ".$this->user_obj->getUsername()."
                            <p>".$this->getTime($row['date'])."</p>
                            <br>
                            <p>".$row['text']."</p>
                            <br>
                            <div>
                                <button class='btn btn-default btn-sm'>
                                    <i class='fa fa-thumbs-up' aria-hidden='true'></i>
                                    Likes (".$row['likes'].")
                                </button>
                    ";
                    //--------------add likes-----------------
                    $like_obj = new like($this->con);
                    $likeResultSet= $like_obj->selectLikes($row['id']);
                    while ($like = mysqli_fetch_array($likeResultSet))
                    {
                        $outputStr .="
                            <a href='#'>
                                <img src='".$like['profile_pic']."' class='img-circle' height='25' width='25'>
                                <input type='hidden' value='".$like['username']."'>
                            </a>
                        ";
                    }
                    //---------------------------------------
                        $outputStr .="
                                </div>
                                <div class='comment'>
                                <form>
                                    <input type='text' class='verify_input' placeholder='comment here...' required>
 
                                    <button type='submit' class='btn btn-danger verify_btn' style='display:inline-block'>Reply</button>
                                </form>";
                    //--------------add comments--------------
                    $comment_obj = new comment($this->con,$this->id);
                    $outputStr .= $comment_obj->selectComments($row['id']);

                    //----------------------------------------
                    $outputStr .="
                            </div>
                        </div>
                    ";
                }
                $outputStr .= "
                    <input type='hidden' class='nextPage' value='".($pageNum + 1)."'>
                    <input type='hidden' class='noMorePosts' value='false'>
                    ";
                return $outputStr;