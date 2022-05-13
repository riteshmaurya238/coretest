<?php
include("connection.php");
$r="";
$err=array();
if (isset($_POST['submit'])) {
	$n=$_POST['name'];
	
	$e=$_POST['email'];
	
	
	$pass=$_POST['password'];
	
	$cpass=$_POST['cpassword'];
	
	if($cpass==$pass){
	$age=$_POST['age'];
	
	if(isset($_POST['gender'])){
		$gender=$_POST['gender'];
	}else{
		$gender="";
	}
	
	if(isset($_POST['course'])){
  $course= implode(",",$_POST['course']);
  }
  else{
    $course="";
  }
	
	$city=$_POST['city'];
	
	$image=$_FILES['image']['name'];
	
	

	$tmp=$_FILES['image']['tmp_name'];
	move_uploaded_file($tmp,"image/".$image);

	
}
	$qry="INSERT INTO `student2`( `name`, `email`, `password`, `age`, `gender`, `course`, `city`, `photo`) VALUES ('$n','$e','".md5('$pass')."','$age','$gender','$course','$city','$image')";
	$exe=mysqli_query($conn,$qry);
	if($exe){
		echo "inserted successfully";
	}


	else{
		$r= "not inserted successfully";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ragister</title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<table border="1" align="center">
			<h2 align="center">REGISTER FORM</h2>
			<tr>
				<td>name</td><td><input type="text" name="name" placeholder="name" value="<?php if(isset($_POST['name'])){ echo $n;}?>"></td>
			</tr>
			<tr>
				<td>email</td><td><input type="text" name="email" placeholder="email"  value="<?php if(isset($_POST['email'])){ echo $e;}?>"></td>
			</tr>
			<tr>
				<td>password</td><td><input type="password" name="password" placeholder="passowrd">
							</td>
			</tr>
			<tr>
				<td>conform passowrd</td><td><input type="password" name="cpassword" placeholder="conform password"></td>
			</tr>
			<tr>
				
				<td>age</td><td><input type="number" name="age" placeholder="age" value="<?php if(isset($_POST['age'])){ echo $age;}?>"></td>
			</tr>
			<tr>
				<td>gender</td><td><input type="radio" name="gender" placeholder="gender" value="male" <?php if(isset($_POST['gender'])&& $_POST['gender']=='male'){echo 'checked';}?>>male
									<input type="radio" name="gender" placeholder="gender" value="female"  <?php if(isset($_POST['gender'])&& $_POST['gender']=='female'){echo 'checked';}?>>female
								     <input type="radio" name="gender" placeholder="gender" value="other"  <?php if(isset($_POST['gender'])&& $_POST['gender']=='other'){echo 'checked';}?>>other
			</td>

			</tr>
			<tr>
				<td>course</td><td><input type="checkbox" name="course[]" value="mca" <?php if(isset($_POST['course']) && in_array('mca', $_POST['course']) ){echo 'checked'; } ?> >mca
									<input type="checkbox" name="course[]" value="bca" <?php if(isset($_POST['course']) && in_array('bca', $_POST['course']) ){echo 'checked'; } ?>>bca
								     <input type="checkbox" name="course[]" value="b.tech" <?php if(isset($_POST['course']) && in_array('b.tech', $_POST['course']) ){echo 'checked'; } ?>>b.tech
								     </td>
			</tr>
			<tr>
				<td>city</td><td><select name="city"><option value="">select</option>
													<option value="zirakpur"<?php if(isset($_POST['city'])&& $_POST['city']=='zirakpur'){echo 'selected';}?> >zirakpur</option>
													<option value="mohali"<?php if(isset($_POST['city'])&& $_POST['city']=='mohali'){echo 'selected';}?> >mohali</option>
													<option value="patna" <?php if(isset($_POST['city'])&& $_POST['city']=='patna'){echo 'selected';}?>>patna</option>
													<option value="delhi" <?php if(isset($_POST['city'])&& $_POST['city']=='delhi'){echo 'selected';}?>>delhi</option>
												</select> </td>
			</tr>
			<tr>
				<td>photo</td><td><input type="file" name="image" > </td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="submit"><h4 style="color:green;"><?php echo $r;?></h4></td>
			</tr>
			<h4 style="color: blue;"><a href="login.php">login</a></h4>

		</table>
	</form>

</body>
</html>