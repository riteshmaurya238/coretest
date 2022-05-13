<?php
include("connection.php");
$qry="select * from student";
$exe=mysqli_query($conn,$qry);


?>
<table align="center" border="1" >
	<h2 align="center" style="color:green ;">STUDENT ALL DETAILS</h2>
	<tr>
		<th>name</th>
		<th>email</th>
		<th>age</th>
		<th>gender</th>
		<th>course</th>
		<th>city</th>
		<th>photo</th>
		<th colspan="3">Action</th>
	</tr>


	<?php
$res=mysqli_fetch_assoc($exe);
	?>

	<tr>
		<td><?php if(isset($res['name'])){echo $res['name'];}?></td>
		<td><?php if(isset($res['email'])){echo $res['email'];}?></td>
		<td><?php if(isset($res['age'])){echo $res['age'];}?></td>
		<td><?php if(isset($res['gender'])){echo $res['gender'];}?></td>
		<td><?php if(isset($res['course'])){echo $res['course'];}?></td>
		<td><?php if(isset($res['city'])){echo $res['city'];}?></td>
		<td><img src="../image/<?php if(isset($res[photo])){echo $res['photo'];}?>"height="50px" width="50px"></td>
	</tr>


</table>