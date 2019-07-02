<?php
$id=$_GET['id'];
require('cn.php');
$sql="delete from reader where rd_id={$id}";
if ($pdo->exec($sql)) {
    $url='list.php';
    header('Location:'.$url);
}
?>