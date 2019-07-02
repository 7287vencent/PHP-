<!-- 登陆检测PHP -->
<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location:login.html');
    }
?>