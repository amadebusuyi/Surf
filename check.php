<?php
require "link.php";
$choice_ans = $_GET['opt'];
      $qid =$_GET['qid'];
      $query = mysqli_query($mysqli, "SELECT ans from odoma where qid = $qid");
      $che = $query->fetch_assoc();
      $correct_ans = $che['ans'];
      if($choice_ans == $correct_ans){
        $score_val = 1;
      }
      else{
        $score_val=0;
      }
      
      $choice = $choice_ans;
      $subid = $_GET['subid'];
      $qid = $_GET['qid'];
      $uid = $_GET['user'];
      $_SESSION['update']='false';
      $check = mysqli_query($mysqli, "SELECT * from odoma_rev where qid=$qid and subid=$subid");
      if($check){
      $check_row = $check->num_rows;
      if($check_row > 0){
        while($fetcher = $check->fetch_assoc()){
        $ver_uid = $fetcher['uid'];
        $ver_qid = $fetcher['qid'];
        if($uid==$ver_uid){
          $update = mysqli_query($mysqli, "UPDATE odoma_rev set score = $score_val, choice = '$choice' where qid=$qid and uid=$uid");
          if($update){
            $_SESSION['update']='true';
          }
    }
  }

  if($_SESSION['update'] == 'true'){
        }
        else {
       $query = mysqli_query($mysqli, "INSERT into odoma_rev(subid, qid, uid, choice, score) values($subid, $qid, $uid, '$choice', $score_val)");
        }
}
  else {
    $query = mysqli_query($mysqli, "INSERT into odoma_rev(subid, qid, uid, choice, score) values($subid, $qid, $uid, '$choice', $score_val)");
  }
}
    else {
      echo "Problem processing exam, kindly consult your exam administrator to log a complaint";
    }
    ?>