<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<?php 
include 'bootstrapheader.html';
?>
<body class="container">
<form action="loginp.php" method="POST">
<br><br>
<center><h2>Food Recommendation</h2></center>
<br><hr><br>
<div class="row">
	<div class="col-sm-2">Username :</div>
	<div class="col-sm-4"><input type="text" name="username" required></div>
</div>
<br>
<div class="row">
	<div class="col-sm-2">Password :</div>
	<div class="col-sm-4"><input type="password" name="password" required></div>
</div>
<br>
<div class="row">
<div class="col-sm-3"></div><button class="btn btn-success" name="submit" style="margin-left: 20px;" >Login</button></div>	
</div>
<br>
<div class="row">
<div class="col-sm-3"></div><u><a href='signup.php'>Create Account</a></u>	
</div>
<br><hr>
</form>
</body>
</html>