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