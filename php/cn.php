<!-- 链接数据库的php -->
<?php
    //建立数据库连接
    try{
        $dsn='mysql:host=localhost;dbname=novel';
        $pdo=new PDO($dsn, 'root', '');
        //设置字符集为utf8
        $pdo->query('set names utf8');
        //设置PDO错误警告模式，用于调试
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }catch( PDOException $e){
        echo "error:". $e->getMessage() . '<br>';
        exit();
    }
?>