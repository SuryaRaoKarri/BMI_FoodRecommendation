<?php
session_start();

if($_SESSION['username'] == 'user' && $_SESSION['email'] !=''){

include 'bootstrapheader.html';
//include 'dbconnection.php'; 

?>
<header>
<style type="text/css">
	#expected{
		display: none;
	}
</style>

 
</header>
<body class="container">
<form action="newdietplan1.php" method="POST" onsubmit="return Checkboxval();">
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
<div class="row">
	<label>New Diet Plan</label>
</div>
<br><br>
<div class="row">
	<div class="col-sm-2">Diet Name :</div>
	<div class="col-sm-2"><input type="text" name="dietname" required></div>
</div><br>
<div class="row">
	<div class="col-sm-2">Current Weight :</div>
	<div class="col-sm-2"><input type="text" name="currentweight" required></div>
</div><br>
<br><p style="color: red;"><?php echo $_SESSION['bmides']; ?></p><br>
<div class="row">

	<div class="col-sm-2">Diet type :</div>
	<div class="col-sm-10">
		<label><input type="radio" name="diettype" value="stayfit" onclick='Disexpected(0);' required>Stay Fit</label>
		<label style='margin-left: 20px;'><input type="radio" name="diettype"  value="gainweight" onclick='Disexpected(1);'>Gain Weight</label>
		<label style='margin-left: 20px;'><input type="radio" name="diettype"  value="lossweight" onclick='Disexpected(1);'>Loss Weight</label><br>
		<p id='expected'>Expected gain/loss : <input type="text"  name="expectedval" required value="0"> </p>
	</div>
</div><br>
<div class="row">
	<div class="col-sm-2">Type of food :</div>
	<div class="col-sm-8">
	<label>	<input type="checkbox" name="typeoffood[]" id="typeoffood" style="margin-left: 20px;" value="V" >Vegetarian</label>
	<label>	<input type="checkbox" name="typeoffood[]" id="typeoffood" style="margin-left: 20px;" value="N">Non-Vegetarian</label>
		<label><input type="checkbox" name="typeoffood[]" id="typeoffood" style="margin-left: 20px;" value="E">Eggetarian</label>
	</div>
</div><br>
<div class="row">
	<div class="col-sm-2">Plan type :</div>
	<div class="col-sm-8">
		<label><input type="radio" name="plantype" value="week" checked required>Week</label>
		<label style='margin-left: 20px;'><input type="radio" name="plantype" value="month">Month</label>
	</div>
</div><br>
<div class="row">
	<div class="col-sm-2">Start Date :</div>
	<div class="col-sm-2"><input type="text" name="startdate" id="startdate" required></div>
</div><br>

<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-4" style="margin-left: 130px;"><button name="submit" type="submit" class="btn btn-success">Next</button></div>
</div><br>
</form>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
	$(document).ready(function(){
		var date_input=$('input[name="startdate"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'mm/dd/yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>

<script type="text/javascript">

	function Disexpected(val){
		if(val == '0'){
			$('#expected').hide();
			$("input[name='expectedval']").val("0");
		} 
		if(val == '1') $('#expected').show();
	}
</script>
<script type="text/javascript">
	function Checkboxval(){
		if($("#typeoffood:checked").length > 0){
		return true;
		
	}
	else{
		alert("Select alteast one from Type of Food ");
		return false;
	}

	
	}
	
	</script>
</body>


<?php
}
?>