<?php
include('../orm/orm.php');
session_start();
$post_id=$_POST['post_id'];
$deletor=new Post($connect);
$deletor->delete($post_id);
?>