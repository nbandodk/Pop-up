<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title></title>
</head>
<style>

#textarea {
    -moz-appearance: textfield-multiline;
    -webkit-appearance: textarea;
    border: 1px solid gray;
    font: medium -moz-fixed;
    font: -webkit-small-control;
    height: 28px;
    overflow: auto;
    padding: 2px;
    resize: both;
    width: 400px;
}

</style>
<body>

<input class="file" type='file' id="imgSel" />

<div id="textarea" contenteditable>

  <img contenteditable="false" style="width:45px" id="myimg" />
  I look like a textarea

</div>

<script type="text/javascript">

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('myimg').setAttribute('src',e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    document.getElementById('imgSel').onchange = function () { //set up a common class
        readURL(this);
    };


</script>

</body>

</html>