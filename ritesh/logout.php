<?php
session_start();
include("connection.php");
if(!isset($_SESSION['uid'])){
header("location:login.php");
}
else{
	session_destroy();
	header("location:login.php");
}


?>