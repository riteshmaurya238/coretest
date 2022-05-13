<?php
include("connection.php");
$r="";
$err=array();
if (isset($_POST['submit'])) {
	$n=$_POST['name'];
	if($n==""){
		$err[0]="<span style='color:red;'> please required name</span>";
	}
	$e=$_POST['email'];
	if($e==""){
		$err[1]="<span style='color:red;'> please required email</span>";
	}
	elseif (!filter_var($e,FILTER_VALIDATE_EMAIL)) {
		$err[2]="<span style='color:red;'> please invalid email format</span>";

		}
	$pass=$_POST['password'];
	if($pass==""){
		$err[8]="<span style='color:red;'> please required password</span>";
	}
	$cpass=$_POST['cpassword'];
	if($cpass==""){
		$err[9]="<span style='color:red;'> please enter conform password</span>";
	}
	if($cpass==$pass){
	$age=$_POST['age'];
	if($age==""){
		$err[3]="<span style='color:red;'> please required age</span>";
	}
	elseif($age>100){
		$err[12]="<span style='color:red;'> please  not allowed age greater than 100 </span>";
	}
	elseif ($age<0) {
		$err[13]="<span style='color:red;'> please  not allowed age less than 100</span>";
	}
	if(isset($_POST['gender'])){
		$gender=$_POST['gender'];
	}else{
		$gender="";
	}
	if($gender==""){
	$err[4]="<span style='color:red;'> please select gender</span>";
}
	if(isset($_POST['course'])){
  $course= implode(",",$_POST['course']);
  }
  else{
    $course="";
  }
	if($course==""){
		$err[5]="<span style='color:red;'> please select course</span>";
	}
	$city=$_POST['city'];
	if($city==""){
		$err[6]="<span style='color:red;'> please select city</span>";
	}
	$image=$_FILES['image']['name'];
	if($image==""){
		$err[7]="<span style='color:red;'> please required image</span>";
	}else{
	$image=$_FILES['image']['name'];
	$ln=($image);
	$expos=strpos($image, ".");
	$ext=substr($image, $expos+1);
	$type=array("jpeg","png","jpg");
	if(!in_array($ext, $type)){
		$err[14]="<span style='color:red;'> please allowe only jpg,png ,jpeg format.</span>";
	}

	$tmp=$_FILES['image']['tmp_name'];
	move_uploaded_file($tmp,"image/".$image);

	if(empty($err)){
		$q="select * from student where email='$e'";
		$ex=mysqli_query($conn,$q);
		$count=mysqli_num_rows($ex);
		if($count>0){
			$err[10]="<span style='color:red;'> please eamil already define</span>";
		}else{

	$qry="INSERT INTO `student`( `name`, `email`, `password`, `age`, `gender`, `course`, `city`, `photo`) VALUES ('$n','$e','".md5('$pass')."','$age','$gender','$course','$city','$image')";
	$exe=mysqli_query($conn,$qry);
	if($exe){
		$r="inserted successfully";
	}
}
}
	else{
		$r= "not inserted successfully";
	}

}
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
				<td>name</td><td><input type="text" name="name" placeholder="name" value="<?php if(isset($_POST['name'])){ echo $n;}?>"><?php if(isset($err[0])){echo $err[0];}?></td>
			</tr>
			<tr>
				<td>email</td><td><input type="text" name="email" placeholder="email"  value="<?php if(isset($_POST['email'])){ echo $e;}?>"><?php if(isset($err[1])){echo $err[1];}?> <?php if(isset($err[2])){echo $err[2];}?><?php if(isset($err[10])){echo $err[10];}?></td>
			</tr>
			<tr>
				<td>password</td><td><input type="password" name="password" placeholder="passowrd">
				<?php if(isset($err[8])){echo $err[8];}?>				</td>
			</tr>
			<tr>
				<td>conform passowrd</td><td><input type="password" name="cpassword" placeholder="conform password"><?php if(isset($err[9])){echo $err[9];}?></td>
			</tr>
			<tr>
				
				<td>age</td><td><input type="number" name="age" placeholder="age" value="<?php if(isset($_POST['age'])){ echo $age;}?>"><?php if(isset($err[3])){echo $err[3];}?><?php if(isset($err[12])){echo $err[12];}?><?php if(isset($err[13])){echo $err[13];}?></td>
			</tr>
			<tr>
				<td>gender</td><td><input type="radio" name="gender" placeholder="gender" value="male" <?php if(isset($_POST['gender'])&& $_POST['gender']=='male'){echo 'checked';}?>>male
									<input type="radio" name="gender" placeholder="gender" value="female"  <?php if(isset($_POST['gender'])&& $_POST['gender']=='female'){echo 'checked';}?>>female
								     <input type="radio" name="gender" placeholder="gender" value="other"  <?php if(isset($_POST['gender'])&& $_POST['gender']=='other'){echo 'checked';}?>>other
				<?php if(isset($err[4])){echo $err[4];}?></td>

			</tr>
			<tr>
				<td>course</td><td><input type="checkbox" name="course[]" value="mca" <?php if(isset($_POST['course']) && in_array('mca', $_POST['course']) ){echo 'checked'; } ?> >mca
									<input type="checkbox" name="course[]" value="bca" <?php if(isset($_POST['course']) && in_array('bca', $_POST['course']) ){echo 'checked'; } ?>>bca
								     <input type="checkbox" name="course[]" value="b.tech" <?php if(isset($_POST['course']) && in_array('b.tech', $_POST['course']) ){echo 'checked'; } ?>>b.tech
								     <?php if(isset($err[5])){echo $err[5];}?></td>
			</tr>
			<tr>
				<td>city</td><td><select name="city"><option value="">select</option>
													<option value="zirakpur"<?php if(isset($_POST['city'])&& $_POST['city']=='zirakpur'){echo 'selected';}?> >zirakpur</option>
													<option value="mohali"<?php if(isset($_POST['city'])&& $_POST['city']=='mohali'){echo 'selected';}?> >mohali</option>
													<option value="patna" <?php if(isset($_POST['city'])&& $_POST['city']=='patna'){echo 'selected';}?>>patna</option>
													<option value="delhi" <?php if(isset($_POST['city'])&& $_POST['city']=='delhi'){echo 'selected';}?>>delhi</option>
												</select> <?php if(isset($err[6])){echo $err[6];}?></td>
			</tr>
			<tr>
				<td>photo</td><td><input type="file" name="image" ><?php if(isset($err[7])){echo $err[7];}?><?php if(isset($err[14])){echo $err[14];}?> </td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="submit"><h4 style="color:green;"><?php echo $r;?></h4></td>
			</tr>
			<h4 style="color: blue;"><a href="login.php">login</a></h4>

		</table>
	</form>

</body>
</html>