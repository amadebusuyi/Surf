<?php 
require "../link.php";
include 'functions.php';

if(isset($_POST['cid'])){
	$subid = $_POST['cid'];
	$subname = singleQuote($_POST['subname']);
	$subcode = singleQuote($_POST['code']);
	$instruction = singleQuote($_POST['inst']);
	$duration = $_POST['dur'];

	$query =  mysqli_query($mysqli, "UPDATE babs SET subname = '$subname', subcode = '$subcode', instruction = '$instruction', duration = '$duration' WHERE subid = '$subid' ");
	if($query){
		echo "$subname updated successfully!";
	}
	else{
		echo 'Update failed! Try again or contact system administrator for help.';
	}
}