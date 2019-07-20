<?php
session_start();

if($_SESSION['username']=='user' && $_SESSION['email'] != ''){

include 'bootstrapheader.html';
include 'dbconnection.php';
include 'navbar.html';

if(isset($_POST['submit'])){
?>
<body class="container">
	<br>
	<div class="panel-group">
	<?php
	$dietval = explode('&',$_POST['submit']);
	$dietid = $dietval[0];
	$sqlsel = "SELECT * FROM dietschedule where dietid='$dietid'";
	
	$sqlselresult = mysqli_query($conn,$sqlsel);
 	while($row = mysqli_fetch_assoc($sqlselresult)) { 
?>
 		<div class="panel panel-info">
      <div class="panel-heading"><?php echo 'DAY '.$row['dietday']; ?></div>
      <div class="panel-body">
      	<?php 
      	$breakfastmenu = explode(',',$row['breakfast']);
      	$lunchmenu = explode(',',$row['lunch']);
      	$dinnermenu = explode(',',$row['dinner']);
      	 ?>
  		<?php if($dietval[1] == 'gainweight'){ ?>
  		<h4>BreakFast :</h4>
  		4 <?php echo $breakfastmenu[0]; ?><br>
  		3 <?php echo $breakfastmenu[1]; ?><br>
  		2 <?php echo $breakfastmenu[2]; ?><br> <br>
  		<h4>Lunch :</h4>
  		4 <?php echo $lunchmenu[0]; ?><br>
  		3 <?php echo $lunchmenu[1]; ?><br>
  		2 <?php echo $lunchmenu[2]; ?><br> <br>
  		<h4>Dinner :</h4><br>
  		4 <?php echo $dinnermenu[0]; ?><br>
  		3 <?php echo $dinnermenu[1]; ?><br>
  		2 <?php echo $dinnermenu[2]; ?><br> 
  		
  		<?php } ?>
  		<?php if($dietval[1] == 'lossweight'){ ?>
  		<h4>BreakFast :</h4>
  		3 <?php echo $breakfastmenu[0]; ?><br>
  		2 <?php echo $breakfastmenu[1]; ?><br>
  		1 <?php echo $breakfastmenu[2]; ?><br> <br>
  		<h4>Lunch :</h4>
  		3 <?php echo $lunchmenu[0]; ?><br>
  		2 <?php echo $lunchmenu[1]; ?><br>
  		1 <?php echo $lunchmenu[2]; ?><br> <br>
  		<h4>Dinner :</h4>
  		3 <?php echo $dinnermenu[0]; ?><br>
  		2 <?php echo $dinnermenu[1]; ?><br>
  		1 <?php echo $dinnermenu[2]; ?><br> 
  		
  		<?php } ?>
  		<?php if($dietval[1] == 'stayfit'){ ?>
  		<h4>BreakFast :</h4>
  		3 <?php echo $breakfastmenu[0]; ?><br>
  		3 <?php echo $breakfastmenu[1]; ?><br>
  		1 <?php echo $breakfastmenu[2]; ?><br> <br>
  		<h4>Lunch :</h4>
  		3 <?php echo $lunchmenu[0]; ?><br>
  		3 <?php echo $lunchmenu[1]; ?><br>
  		1 <?php echo $lunchmenu[2]; ?><br> <br>
  		<h4>Dinner :</h4>
  		3 <?php echo $dinnermenu[0]; ?><br>
  		3 <?php echo $dinnermenu[1]; ?><br>
  		1 <?php echo $dinnermenu[2]; ?><br> 
  		
  		<?php } ?>
      </div>
    </div>

<?php 	}


?>
</div>
</body>

<?php
}


}

?>