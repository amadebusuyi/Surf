<?php 
      require "link.php";
      if(isset($_GET['subid'])){
      $subname = $_GET['subname'];
      $subcode = $_GET['subcode'];
      $subid = $_GET['subid'];
      $uid = $_GET['user'];
    }
      $query = mysqli_query($mysqli, "SELECT * from arome where id= $uid ");
      $che = $query->fetch_assoc();
      $name = $che['lname']." ".$che['fname'];
      $fname = $che['fname'];
      $user = $che['user'];
      $ver_score = mysqli_query($mysqli, "SELECT score from odoma_rev where subid = $subid and uid = $uid");
      $score_rows = $ver_score->num_rows;
      $correct=0;
        $wrong = 0;
      while($fetch_score = $ver_score->fetch_assoc()){
        $score = $fetch_score['score'];
        
        if($score == 1){
          $correct++;
        }
      }
      $get_total = mysqli_query($mysqli, "SELECT * from odoma where subid = $subid");
      $total = $get_total->num_rows;
      if($_GET['finish']=='rev'){
        echo "<p class='alert alert-default'><font size='4'>$fname, You have already completed $subname.</font></p>";
      }
      elseif($_GET['finish']==''){
      echo "<p class='alert alert-default'><font size='4'>$fname, You have just completed $subname</font> <br> Your exam has been submitted!
        Click on check to see your choices <br>
        <span style='display:none' id='get-subid'>$subid</span>
        <span style='display:none' id='get-subname'>$subname</span>
        <span style='display:none' id='get-subcode'>$subcode</span>
        <span style='display:none' id='get-user'>$uid</span>
        <span onclick='nextRev(1)' class='btn btn-default'> Check </span> </p>";
      $confirm_submission = mysqli_query($mysqli, "SELECT * from elton where uid=$uid and subid=$subid");
      $confirm_row = $confirm_submission->num_rows;
      if($confirm_row>=1){
      }
      else{
      $query = mysqli_query($mysqli, "INSERT into elton(uid,subid,user,subname,name,score) values($uid, $subid, '$user', '$subname', '$name', $correct)");
    }
  }
  else{
      echo "<p class='alert alert-warning'> Click <a href='home.php' class='btn-primary'>here</a> to check for available exams.</p>";
    }
    ?>