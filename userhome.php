<?php
include 'bootstrapheader.html';
include 'dbconnection.php'; 
session_start();
if($_SESSION['username']=='user' && $_SESSION['email'] != ''){

?>

<body class="container">
<br><br>
<hr>
<div class="row" style="margin-left: 20px;">
<div class="col-sm-2"><a href="userhome.php">Diet Plan</a></div>
<div class="col-sm-2"><a href="newdietplan.php">New diet Plan</a></div>
<div class="col-sm-2"><a href="listdietplan.php">List diet Plan</a></div>
<div class="col-sm-2"><a href="healthblogs.php">Health Blogs</a></div>
<div class="col-sm-3"><a href="personalinfo.php" style="margin-left: 100px;">Personal Info</a></div>
<div class="col-sm-1"><a href="logout.php">Logout</a></div>
</div>
<hr>
<br><br>
</body>

<?php
}
?>