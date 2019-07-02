<!-- 评论的php代码 -->
<?php 
require('check_login.php');
echo "<p>{$_SESSION['username']}，你好！<a href='logout.php'>注销</a></p>";
    echo "评论区域";
    $book_id=$_POST['id'];
    echo $book_id;
    $content=$_POST['content'];
    $name=$_SESSION['username'];
      require('cn.php');
      $sql="insert into messagebook(mb_content,mb_book_id,mb_reader_name) values('{$content}','{$book_id}','{$name}')";
      if($pdo->exec($sql))
      {
          echo "留言成功!!!"; 
          echo $pdo -> lastinsertid();
           header('Location:Inquire.php?id='.$book_id);
      }
 ?>