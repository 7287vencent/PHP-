<!-- 注册信息检测PHP -->
<?php 
 header("Content-type: text/html; charset=utf-8");
$username=trim($_POST['username']);//用户名
$pwd=trim($_POST['pwd']);//用户密码
$sex=trim($_POST['sex']);//用户性别
$idtype=trim($_POST['idtype']);//用户身份
$phone=trim($_POST['phone']);//用户电话
$intro=trim($_POST['intro']);//用户介绍
require('cn.php');
if($idtype=="author")
{

    $sql="select * from author where au_name='{$username}'";
    $rs=$pdo->query($sql);
    $result=$rs->fetch(PDO::FETCH_ASSOC);

    if ($result) {
    echo '<script>alert("用户名已存在");history.back();</script>';
    exit();
    }

    $sql="insert into author (au_name,au_password,au_sex,au_phone,au_introduce) values ('{$username}','{$pwd}','{$sex}','{$phone}','{$intro}')";

    if($pdo -> exec($sql)){ 
    echo "作者信息注册成功！"; 
    echo $pdo -> lastinsertid(); 
    } 

}else if($idtype=="reader"){
    
     $sql="select * from reader where rd_name='{$username}'";
    $rs=$pdo->query($sql);
    $result=$rs->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
    echo '<script>alert("用户名已存在");history.back();</script>';
    exit();
    }
    
    $sql="insert into reader (rd_name,rd_password,rd_sex,rd_phone,rd_introduce) values ('{$username}','{$pwd}','{$sex}','{$phone}','{$intro}')";

    if($pdo -> exec($sql)){ 
    echo "读者信息注册成功"; 
    echo $pdo -> lastinsertid(); 
    header('Location:login.html?');
    } 
}

 ?>