<?php 
//防跳墙，需要在登录后的每个页面上包含
require('check_login.php');
echo "<p>{$_SESSION['username']}，你好！<a href='logout.php'>注销</a></p>";
header("Content-type: text/html; charset=utf-8");
$name=trim($_POST['book_name']);//书名
$chapter=trim($_POST['book_chapter']);//章节
$concent=trim($_POST['book_concent']);//内容
// $id=1;//小说id
$auname=$_SESSION['username'];
require('cn.php');
    $sql="select * from book where book_author_id='{$auname}' and book_name='{$name}'";
     $rs=$pdo->query($sql);
    $result=$rs->fetch(PDO::FETCH_ASSOC);
     if (!$result) {
        echo '<script>alert("您没有写这本书");history.back()</script>';
        exit();
      }
    $id=$result['book_id'];
    echo $id;
    $sql="insert into concent (cc_id,cc_name,cc_author,cc_chapter,cc_concent)
    values('$id','$name','$auname','$chapter','$concent')";
     if($pdo -> exec($sql)){ 
    echo "小说章节更新成功！"; 
    echo $pdo -> lastinsertid(); 
    header('Location:author_index.php');
    } 
 ?>