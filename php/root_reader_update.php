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

$sql="select * from reader where rd_name='{$username}' and rd_id!={$id}";
$rs=$pdo->query($sql);
$result=$rs->fetch(PDO::FETCH_ASSOC);
if ($result) {
    echo '<script>alert("用户名已存在");history.back();</script>';
    exit();
}
$sql="update reader set rd_name='{$username}',rd_sex='{$sex}',rd_phone='{$phone}',rd_introduce='{$introduce}' where rd_id={$id}";
    if($pdo -> exec($sql)){ 
    echo "读者信息修改成功！"; 
    echo $pdo -> lastinsertid(); 
     header('Location:list.php');
    } 
    else{
         echo "您没有修改数据！"; 
          header('Location:list.php');
    }


?>