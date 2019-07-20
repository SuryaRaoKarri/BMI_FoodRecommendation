<?php
session_start();

if($_SESSION['username']=='user' && $_SESSION['email'] != ''){

include 'bootstrapheader.html';
include 'dbconnection.php';
include 'navbar.html';

$username = $_SESSION['email'];

$userinfo = "SELECT * from userinformation where email = '$username'";

$sqlusername = "SELECT * from usercredentials where email = '$username'";

$selectusername = mysqli_query($conn,$sqlusername);

$row1 = mysqli_fetch_assoc($selectusername);

?>
<head>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACfEfHmWBvJhO4c_yz5CdkJi-TDbRLXhg&libraries=places"></script>
 
</head>
<body class="container">
	<form action="personalinfoupdate.php" method="POST">
	<br><br>
<div class="row"><u><h3>User Information</h3></u></div>
<br><br>
<?php

$userinfo = mysqli_query($conn, $userinfo);

while($row = mysqli_fetch_assoc($userinfo)) {
	?>
	
	<div class="row">
		<div class="col-sm-2"> Name </div>
		<div class="col-sm-4"><input type="text" name="username" value="<?php echo $row1['username']; ?>"></div>
	</div>
	<br>


	<div class="row">
		<div class="col-sm-2"> Weight </div>
		<div class="col-sm-4"><input type="text" name="weight" value="<?php echo $row['weight']; ?>"></div>
	</div>
	
	<br>
	
	<div class="row">
		<div class="col-sm-2"> Location </div>
		<div class="col-sm-4"><input type="text" name="location" id="location" value="<?php echo $row['location']; ?>"> </div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-4"><button name="submit" class="btn btn-success" value="<?php echo $row['email']; ?>">Update</button></div>
	</div>
	
	<?php
}

mysqli_close($conn);
?>
	
</form>
</body>
<script type="text/javascript">
	var loc = document.getElementById("location");
    var autocomplete = new google.maps.places.Autocomplete(loc);
    
</script>

<?php
}

?>