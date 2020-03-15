<?php
require ('link.php');
session_start();

if(!isset($_SESSION['n'])){

    $_SESSION['n']=0;
}
if(!isset($_SESSION['login'])){
   header('Location:index.php');
}

else{

  //verify user again(to prevent attacks) and fetch user informations.

  $linkuser = $_SESSION['login'];

   $query = mysqli_query($mysqli, "SELECT * from arome where id='$linkuser' and online=1");
   $rows = $query->num_rows;
  if($rows >= 1){
    $fetch = $query->fetch_assoc();
    $uid = $fetch['id'];
    $user = $fetch['user'];
    $fname = $fetch['fname'];
    $lname = $fetch['lname'];
    $dept = $fetch['dept'];
    $phone= $fetch['phone'];
    $email = $fetch['email'];
    $activated = $fetch['activated'];
  }
  else{
    header('Location:logout.php');
  }
 }
 
//Fetch available exams for students from database

 $query = mysqli_query($mysqli, "SELECT * from babs where active = 1");
 if($query){
  $no_active = $query->num_rows;
  $fetch = $query->fetch_assoc();
  $subid =  $fetch['subid'];
  $subname =  $fetch['subname'];
  $instruction = $fetch['instruction'];
 }

if(isset($_GET['test'])){
  $page_load = "alert('yes!')";
}
else $page_load = "alert('you left home')";

 ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Surf</title>

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/addstyle.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href=".bootstrap/css/animate.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      html, body{

      }
    </style>
  </head>
  <body onhashchange="<?php echo $page_load; ?>">
    <div class="container-fluid display-table">
      <div class="row display-table-row">
        <!-- Side bar-->
        <!-- <div class="col-md-2 col-sm-1 hidden-xs">
          &nbsp;          
        </div> -->
        <!--content bar-->
        <div class="col-md-12 col-sm-12 col-xs-12 display-table-cell valign-top">
          <div  class="row">
            <header id="navhead" class="clearfix">
              
              <div class="col-md-12">
                <ul class="pull-right">
                  <li id="welmessage">Hello <b><?php echo $fname; ?></b></li>
                  
                  <li>
                  <!-- to set logout -->
                   <a name="logout" href="logout.php" class="logout"> 
                      <span class="glyphicon glyphicon-log-out" aria-hidden="true"> logout</span>
                    </a>
                  </li>
                </ul>

              </div>
            </header>
          </div>



<!-- Contents are displayed here on select -->
<?php 
    require "dashtitles.php";
?>
<style type="text/css">
  .panel-title{
      font-size: 20px;
  }
  .glyphicon-home:hover{
    color: darkred !important;
  }
</style>
    <div class="panel panel-warning panel-margin">
    <div class="panel-heading"><h4 class="panel-title"><a href="home.php"><span class="glyphicon glyphicon-home" style="color:#00233c">&nbsp;</span></a>
      <span id="panel-title"><?php echo $panel_title; ?></span>
      <span class="pull-right" id="countdown"></span>
      <span class="pull-right" id="countend"></span>
    </h4></div>

    <div class="container panel-body" id="display-point" style="padding:10px; width: 100%;">

<?php

//this is to display  exam details for selected exam

require "controller.php";

?>
    </div>
<!-- Content page ends here -->
    <?php require "footer.php"; ?>

        
        