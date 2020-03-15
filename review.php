<?php if(isset($_GET['qn'])){
      require "link.php";
//Verify whether test is already taken by user.
    $subid = $_GET['subid'];
    $subname = $_GET['subname'];
    $subcode = $_GET['subcode'];
    $uid = $_GET['user'];   
    $query = mysqli_query($mysqli, "SELECT * from  elton where  subid = $subid and uid = $uid");
    $row = $query->num_rows;
    if($row == 0){
      echo "<p class='alert alert-warning'>Sorry, it appears you've not taken the test on $subname. Click <a href='home.php'><span class='btn-primary'>here</span></a> to start the exam.";
    }
    else{
    $choice_mark = '';
    $n = $_GET['qn']-1;
    $query = mysqli_query($mysqli, "SELECT * from odoma where subid = $subid");
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
  $subid = $fetch['subid'];
  $ans = $fetch['ans'];
  $n = $n+1;
  $qn = $_GET['qn']+1;
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
 echo "<span id='display-check'></span>";
 require "display_rev.php";
    }
  }
?>