<?php
session_start();

if($_SESSION['username']=='user' && $_SESSION['email'] != ''){

include 'bootstrapheader.html';
include 'dbconnection.php';
include 'navbar.html';

$username = $_SESSION['email'];

$sqlsel = "SELECT * FROM dietplan WHERE email='$username'";

?>
<body class="container">
<br>
 <div class="panel-group">
 	
 	<?php //while($row = mysqli_fetch_assoc(mysqli_query($conn,$sqlsel))){
 		$sqlselresult = mysqli_query($conn,$sqlsel);
 	while($row = mysqli_fetch_assoc($sqlselresult)) { ?>
 	<form action="viewdietplan.php" method="POST">
 <div class="panel panel-info">
      <div class="panel-heading"><?php echo $row['dietname']; ?></div>
      <div class="panel-body">
      	Start Date : <?php echo $row['startdate']; ?><br>
      	Expected to : <?php echo $row['diettype']; ?><br>
      	Gain/Loss in Kgs : <?php echo $row['goalvalue']; ?><br>
      	<button class="btn btn-success" name="submit" value="<?php echo $row['dietid'].'&'.$row['diettype']; ?>">View</button>
      </div>
    </div>
</form>
    <?php }

    mysqli_close($conn);
     ?>
</div>
</body>


<?php

}
?>