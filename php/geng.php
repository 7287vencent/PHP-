<?php
//防跳墙，需要在登录后的每个页面上包含
require('check_login.php');
// echo "<p>{$_SESSION['username']}，你好！<a href='logout.php'>注销</a></p>"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>作者更新</title>
	<style>
		p{
			text-align: center;
			font-size: 25px;
		}
		body{
			/*background-color: burlywood;*/
    background-image: url("images/y_IMG_5735.jpg")  ;
    background-size: 100%;
    background-repeat:no_repeat;
		}
        form
        {
            color: #ffffff;
        }
	</style>
</head>
<body>
    <p class ="p1" style=" font-size: 25px; color: #ffffff; text-align: center;"><?=$_SESSION['username']?>，你好！<a href='logout.php' style=" text-decoration: none;text-align: center;font-size: 22px;color:#ffffff;">注销</a></p>
    <form action="genxin.php" method="post" onsubmit="return check()" name="form1">
            <p>
                <label for="">小说名称</label>
                <input type="text" name="book_name">
            </p>
            <p>
                <label for="">小说章节</label>
                <input type="text" name="book_chapter">
            </p>
			<p><label for="">小说更新内容</label></p>
            <p>
                <textarea name="book_concent" cols="150" rows="10"></textarea>
            </p>
            <p><input type="submit" value="确认" style="font-size: 25px"></p>
    </form>
        <script>
        function check(){
            var name=form1.book_name.value;
            var book_chapter=form1.book_chapter.value;
            var book_concent=form1.book_concent.value;
            if(name.length==0)
            {
                alert("小说的名称不能为空!!!");
                 return false;
            }
            if(book_chapter.length==0)
            {
                alert("小说的章节为空!!!");
                 return false;
            }
            if(book_concent.length==0)
            {
                alert("小说的内容为空!!!");
                 return false;
            }
            return true;
        }

    </script>
</body>
</html>