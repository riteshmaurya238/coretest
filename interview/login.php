<?php
session_start();

$err=array();
include("connection.php");
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	
	$pass=md5($_POST['password']);
	
	if(empty($err)){
	
	$qry = "SELECT * FROM student2 where email='$email' and password='md5($pass)'";
	$exe=mysqli_query($conn,$qry);
	$row=mysqli_num_rows($exe);
	// print_r($row);
	// exit();
	//echo $exe;
	$res=mysqli_fetch_assoc($exe);
	if($res){
		$_SESSION['uid']=$res['id'];

	}
	if($row>0){
		header ("location:dashboard.php");
	}

	
}
}
print_r($_POST);
?>



<html>
<head>
	<meta charset="utf-8">
	<title>login</title>
</head>
<body>
	<form action="" method="post" >
		<table border="1" align="center">
			<h2 align="center">LOGIN FORM</h2>
			
			<tr>
				<td>email</td><td><input type="text" name="email" placeholder="email" value="<?php if(isset($_POST['email'])){echo $email;}?>"></td>
			</tr>
			<tr>
				<td>password</td><td><input type="password" name="password" placeholder="passowrd"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="login">
					
				</td>
			</tr>
			<h4 style="color:blue;"><a href="ragister.php">Back to register</a></h4>
		</table>
	</form>
</body>
</html>