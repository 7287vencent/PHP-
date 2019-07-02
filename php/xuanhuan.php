<!-- 玄幻类的小说界面 -->

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="xuanhuan.css">
<title>玄幻类频道</title>
</head>
<body>
	<div class="div1">
		<?php
 	session_start();
		if(isset($_SESSION['username']))
		{ ?>		
				<p class ="p1" style=" font-size: 25px; color: #fff; text-align: center;"><?=$_SESSION['username']?>，你好！<a href='logout.php' style=" text-decoration: none;text-align: center;font-size: 22px;color:#fff;">注销</a></p>		
	<?php	} else{ ?>
				<a href="login.html" style=" text-decoration: none;text-align: center;font-size: 22px;color:#fff; ">登陆</a>
		<?php } ?>
	</div>
	<div>
		<div class="header"><h1>心欣小说网</h1></div>
		
				<h1>本周强推</h1>
				<h1>玄幻类</h1>
		<div>
<!-- 玄幻类小说 -->
			<?php
				require('cn.php');
				$column='玄幻';
				
				$sql="select * from book where book_column='{$column}'"; ?>
				<ul>
				<?php foreach ($pdo->query($sql)as $value) {?>
					<li><a href="Inquire.php?id=<?=$value['book_id']?>"><img src="<?=$value['book_images']?>" ><p><?=$value['book_name']?></p></a></a></li>
				<?php } ?>	
			</ul>
		</div>
<!-- 都市类小说 -->
			<h1>都市类</h1>
		<div>
			<?php
				$column='都市';
			
				$sql="select * from book where book_column='{$column}'"; ?>
			<ul>
				<?php foreach ($pdo->query($sql)as $value) {?>
					<li><a href="Inquire.php?id=<?=$value['book_id']?>"><img src="<?=$value['book_images']?>" ><p><?=$value['book_name']?></p></a></a></li>
				<?php } ?>
				</ul>	
		</div>
<!-- 奇幻类小说 -->
<h1>奇幻类</h1>
		<div>
			<?php
				$column='奇幻';
			
				$sql="select * from book where book_column='{$column}'"; ?>
			<ul>
				<?php foreach ($pdo->query($sql)as $value) {?>
					<li><a href="Inquire.php?id=<?=$value['book_id']?>"><img src="<?=$value['book_images']?>" ><p><?=$value['book_name']?></p></a></a></li>
				<?php } ?>
				</ul>
		</div>
	</div>
</body>
</html>
