<?php

session_start();

include('../orm/orm.php');
include('../Controls/loginHandler.php');
$post=new orm($connect);
$title=$_POST['title'];
$writer=$_POST['writer'];
$post_type=$_POST['type'];
$description=$_POST['description'];
$file_name=$_POST['image'];
$who_posted=$_SESSION['user_id'];

$validator=new validate();
$validator->checkName($name);


$post->create($title,$writer,$post_type,$description,$who_posted,$file_name);

?>