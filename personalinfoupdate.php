<?php
session_start();

if($_SESSION['username']=='user' && $_SESSION['email'] != ''){

include 'bootstrapheader.html';
include 'dbconnection.php';
include 'navbar.html';

$username = $_SESSION['email'];

if(isset($_POST['submit'])){

	$name = $_POST['username'];
	$weight = $_POST['weight'];
	$location = $_POST['location'];

$updateusername = "UPDATE usercredentials set username='$name'";

mysqli_query($conn, $updateusername);

$updateuserinfo = "UPDATE userinformation set weight='$weight' , location='$location'";

mysqli_query($conn, $updateuserinfo);

header('Location: personalinfo.php');

}

}
?>