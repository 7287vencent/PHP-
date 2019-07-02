<?php
require('check_login.php');

header('Content-type:text/html;charset=utf-8');
$username=trim($_POST['username']);
$sex=trim($_POST['sex']);
$phone=trim($_POST['phone']);
$introduce=trim($_POST['introduce']);
$id=$_POST['id'];

require('cn.php');
$pdo->query('set names utf8');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

$sql="select * from author where au_name='{$username}' and au_id!={$id}";
$rs=$pdo->query($sql);
$result=$rs->fetch(PDO::FETCH_ASSOC);
if ($result) {
    echo '<script>alert("用户名已存在");history.back();</script>';
    exit();
}
$sql="update author set au_name='{$username}',au_sex='{$sex}',au_phone='{$phone}',au_introduce='{$introduce}' where au_id={$id}";
    if($pdo -> exec($sql)){ 
    echo "作者信息修改成功！"; 
    echo $pdo -> lastinsertid(); 
     header('Location:list.php');
    } else{
         echo "您没有修改数据！"; 
          header('Location:list.php');
    }


?>