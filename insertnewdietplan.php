<?php

session_start();
if($_SESSION['username']=='user' && $_SESSION['email'] != ''){
if(isset($_POST['submit'])){

		include 'bootstrapheader.html';
		include 'dbconnection.php';
		include 'navbar.html';

		$username = $_SESSION['email'];
		$height = $_SESSION['height'];
		$dietname = $_SESSION['dietname'];
		$currentweight = $_SESSION['currentweight'];
		$diettype = $_SESSION['diettype'];
		$typeoffood = implode('&' , $_SESSION['typeoffood']);
		$expectedval = $_SESSION['expectedval'];
		$plantype = $_SESSION['plantype'];
		$startdate = $_SESSION['startdate'];

		$breakfastitems = implode(',' , $_POST['breakfast']);
		$lunchitems = implode(',' , $_POST['lunch']);
		$dinneritems = implode(',' , $_POST['dinner']);

		$allitems = array($breakfastitems,$lunchitems,$dinneritems);

		$items = implode('&', $allitems);

		$timestamp = date("Y-m-d",time()).'-'.time();
		$bmi = $currentweight / (($height*0.01)*($height*0.01)*($height*0.01));
		$sqlinsert = "INSERT INTO dietplan(dietid, dietname, email, diettype, startdate, startbmi, startweight, goalvalue, typeoffood, selecteditems) Values('$timestamp', '$dietname', '$username', '$diettype', '$startdate', '$bmi','$currentweight','$expectedval','$typeoffood','$items')";

	if (mysqli_query($conn, $sqlinsert)) {
    	echo 'New Diet Plan Created';
	} else {
    echo "Error: " . $sqlinsert . "<br>" . mysqli_error($conn);
	}

	for($i=1;$i<=7;$i++){
		$breakfastlist = array_rand($_POST['breakfast'], 3);
		$breakfastlistcom = implode(',', array($_POST['breakfast'][$breakfastlist[0]],$_POST['breakfast'][$breakfastlist[1]],$_POST['breakfast'][$breakfastlist[2]]));

		$lunchlist = array_rand($_POST['lunch'], 3);
		$lunchlistcom = implode(',', array($_POST['lunch'][$lunchlist[0]],$_POST['lunch'][$lunchlist[1]],$_POST['lunch'][$lunchlist[2]]));

		$dinnerlist = array_rand($_POST['dinner'], 3);
		$dinnerlistcom = implode(',', array($_POST['dinner'][$dinnerlist[0]],$_POST['dinner'][$dinnerlist[1]],$_POST['dinner'][$dinnerlist[2]]));

		$sqldietschedule = "INSERT INTO dietschedule(dietid, dietday, breakfast, lunch, dinner) Values('$timestamp','$i','$breakfastlistcom', '$lunchlistcom','$dinnerlistcom')";

		if(mysqli_query($conn, $sqldietschedule)){
			echo '<br> Diet Plan Schedule is also created. ';

		}else {
    echo "Error: " . $sqldietschedule . "<br>" . mysqli_error($conn);
	}

	}

	}
}
?>