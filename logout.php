<?php
session_start();
require "link.php";
if(isset($_GET['uid'])){$uid = $_GET['uid'];}
else{$uid = $_SESSION['login'];}
  $query = mysqli_query($mysqli, "UPDATE arome set online=0 where id='$uid'");
  if($query){
  	session_unset();
	session_destroy();
	header("location:index.php");}

?>