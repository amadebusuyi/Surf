<?php 
  require ('link.php');
      if(isset($_GET['qn'])){

//Verify whether user is allowed to view this page.
    if(isset($_GET['subid'])){
    $subid = $_GET['subid'];
    $subname = $_GET['subname'];
    $subcode = $_GET['subcode'];
    $uid = $_GET['user'];
    $query = mysqli_query($mysqli, "SELECT * from arome where id= $uid ");
    $che = $query->fetch_assoc();
    $fname = $che['fname'];

//verify whether or not user has taken the exam before 
    $query = mysqli_query($mysqli, "SELECT * from elton where subid = $subid and uid = $uid");
    if($query){
    $row = $query->num_rows;
    if($row !=0){
      echo "<p class='alert alert-instruction'>Sorry $fname! It appears you've already taken the test on $subname. Click <a href='home.php'><span class='btn-primary'>here</span></a> to check for other active exams.<br><br>
      Click on check to see your choices in $subname<br>
    <span style='display:none' id='get-subid'>$subid</span>
    <span style='display:none' id='get-subname'>$subname</span>
    <span style='display:none' id='get-subcode'>$subcode</span>
    <span style='display:none' id='get-user'>$uid</span>
    <span onclick='nextRev(1)' class='btn btn-default'> Check </span>";
    }

// If user has not taken the exam in the past, start to display exam
    else{
  //set choice as empty... this is to prevent a not set error that may arise as a result of no selection
    $choice_mark = '';
  //get neccessary details to process the right question to be displayed.
    $n = $_GET['qn']-1;
    $ver_id = $subid;
    $query = mysqli_query($mysqli, "SELECT * from odoma where subid = $ver_id");
    $rows = $query->num_rows;
    mysqli_data_seek($query, $n);
    $fetch = $query->fetch_assoc();
    $qtext = $fetch['qtext'];
  $ans1 = $fetch['ans1'];
  $ans2 = $fetch['ans2'];
  $ans3 = $fetch['ans3'];
  $ans4 = $fetch['ans4'];
  $ans5 = $fetch['ans5'];
  $qid = $fetch['qid'];
  //save question id into $_session['qid']
  $_SESSION['qid']= $qid;
  $subid = $fetch['subid'];
  $ans = $fetch['ans'];
  //save correct answer into $_Session['correct']
  $_SESSION['correct'] = $ans;
  $n = $n+1;
  $qn = $_GET['qn']+1;
  //check whether an answer has been selected for a particular question 
  $query = mysqli_query($mysqli, "SELECT * from odoma_rev where qid=$qid and uid=$uid");
  if($query){
        $check_row = $query->num_rows;
        if($rows!=''){
          $check = $query->fetch_assoc();
          $ver_sub = $check['subid'];
          if($subid==$ver_sub){
          $choice_mark = $check['choice'];
          }
      }
    }
    else{

    }
//displaying the question for user
//displaying the question for user
//for all questions   
 echo "<span id='display-check'></span>";
 require "display_que.php";   

      }
    }

  else{
    echo "<p class='alert alert-warning'> Click <a href='home.php' class='btn-primary'>here</a> to check for available exams.</p>";
  }
  }
      else{
        echo "<p class='alert alert-warning'> Click <a href='home.php' class='btn-primary'>here</a> to check for available exams.</p>";
      }
  }
?>