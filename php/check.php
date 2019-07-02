<!-- 登陆检测页面PHP -->
<?php 
     header("Content-type: text/html; charset=utf-8");
     $username=trim($_POST['username']);//用户名
    $pwd=trim($_POST['password']);//用户密码
    $identity=trim($_POST['identity']);//用户身份
    require('cn.php');
    
    //读者登陆检测
if($identity==1)
{
        $sql="select * from reader where rd_name='{$username}' and rd_password='{$pwd}'";
    $rs=$pdo->query($sql);
    $result=$rs->fetch(PDO::FETCH_ASSOC);
    if ($result) {
    echo '登录成功！欢迎读者，'.$result['rd_name'];
     session_start();
    $_SESSION['username']=$username;
    // $_SESSION['nickname']=$result['nickname'];
    header('Location:xuanhuan.php');
    }else{
     echo '<script>alert("用户名或密码错误");history.back()</script>';
        exit();
    }
}
else if($identity==2)
{
        //作者登陆检测
        $sql="select * from author where au_name='{$username}' and au_password='{$pwd}'";
    $rs=$pdo->query($sql);
    $result=$rs->fetch(PDO::FETCH_ASSOC);
    if ($result) {
    echo '登录成功！欢迎作者，'.$result['au_name'];
     session_start();
     $_SESSION['username']=$username;
    header('Location:author_index.php');
    }else{
     echo '<script>alert("用户名或密码错误");history.back()</script>';
        exit();
    }

}
 ?>