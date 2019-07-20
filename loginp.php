<?php
include 'bootstrapheader.html';
include 'dbconnection.php';
session_start();

if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM usercredentials where (email='$username' AND password='$password' AND access='user')";

	$sqlheight = "SELECT * from userinformation where email='$username'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
	$_SESSION['username'] = 'user';
	$_SESSION['email'] = $username;
	$row = mysqli_fetch_assoc(mysqli_query($conn, $sqlheight));
		$_SESSION['height'] = $row['height'];
		$_SESSION['bmi'] = $row['bmi'];

		if($row['bmi'] > 16){
			$bmides = 'Severe Thinness, you can Choose gain weight';
		}
		if($row['bmi'] >= 16 && $row['bmi'] < 17){
			$bmides = 'Moderate Thinness, you can Choose gain weight';
		}
		if($row['bmi'] >= 17 && $row['bmi'] < 18.5){
			$bmides = 'Mild Thinness, you can Choose gain weight';
		}
		if($row['bmi'] >= 18.5 && $row['bmi'] < 25){
			$bmides = 'Normal, you can Choose stay fit';
		}
		if($row['bmi'] >= 25 && $row['bmi'] < 30){
			$bmides = 'Overweight, you can Choose loss weight';
		}
		if($row['bmi'] >= 30 && $row['bmi'] < 35){
			$bmides = 'Obese Class I, you can Choose loss weight';
		}
		if($row['bmi'] >= 35 && $row['bmi'] < 40){
			$bmides = 'Obese Class II, you can Choose loss weight';
		}
		if($row['bmi'] >= 40){
			$bmides = 'Obese Class III, you can Choose loss weight';
		}

		$_SESSION['bmides'] = $bmides;
	header('Location: userhome.php');
}
else echo 'Invalid Details'; 
mysqli_close($conn);

}

?>