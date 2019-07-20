<?php
session_start();

if($_SESSION['username']=='user' && $_SESSION['email'] != ''){

include 'bootstrapheader.html';
include 'dbconnection.php';
include 'navbar.html';
if(isset($_POST['submit'])){
	$_SESSION['dietname'] = $_POST['dietname'];
	$_SESSION['currentweight'] = $_POST['currentweight'];
	$_SESSION['diettype'] = $_POST['diettype'];
	$_SESSION['typeoffood'] = $_POST['typeoffood'];
	$_SESSION['expectedval'] = $_POST['expectedval'];
	$_SESSION['plantype'] = $_POST['plantype'];
	$_SESSION['startdate'] = $_POST['startdate'];
}

$iter = sizeof($_SESSION['typeoffood'])-1;

?>
<body class="container">
	<form action="insertnewdietplan.php" method="POST">
	<br><hr><center>Select the food items you like</center><hr><br>
	
	<div class="row">
	<div class="col-sm-4">
		<h3>Break Fast</h3>
		<br>
	<?php
	for($i=0; $i<=$iter; $i++){
	$type = $_SESSION['typeoffood'][$i];
	//echo $type;
	$sqlbreakfast = "SELECT * from items where ((type2='B' OR type2='B/L' OR type2='B/L/D') AND (type1='$type')) ";
	$resultbreakfast = mysqli_query($conn, $sqlbreakfast);
	while($row = mysqli_fetch_assoc($resultbreakfast)) {
		?>
		<label><input type="checkbox" name="breakfast[]" value="<?php echo $row['itemname']; ?>"><?php echo $row['itemname']; ?></label>
		<br>
		<?php } } ?>
	</div>

	<div class="col-sm-4">
		<h3>Lunch</h3>
		<br>
	<?php
	for($i=0; $i<=$iter; $i++){
	$type = $_SESSION['typeoffood'][$i];
	//echo $type;
	$sqlbreakfast = "SELECT * from items where ((type2='L' OR type2='B/L' OR type2='L/D' OR type2='B/L/D') AND (type1='$type')) ";
	$resultbreakfast = mysqli_query($conn, $sqlbreakfast);
	while($row = mysqli_fetch_assoc($resultbreakfast)) {
		?>
		<label><input type="checkbox" name="lunch[]" value="<?php echo $row['itemname']; ?>"><?php echo $row['itemname']; ?></label>
		<br>
		<?php } } ?>
	</div>

	<div class="col-sm-4">
		<h3>Dinner</h3>
		<br>
	<?php
	for($i=0; $i<=$iter; $i++){
	$type = $_SESSION['typeoffood'][$i];
	//echo $type;
	$sqlbreakfast = "SELECT * from items where ((type2='D' OR type2='L/D' OR type2='B/L/D') AND (type1='$type')) ";
	$resultbreakfast = mysqli_query($conn, $sqlbreakfast);
	while($row = mysqli_fetch_assoc($resultbreakfast)) {
		?>
		<label><input type="checkbox" name="dinner[]" value="<?php echo $row['itemname']; ?>"><?php echo $row['itemname']; ?></label>
		<br>
		<?php } } ?>
	</div>
</div>
	<hr>
	<br>
	<div class="row">
	<div class="col-sm-10"></div>
	<div class="col-sm-2"> <button class="btn btn-success" name="submit">Submit</button></div>
	</div>
	</div>	
	
</form>
</body>
<?php
}
?>