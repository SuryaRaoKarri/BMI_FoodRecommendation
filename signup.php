<?php
include 'bootstrapheader.html';
?>
<head>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACfEfHmWBvJhO4c_yz5CdkJi-TDbRLXhg&libraries=places"></script>
 
</head>

<body>
<form action="insertsignupdetails.php" method="POST">
<div class="container">
<br><br>
<center><h2>Food Recommendation</h2></center>
<br>
<h3>Create Account</h3>
<hr><br>
<div class="row">
	<div class="col-sm-2">Username :</div>
	<div class="col-sm-2"><input type="text" name="username" required></div>
</div><br>
<div class="row">
	<div class="col-sm-2">Email</div>
	<div class="col-sm-2"><input type="email" name="email" required></div>
</div><br>
<div class="row">
	<div class="col-sm-2">Phone No :</div>
	<div class="col-sm-2"><input type="number" name="phonenumber" required></div>
</div><br>
<div class="row">
	<div class="col-sm-2">DOB :</div>
	<div class="col-sm-2"><input type="text" name="dob" required></div>
</div><br>
<div class="row">
	<div class="col-sm-2">Gender :</div>
	<div class="col-sm-4"><label><input type="radio" name="gender" value="male" checked>Male</label><label> <input type="radio" name="gender" value="female" style="margin-left: 10px;">Female</label></div>
</div><br>
<div class="row">
	<div class="col-sm-2">Weight :</div>
	<div class="col-sm-2"><input type="number" name="weight" placeholder="kgs" required></div>
</div><br>
<div class="row">
	<div class="col-sm-2">Height :</div>
	<div class="col-sm-2"><input type="number" name="height" placeholder="cm" required></div>
</div><br>
<div class="row">
	<div class="col-sm-2">Location</div>
	<div class="col-sm-2"><input type="text" name="location" id="location" required></div>
</div><br>
<div class="row">
	<div class="col-sm-2">Password :</div>
	<div class="col-sm-2"><input type="password" name="password" required></div>
</div><br>
<!--<div class="row">
	<div class="col-sm-2">Confirm Password:</div>
	<div class="col-sm-2"><input type="password" name="confirmpassword" required></div>
</div><br>-->

<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-3"><button class="btn btn-success" name="submit">Submit</button></div>
</div><br>

<br><hr>
</div>	
</div>
</form>
</body>
<script type="text/javascript">
	var loc = document.getElementById("location");
    var autocomplete = new google.maps.places.Autocomplete(loc);
    
</script>
</html>