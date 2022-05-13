<?php
session_start();
	if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
	else{
		echo "<script>alert('Verification code match !');</script>" ;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Elegant Account Login Form with Avatar Icon</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="login-form">    
    <form action="" method="post">
		<div class="avatar"><i class="material-icons"></i></div>
    	<h4 class="modal-title">Login to Your Account</h4>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="text" name="vercode" class="form-control" placeholder="Verfication Code" required="required">
        </div>
        <div class="form-group small clearfix">
            <label class="checkbox-inline">Verification Code</label>
              <img src="captcha.php" >
        </div> 
        <input type="submit" class="btn btn-primary btn-block btn-lg" value="Login">              
    </form>			
</div>
</body>
</html>