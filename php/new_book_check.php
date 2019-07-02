<?php
//防跳墙，需要在登录后的每个页面上包含
require('check_login.php');
echo "<p>{$_SESSION['username']}，你好！<a href='logout.php'>注销</a></p>"
?>
<?php 
    require('cn.php');
    $book_name=$_POST['book_name'];//名称
    $book_column=$_POST['book_column'];//leibie
    $book_intro=$_POST['intro'];//简介内容
    $author_id=$_SESSION['username'];//作者id
    $fileinfo = $_FILES['image'];
    $url="images/{$fileinfo['name']}";//图片
   if(!empty($_FILES['image']['name']))
{       //判断是否有文件
           //将文件信息赋给变量$fileinfo  
    if($fileinfo['size']<1000000 && $fileinfo['size']>0)
    {    //判断文件大小 
        if(move_uploaded_file($fileinfo['tmp_name'],$url))
        {
           // echo "上传成功"; 
        }  //上传文件
        else
        {
            // echo "上传失败";
        }     
    }else{
        echo '文件太大或未知';
    }
$sql="select * from book where book_name='{$book_name}'";
$rs=$pdo->query($sql);
$result=$rs->fetch(PDO::FETCH_ASSOC);
    if($result)
    {
      echo "对不起，这本小说已经存在";  
    }
    else
    {
       $sql=" insert into book (book_name,book_author_id,book_content,book_column,book_images) values ('$book_name','$author_id','$book_intro','$book_column','$url')";
       if($pdo -> exec($sql)){ 
         echo "小说成功！"; 
        echo $pdo -> lastinsertid(); 
        header('Location:author_index.php');
        }
    }
}
 ?>