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
<body class="container">
	<form action="personalinfoedit.php" method="POST">
	<br><br>
<div class="row"><u><h3>User Information</h3></u></div>
<br><br>
<?php

$userinfo = mysqli_query($conn, $userinfo);

while($row = mysqli_fetch_assoc($userinfo)) {
	?>
	
	<div class="row">
		<div class="col-sm-2"> Name </div>
		<div class="col-sm-4"><?php echo $row1['username']; ?></div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-2"> Email </div>
		<div class="col-sm-4"><?php echo $row['email']; ?></div>
	</div>
	<br>

	<div class="row">
		<div class="col-sm-2"> DOB </div>
		<div class="col-sm-4"><?php echo $row['dob']; ?></div>
	</div>
	<br>

	<div class="row">
		<div class="col-sm-2"> Weight </div>
		<div class="col-sm-4"><?php echo $row['weight']; ?> kgs</div>
	</div>
	
	<br>
	<div class="row">
		<div class="col-sm-2"> height </div>
		<div class="col-sm-4"><?php echo $row['height']; ?> cm</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-2"> BMI </div>
		<div class="col-sm-4"><?php echo $row['bmi']; ?></div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-2"> Location </div>
		<div class="col-sm-4"><?php echo $row['location']; ?></div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-4"><button name="submit" class="btn btn-success" value="<?php echo $row['email']; ?>">Edit</button></div>
	</div>
	
	<?php
}

mysqli_close($conn);
?>
	
</form>
</body>

<?php
}

?>