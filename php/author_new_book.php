<?php
//防跳墙，需要在登录后的每个页面上包含
require('check_login.php');
// echo "<p>{$_SESSION['username']}，你好！<a href='logout.php'>注销</a></p>"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <link rel="stylesheet" href="author_new_book.css">
    <title>新小说界面</title>
</head>
<body>
    <p class ="p1" style=" font-size: 25px; color: #fff; text-align: center;"><?=$_SESSION['username']?>，你好！<a href='logout.php' style=" text-decoration: none;text-align: center;font-size: 22px;color:#fff;">注销</a></p>
    <div class="div3">
    <form action="new_book_check.php" method="post" enctype="multipart/form-data" class="form1" onsubmit=" return check()" name="form1">
        <p>
            <label for="book_name">小说名称</label>
            <input type="text" name="book_name" >
        </p>
        <p type="p2">
            <label for="book_column" type="lb2">小说类别</label>
             <select name="book_column" id="book_column">
                <option value="玄幻">玄幻</option>
                <option value="都市">都市</option>
                <option value="奇幻">奇幻</option>
            </select>
        </p>
        <p type="p3">
            <label for="intro" >小说简介</label>
            <textarea name="intro" id="intro" cols="30" rows="10"></textarea>
        </p>
        <p type="p4">
            <label for="image" type="lb3">小说图片</label>
              <input type="file" name="image">
        </p>
        <input type="submit" value="提交">
    </form>
</div>
    <script>
        function check(){
            var name=form1.book_name.value;
            var intro=form1.intro.value;
            var image=form1.image;
            if(name.length==0)
            {
                alert("小说的名称不能为空!!!");
                 return false;
            }
            if(intro.length==0)
            {
                alert("小说的名称简介为空!!!");
                 return false;
            }
            if(image.value=="")
            {
                alert("小说的图片为空!!!");
                 return false;
            }

            return true;
        }

    </script>
</body>
</html>