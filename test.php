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
  }
  else{
    header('Location:logout.php');
  }
 }
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
  <body>
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
    <p style="display:none" id="lcheck">yes</p>
    <div class="panel panel-warning panel-margin">
    <div class="panel-heading"><h4 class="panel-title"><a href="home.php"><span class="glyphicon glyphicon-home" style="color:#00233c">&nbsp;</span></a>
      <span id="panel-title"><?php echo $panel_title; ?></span>
      <span class="pull-right" id="countdown"></span>
      <span class="pull-right" id="countend"></span>
    </h4></div>

    <div class="container panel-body" id="display-point" style="padding:10px; width: 100%;">
<?php   $courseid = $_GET['test'];

//check selected exam from database to verify availability....

    $query = mysqli_query($mysqli,"SELECT * FROM babs WHERE subid = $courseid AND active = 1");
    if($query){
    $row = $query->num_rows;
    if($row !=0){
    $qu = $query->fetch_assoc();
    unset($_SESSION['n']);
      $query = mysqli_query($mysqli, "SELECT * from odoma where subid = $courseid");
      $que_no = $query->num_rows;
    echo '    
        <div class="alert alert-default">
        
        <p class="alert alert-default-info">Course title: '. $qu['subname'].' ('.$qu['subcode'].')</p>
    <p class="alert alert-default-info">No of questions: ' . $que_no.'</p>
    <p class="alert alert-default-info">Exam duration: ' . $qu['duration'] .' minute(s)</p>
    <p class="alert alert-instruction"><b><font size="4">Instructions:</b></font> <br>
    O <note class="alert-danger"><b> Note: </b>Once the exam has started, you cannot navigate away from the exam page. If you do so, the exam will be submitted and considered done.</note><br> O ' .$qu['instruction'].'</p><br>
    <span style="display:none" id="get-subid">'.$qu['subid'].'</span>
    <span style="display:none" id="get-subname">'.$qu['subname'].'</span>
    <span style="display:none" id="get-subcode">'.$qu['subcode'].'</span>
    <span style="display:none" id="get-user">'.$linkuser.'</span>
      <p><span onclick="nextQues(1)" onmousedown="startTimer()" class="btn btn-primary btn-lg pull-right" style="margin-top:-5px;"/> Start now </span></p>
    </div>';

  }
    else{
      echo "<p class='alert alert-warning'> Click <a href='home.php' class='btn-primary'>here</a> to check for available exams.</p>";
    }
}
else{
  echo "<p class='alert alert-warning'> Click <a href='home.php' class='btn-primary'>here</a> to check for available exams.</p>";
}
?>

    </div>

<!-- Content page ends here -->
    <?php require "footer.php"; ?>

        
         