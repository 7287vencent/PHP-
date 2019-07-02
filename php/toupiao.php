<?php 
    require('check_login.php');
    echo "<p>{$_SESSION['username']}，你好！<a href='logout.php'>注销</a></p>";
     $id=$_GET['id'];
    require('cn.php');
      $sql="update book set book_poll=book_poll+1 where book_id='{$id}'";
      if($pdo->exec($sql))
      {
          echo "小说投票成功！！！"; 
          echo $pdo -> lastinsertid(); 
          header('Location:Inquire.php?id='.$id);//带参数跳转页面
      }
?>