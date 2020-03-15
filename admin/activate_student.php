<?php
//student activation and deactivation
include ('../link.php');

if(isset($_GET['uid'])){
    $uid = $_GET['uid'];
    $query = mysqli_query($mysqli, "SELECT activated, lastseen from arome where id = $uid ");
    $check = $query->fetch_assoc();
    $switch_state = $check['activated'];
    $lastseen = $check['lastseen'];

    if($switch_state == 0){
      
    $query = mysqli_query($mysqli, "UPDATE arome set activated = 1, lastseen = '$lastseen' where id = '$uid'");
    if($query){
      echo  4;
    }
    else{
      echo 6;
  }
  }

    else {
      $query = mysqli_query($mysqli, "UPDATE arome set activated = 0, lastseen = '$lastseen' where id ='$uid'");
    if($query){
      echo  5;

  }    
  else{
    echo 6;
  }
}
}