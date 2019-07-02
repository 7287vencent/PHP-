<?php
$id=$_GET['id'];
require('cn.php');
$sql="delete from author where au_id={$id}";
if ($pdo->exec($sql)) {
    $url='list.php';
    header('Location:'.$url);
}
?>