<?php
session_start();
$u="";

include("connection.php");
if(!isset($_SESSION['uid'])){
	header("location:login.php");
}
else{

	$qry="select * from student where id=".$_GET['id'];
$data=mysqli_query($conn,$qry);
$res=mysqli_fetch_assoc($data);

//print_r($res);

$err=array();



if (isset($_POST['submit'])) {

	$n=$_POST['name'];
	
	$e=$_POST['email'];
	
	

	$age=$_POST['age'];
	
	if(isset($_POST['gender'])){
		$gender=$_POST['gender'];
	}else{
		$gender="";
	}
	
	if(isset($_POST['course'])){
		$course=implode(",", $_POST['course']);
	}else{
	
	$city=$_POST['city'];
	

	$image=$_FILES['image']['name'];

	$tmp=$_FILES['image']['tmp_name'];
	move_uploaded_file($tmp,"image/".$image);
	
	$qry="UPDATE `student2` SET `name`='$n',`email`='$e',`age`='$age',`gender`='$gender',`course`='$course',`city`='$city',`photo`='$image' WHERE id=".$_GET['id'];
	$exe=mysqli_query($conn,$qry);
	if($exe){
		$u="updated successfully";
	}

//}
}
	

	else{
		 $u="not updated successfully";
	}

}
}


$query="select * from student2 where id=".$_GET['id'];
$run=mysqli_query($conn,$query);
$result=mysqli_fetch_assoc($run);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>UPDATE</title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<table border="1" align="center">
			<h2 align="center">EDIT FORM</h2>
			<tr>
				<td>name</td><td><input type="text" name="name" placeholder="name" value="<?php if(isset($result['name'])){echo $result['name'];}?>"></td>
			</tr>
			<tr>
				<td>email</td><td><input type="text" name="email" placeholder="email" value="<?php if(isset($result['email'])){echo $result['email'];}?>"></td>
			</tr>
			
			<tr>
				<td>age</td><td><input type="text" name="age" placeholder="age" value="<?php if(isset($result['age'])){echo $result['age'];}?>"></td>
			</tr>
			<tr>
				<td>gender</td><td><input type="radio" name="gender" placeholder="gender" value="male" <?php if(isset($result['gender'])&& $result['gender']=='male'){echo 'checked';}?>>male
									<input type="radio" name="gender" placeholder="gender" value="female" <?php if(isset($result['gender'])&& $result['gender']=='female'){echo 'checked';}?>>female
								     <input type="radio" name="gender" placeholder="gender" value="other" <?php if(isset($result['gender'])&& $result['gender']=='other'){echo 'checked';}?>>other</td>
			</tr>
			<tr>
				<td>course</td><td><input type="checkbox" name="course[]" value="mca" <?php if(isset($result['course']) &&  $result['course']=='mca'){echo 'checked'; }?>>mca
									<input type="checkbox" name="course[]" value="bca" <?php if(isset($result['course']) &&  $result['course']=='bca'){echo 'checked'; }?>>bca
								     <input type="checkbox" name="course[]" value="b.tech"<?php if(isset($result['course']) &&  $result['course']=='b.tech'){echo 'checked'; }?>>b.tech</td>
			</tr>
			<tr>
				<td>city</td><td><select name="city"><option value="">select</option>
													<option value="zirakpur" <?phpif(isset($result['city'])&& $result['city']=='zirakpur'){ echo 'selected';}?>>zirakpur</option>
													<option value="mohali" <?php if(isset($result['city'])&& $result['city']=='mohali'){ echo 'selected';}?>>mohali</option>
													<option value="patna" <?php if(isset($result['city'])&& $result['city']=='patna'){ echo 'selected';}?>>patna</option>
													<option value="delhi" <?php if(isset($result['city'])&& $result['city']=='delhi'){ echo 'selected';}?>>delhi</option>
												</select></td>
			</tr>
			<tr>
				<td>photo</td><td><input type="file" name="image" ><input type="hidden" name="oldimage" value="<?php echo $res['photo'];?>"></td>
				<td><img src="image/<?php if(isset($result['photo'])){echo $result['photo'];}?>"height="50px" width="50px"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Update">
					<h4 style='color: green;'><?php echo $u;?></h4>
				</td>
			</tr>
			<h3><a href="dashboard.php">Back to Dashboard</a></h3>

		</table>
	
	</form>

</body>
</html>