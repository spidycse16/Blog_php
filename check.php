<?php
include('connection.php');
$instance=DatabaseConnection::getInstance("localhost","root","","php");
$connect=$instance->getConnection();
//echo "$connect";
?>