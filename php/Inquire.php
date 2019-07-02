<!-- 小说的章节查询和读者留言 -->
<?php
//防跳墙，需要在登录后的每个页面上包含
require('check_login.php');
//echo "<p>{$_SESSION['username']}，你好！<a href='logout.php'>注销</a></p>";


      $id=$_GET['id'];
      // $name=$_GET['name'];
      // $au_name=$_GET['au_name'];
      // echo $id;
      // echo $name;
      // echo $au_name;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
	<style>
		body{
			background-image: url(images/y_IMG_5712.jpg);
			background-size: 100%;
		}
		
		li{
			list-style: none;
		}
		.imgs {
			float: left;
			position: relative;
			left: 50px;
			top:70px;
		}
		.introduce{
			width:500px;
			margin-left: 390px;
			height: 300px;
			color: #F6F1E7;
		}
		.content{
			padding-left: 50px;
			font-size: 23;
		}
		.toupiao{
			text-align: center;
		}
		}
		.
		h2{
			text-align: center;
		}
		.zhangjie{
			width: 800px;
		}
		.pinlun li{
			width: 230px;
			border-bottom: 3px black solid;
			color: #F6F1E7;
		}
		.pinlun li span{
			font-weight: bolder;
			color: sandybrown;
		}
		.bian{
			position:absolute;
			left: 1000px;
			bottom: 500px;
		}
		.hello{
			position: relative;
			left: -500px;
		}
		a{
			color: #F6F1E7;
		}
	</style>
</head>
<body>
	 <p class ="hello" style=" font-size: 25px; color: #fff6a1; text-align: center;"><?=$_SESSION['username']?>，你好！<a href='logout.php' style=" text-decoration: none; text-align: center; font-size: 22px; color:#fff6a1;">注销</a></p>

    <?php
      require('cn.php');
    ?>
    <?php
            $sql="select * from book where book_id='{$id}'";
            $rs=$pdo->query($sql);
            $result=$rs->fetch(PDO::FETCH_ASSOC);
        ?>  
    <div class="content">
		<div class="imgs">
			<img src="<?=$result['book_images']?>" alt="<?=$result['book_name']?>">
		</div>
		<div class="introduce">
			<p style="text-align: center;font-weight: boldr;color: white;font-size: 20px">作者:<?=$result['book_author_id']?></p> 
        	<p style="font-size: 20px"><span style="font-weight: bolder">小说简介:</span><?=$result['book_content']?></p>
		</div>
		<div class="bian">
			<a href="xuanhuan.php"><p class="fanhui">返回首页</p></a>
    		<a href="toupiao.php?id=<?=$id?>" class="toupiao1">给小说投票</a>
		</div>
		<p class="toupiao" style="font-size: 30px;padding-top: 30px;font-weight: bolder">获得的投票:<?=$result['book_poll']?></p>
    <script>
    </script>
    <!-- 小说的目录开始 -->
    <div class="zhangjie">
        <?php
            $sql="select * from concent where cc_id='{$id}'";
        ?>
        <?php foreach ($pdo->query($sql) as $value) {?>
            <ul>
                <li>
                    <?php
            $query = array(
             'id' => $value['cc_id'],
            'chapter' => $value['cc_chapter']
                );
$url = 'read_concent.php?' . http_build_query($query); // 这样可以自动转义url不允许的字符
?>
<a href="<?php echo $url; ?>"><?=$value['cc_chapter']?></a>
                </li>
            </ul>
        <?php } ?>
    </div><!-- 小说的目录结束 -->
<!--     读者的留言 -->
<h2>读者评论</h2>
    <div class="pinlun">
        <?php
            $sql="select * from messagebook where mb_book_id='{$id}'";
        ?>
        <?php  foreach ($pdo->query($sql) as $value) {?>
            <div class="xiahuaxian">
                    <li>
                        <span><?=$value['mb_reader_name']?></span>
                        <p><?=$value['mb_content']?></p>
                    </li>
            </div>
        <?php } ?>
			<div class="fabiao">
				<form action="pinglun.php" method="post" >
            		<textarea name="content" placeholder="这本小说让你喜欢的理由" rows="10" cols="30"></textarea>
				 	<input type="submit" value="发表" style="font-size: 20px;color: black;font-weight: bolder">
                    <input type="hidden" name="id" value="<?=$id?>">
				</form>
			</div>
    </div>
   </div>
</body>
</html>