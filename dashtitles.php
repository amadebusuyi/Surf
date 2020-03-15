<?php if(isset($_GET['exam'])){
    $panel_title = "Available Exam (s)";
    } 
  
    elseif(isset($_GET['profile'])){
    $panel_title = "My Profile";
    } 

    elseif(isset($_GET['test'])){
    if($_GET['test']!='' || $_GET['test']==''){
    $panel_title = "Start Exam";
    }
  }
    elseif(isset($_GET['start'])){
    if($_GET['start']!='' || $_GET['start']==''){
      if(isset($_SESSION['start_name'])){
    $panel_title = $_SESSION['start_name'];
  }
  else{
    $panel_title = "Error Page";
  }
    } 
  }
  
    else{
      $panel_title = "Available Exam(s)";
    }
    ?>