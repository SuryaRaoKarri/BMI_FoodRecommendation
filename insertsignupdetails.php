<?php
include 'bootstrapheader.html';
include 'dbconnection.php';

if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$email = $_POST['email'];
	$phonenumber = $_POST['phonenumber'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$weight = $_POST['weight'];
	$height = $_POST['height'];
	$location = $_POST['location'];
	$password = $_POST['password'];

	$sql = "INSERT INTO usercredentials(username, email, password, access) VALUES('$username','$email','$password','user')";

	$bmi = ($weight/($height * $height))*10000;

	$sqlinfo = "INSERT INTO userinformation(email, dob, gender,height, weight, location, bmi) VALUES('$email','$dob','$gender','$height','$location','$height','$bmi') "; 

if (mysqli_query($conn, $sql) && mysqli_query($conn, $sqlinfo)) {
    echo $username." account created successfully. <br>";
    echo "<a href='login.php'>Click here to login</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);

}

?>