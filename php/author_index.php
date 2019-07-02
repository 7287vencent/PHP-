<!-- 作者登陆后的界面 -->
<?php
//防跳墙，需要在登录后的每个页面上包含
require('check_login.php');
// echo "<p>{$_SESSION['username']}，你好！<a href='logout.php'>注销</a></p>"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  type="text/css" href="author_index.css">
    <title>作者功能页面</title>
</head>
<body>
     <p class ="p1" style=" font-size: 25px; color: #fff; text-align: center;"><?=$_SESSION['username']?>，你好！<a href='logout.php' style=" text-decoration: none; text-align: center; font-size: 22px; color:#fff;">注销</a></p>
    <?php
        require('cn.php');
        $username=$_SESSION['username'];
    $sql="select * from book where book_author_id='{$username}'";
    $rs=$pdo->query($sql);
   $result=$rs->fetch(PDO::FETCH_ASSOC);
    ?> 
    <div class="content">
        <h3>小说章节查询</h3>
        <?php if($result){?>
            <ul>
        <?php foreach ($pdo->query($sql) as $value) {?>
            <li>
                
            <a href="Inquire.php?id=<?=$value['book_id']?>"><img src="<?=$value['book_images']?>" alt="$value['book_name']">
                <?=$value['book_name']?></a>
            </li>   
        <?php } ?>
    </ul>
    <?php }else {?>
            <p>您没有上传过小说!!!!</p>
    <?php }?>       
    </div>
<div class="caozuo">
    <a  href="author_new_book.php">我要写新小说</a>
    <a  href="geng.php" >我要更新小说</a>
</div>  
    

    <div class="liuyan">  
        <h2>读者的留言查看</h2>
        <?php 
            $name=$_SESSION['username'];
            $sql="select book_id from book where book_author_id='$name'";?>
            <?php  foreach ($pdo->query($sql) as  $value) {
                    $sql="select * from messagebook where mb_book_id={$value['book_id']}";
                
                        foreach ($pdo->query($sql) as  $valu) {
                ?>
                    <p>读者:<?=$valu['mb_reader_name']?></p>
                    <p class="p1">内容:<?=$valu['mb_content']?></p>
                <?php  } ?> 
          <?php  } ?> 
            
        
    </div>
</body>
</html>