<?php
require('check_login.php');
//echo "<p>{$_SESSION['username']}，你好！<a href='logout.php'>注销</a></p>"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户信息修改</title>
	<style>
		.biao{
			position: relative;
			left: 550px;
			font-size: 20px;
			font-weight: bold;
		}
		body{
			background-image: url(images/y_IMG_5779.jpg);
			background-size: 100%;
			color:white;
		}
		.user{
			margin-left: 20px;
		}
		.sex{
			margin-left: 40px;
		}
		.iphone{
			margin-left: 40px;
		}
		.update{
			font-size: 20px;
			margin-left: 110px;
			font-weight: bold;
		}
	</style>
</head>
<body>
	 <p class ="p1" style=" font-size: 25px; color: #fff6a1; text-align: center;"><?=$_SESSION['username']?>，你好！<a href='logout.php' style=" text-decoration: none; text-align: center; font-size: 22px; color:#fff6a1;">注销</a></p>

    <h3 style="text-align: center; font-size: 30px;margin-left: -120px">用户信息修改</h3>
    <?php
    $id=$_GET['id'];
    require('cn.php');
    
    $sql="select * from reader where rd_id='{$id}'";
    $rs=$pdo->query($sql);
    $result=$rs->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<script>alert("没找到用户");history.back();</script>';
        exit();
    }
    ?>
	<div class="biao">
    <form action="root_reader_update.php" method="post">
        <p>
            <label for="username">用户名</label>
            <input type="text" name="username" placeholder="用户名" value="<?=$result['rd_name']?>" class="user">
        </p>
        <p>
            <label for="sex">性别</label>
            <input type="text" name="sex" placeholder="性别"  value="<?=$result['rd_sex']?>" class="sex">
        </p>
        <p>
            <label for="phone">电话</label>
            <input type="text" name="phone" placeholder="电子邮箱"  value="<?=$result['rd_phone']?>" class="iphone">
        </p>
        <p>
            <label for="introduce">个人简介</label>
            <input type="text" name="introduce" value="<?=$result['rd_introduce']?>">
            <input type="hidden" name="id" value="<?=$result['rd_id']?>">
        </p>
			 <button type="submit" class="update">修改</button>
    </form>
	</div>
</body>
</html>