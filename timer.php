<?php 
require "link.php";
if(isset($_GET['test'])){
	if(!isset($duration)){
$subid = $_GET['subid'];
$user = $_GET['user'];

$query = mysqli_query($mysqli, "SELECT * from elton where uid = $user and subid = $subid");
if($query){
$row = $query->num_rows;
 if ($row >= 1){
 	echo "done";
 }
 else{
	$query = mysqli_query($mysqli, "SELECT * from odoma where subid = $subid");
	$check = $query->num_rows;
	if($check >= 1){
	$query = mysqli_query($mysqli, "SELECT duration from babs where subid = $subid");
	$value = $query->fetch_assoc();
	$_SESSION['duration'] = $value['duration'];
	echo $value['duration'];
	}
	else{
		echo "done";
	}
}
}
else{}
}
else{	
$dur = $_GET['duration']; 
echo $dur;
}
//$a = tim
}
else{
	$_SESSION['duration'] = "";
}
?>