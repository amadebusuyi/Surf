<div class="panel-min-height">
<?php 
require "../link.php";
include 'functions.php';

if(isset($_POST['uid'])){
	$id = $_POST['uid'];
	$fname = stripper($_POST['fname']);
	$lname = stripper($_POST['lname']);
	$phone = $_POST['phone'];
	$dept = stripper($_POST['dept']);
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];

	$query = mysqli_query($mysqli, "SELECT lastseen from arome where id = $id");
	$row = $query->fetch_assoc();
	$lastseen = $row['lastseen'];

	if($pass != ""){
		if($pass == $cpass ){
			$pass = pass($pass);
			$query = mysqli_query($mysqli, "UPDATE arome SET fname = '$fname', lname = '$lname', dept = '$dept', phone = '$phone', pass = '$pass', lastseen = '$lastseen' WHERE id = $id ");
			if($query){
				echo 'Information updated successfully.';
			}
			else {
			echo 'Unable to update information! Contact your system administrator for help.';
		}
		}

		else{
			echo 'Unable to update because password does not match! Verify password and try again.';
		}
	}

	else{
		$query = mysqli_query($mysqli, "UPDATE arome SET fname = '$fname', lname = '$lname', dept = '$dept', phone = '$phone', lastseen = '$lastseen' WHERE id = $id ");

		if($query){
		echo 'Information updated successfully.';
	}
	else{
		echo 'Update failed! Try again or contact system administrator for help.';
	}
}
}
?>
</div>