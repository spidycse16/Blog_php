<?php
include('../orm/orm.php');
session_start();
$post_id=$_POST['post_id'];
$deletor=new orm($connect);
$deletor->delete($post_id);
?>