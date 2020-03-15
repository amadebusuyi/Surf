<?php 
if(isset($_GET['students'])){
    if($_GET['students']==''){
    $panel_title = "Registered Students";
    } 
  }

    elseif(isset($_GET['edit_course'])){
      $panel_title = "Edit Course";
    }

    elseif(isset($_GET['edit_student'])){
      $panel_title = "Edit Student";
    }

    else if(isset($_GET['questions'])){
    $panel_title = "Questions";
    } 
  
    else if(isset($_GET['add_questions'])){
    $panel_title = "Add Questions";
    } 

    elseif(isset($_GET['active'])){
    if($_GET['active']==''){
    $panel_title = "Active Courses";
    } 
  }
    elseif(isset($_GET['courses'])){
    if($_GET['courses']==''){
    $panel_title = "Available courses";
    } 
  }
    elseif(isset($_GET['results'])){
    if($_GET['results']==''){
    $panel_title = "Student's Results";
    }
    elseif($_GET['results']=='x'){
    $panel_title = "Student's Results for deleted courses";
    }
    else{
     $subid = $_GET['results'];
     $query = mysqli_query($mysqli, "select subname from babs where subid=$subid");
     if($query){
     $row = $query->num_rows;
     if($row != 0){
      $fetch = $query->fetch_assoc();
      $panel_title = "Student's Results for " . $fetch['subname'];
     }
     elseif($row == 0){ 
     $query = mysqli_query($mysqli, "select subname from babs_rec where subid=$subid");
     if($query){
     $row = $query->num_rows;
     if($row != 0){
      $fetch = $query->fetch_assoc();
      $panel_title = "Student's Results for " . $fetch['subname']. " (deleted)";
     }
     else{
      $panel_title = 'Student\'s Results Not Found!';
     }
     }
   }
     else{
      $panel_title = 'Student\'s Results Not Found!';
     }
   }
   else{
     $panel_title = 'Student\'s Results Not Found!';
   }
    } 
  }
    else{
      $panel_title = "Dashboard";
    }
?>