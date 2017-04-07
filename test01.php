<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <input type="file" id="file" name="" />
    <div id="image" style="width:390px;height:280px; background:#CCCCCC; float:left;">
        <img src="__PUBLIC__/images/tu.png" />
    </div>
</body>
<script>
document.getElementById('file').onchange = function() {
    var imgFile = this.files[0];
    var fr = new FileReader();
    fr.onload = function() {
        document.getElementById('image').getElementsByTagName('img')[0].src = fr.result;
    };
    fr.readAsDataURL(imgFile);
};
</script>

</html>