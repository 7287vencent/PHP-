<!-- 小说的内容 -->
<?php
//防跳墙，需要在登录后的每个页面上包含
// require('check_login.php');
// echo "<p>{$_SESSION['username']}，你好！<a href='logout.php'>注销</a></p>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
	<style>
		a{
			position: relative;
			left: 620px;
			font-size: 25px;
		}
		body{
			background-color: #F6F1E7;
		}
	</style>
</head>
<body>
    <?php
        $id=$_GET['id'];
        $chapter=$_GET['chapter'];
      require('cn.php');
    $sql="select * from concent where cc_id='{$id}' and cc_chapter='{$chapter}'";  
    $rs=$pdo->query($sql);
    $result=$rs->fetch(PDO::FETCH_ASSOC);
    $str=$result['cc_concent'];
     $new_str=str_replace(PHP_EOL,' ' , $str);
    $new_s=str_replace('  ','<br>' , $str);
    ?>
    <h3 style="font-size: 35px;text-align: center"><?=$result['cc_name']?></h3>
	<a href="Inquire.php?id=<?=$result['cc_id']?>">目录</a>
    <h4 style="text-align: center;font-size: 20px"><?=$result['cc_chapter']?></h4>
    <p><?=$new_s?></p>
    <div>
        <a href="#top">返回顶部</a>
    </div>
</body>
</html>