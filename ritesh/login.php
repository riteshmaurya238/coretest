<?php
session_start();

$err=array();
include("connection.php");
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	if($email==""){
		$err[0]="<span style='color:red;'> please enter email</span>";
	}
	$pass=md5($_POST['password']);
	if($pass==""){
		$err[1]="<span style='color:red;'> please enter password</span>";
	}
	if(empty($err)){
	//$qry="select email,password from student where email='$email' and password='".md5('$pass')."'";
	//echo $qry="SELECT * FROM student where email='$email' and password='md5($pass)'";
	$qry = "SELECT * FROM student where email='$email' and password='md5($pass)'";
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

	else{
		$err[2]="<span style='color:red;'> please invalid email or password</span>";
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
				<td>email</td><td><input type="text" name="email" placeholder="email" value="<?php if(isset($_POST['email'])){echo $email;}?>"><?php if(isset($err[0])){
					echo $err[0];
				}?></td>
			</tr>
			<tr>
				<td>password</td><td><input type="password" name="password" placeholder="passowrd"><?php if(isset($err[1])){
					echo $err[1];
				}?></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="login">
					<?php if(isset($err[2])){
					echo $err[2];
				}?>
				</td>
			</tr>
			<h4 style="color:blue;"><a href="ragister.php">Back to register</a></h4>
		</table>
	</form>
</body>
</html>