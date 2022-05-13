<?php
session_start();
include("connection.php");
if(!isset($_SESSION['uid'])){
header("location:login.php");
}
else{
$qry="delete from  student where id=".$_GET['id'];
$exe=mysqli_query($conn,$qry);
if($exe){
	$message="are you delete";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script>window.location='dashboard.php';</script>";
	
}else{
	echo "not delete ";
}

}


?>