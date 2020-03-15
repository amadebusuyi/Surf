<?php
require '../link.php';
if(isset($_GET['uid'])){
      $uid = $_GET['uid'];
        $query = mysqli_query($mysqli, "select * from arome where id=$uid");
        $rows = $query->num_rows;
        if($rows == 1){
        $fetch =  $query->fetch_row();
  //backup user in the users recycle bin (arome_rec)
        $query = mysqli_query($mysqli, "INSERT into arome_rec(uid, fname, lname, user, pass, dept, phone, email) values ('$fetch[0]','$fetch[1]','$fetch[2]','$fetch[3]','$fetch[4]','$fetch[5]','$fetch[6]','$fetch[7]')");
      $query2 = mysqli_query($mysqli, "DELETE from arome where id=$uid");
        if($query2){    
          echo "<p class='alert alert-danger'>$fetch[1] deleted from database!</p>";
        }
      }
      else{echo "<p class='alert alert-warning'>User cannot be found in the database!</p>";}
    }

//set confirming and finalizing subject delete

//confirm delete
if(isset($_GET['subid'])){
      $subid = $_GET['subid'];
   
      $query = mysqli_query($mysqli, "SELECT * from babs where subid=$subid");
      $rows = $query->num_rows;
      if($rows > 0){
      $fetch = $query->fetch_assoc();
      $subid = $fetch['subid'];
      $subname = $fetch['subname'];
      $subcode = $fetch['subcode'];
      $duration = $fetch['duration'];
      $inst = $fetch['instruction'];
//Backup subject in a recycle bin (babs_rec).
      $query = mysqli_query($mysqli, "INSERT into babs_rec(subid, subname, subcode, duration, inst) values ('$subid', '$subname', '$subcode', '$duration', '$inst')");
      $query = mysqli_query($mysqli, "DELETE from babs where subid=$subid");
//remove questions under subject
      $query = mysqli_query($mysqli, "SELECT * from odoma where subid=$subid");
      $fetch = $query->fetch_row();
      $query = mysqli_query($mysqli, "INSERT into odoma_rec(qid, subid, qtext, ans1, ans2, ans3, ans4, ans5, ans) values ('$fetch[0]','$fetch[1]','$fetch[2]','$fetch[3]','$fetch[4]','$fetch[5]','$fetch[6]','$fetch[7]','$fetch[8]')");
      $query = mysqli_query($mysqli, "DELETE from odoma where subid=$subid");
        if($query){
          echo "<p class='alert alert-danger'>$subcode and questions under it permanently removed</p>";
        }
      }
      else{echo "<p class='alert alert-warning'>Course cannot be found in the database!</p>";}
    }


//set result delete

if(isset($_GET['resid'])){
      $resid = $_GET['resid'];

//remove result
      $query = mysqli_query($mysqli, "SELECT * from elton where rid=$resid");
      $rows = $query->num_rows;
      if($rows > 0){
      $fetch = $query->fetch_row();
//Backup result in a recycle bin (elton_rec).
      $query = mysqli_query($mysqli, "INSERT into elton_rec(rid, user, uid, subid, subname, name, score) values ('$fetch[0]', '$fetch[1]', '$fetch[2]', '$fetch[3]', '$fetch[4]', '$fetch[5]', '$fetch[6]')");
//remove revisions under result
     /* $que = mysqli_query($mysqli, "SELECT * from odoma_rev where uid='$fetch[2]' and subid = '$fetch[3]'");
      $count = 1;
      while($copy = $que->fetch_row()){    

      $que = mysqli_query($mysqli, "INSERT into odoma_rev_rec(revid, subid, uid, qid, choice, score) values ('$copy[0]', '$copy[1]', '$copy[2]', '$copy[3]', '$copy[4]', '$copy[5]')");
      }*/
      $query = mysqli_query($mysqli, "DELETE from odoma_rev where uid = '$fetch[2]' and subid = '$fetch[3]'");
      $query = mysqli_query($mysqli, "DELETE from elton where rid = $resid");
        if($query){
          echo "<p class='alert alert-danger'>$fetch[5]'s result has been removed</p>";
        }
      }
      else{echo "<p class='alert alert-warning'>Result cannot be found in the database!</p>";}
      }

if(isset($_GET['qid'])){
  $qid = $_GET['qid'];
  $que = mysqli_query($mysqli, "SELECT * from odoma where qid = $qid");
  $row = $que->num_rows;
  if($row>0){
  $fetch = $que->fetch_row();
  $query = mysqli_query($mysqli, "INSERT into odoma_rec(qid, subid, qtext, ans1, ans2, ans3, ans4, ans5, ans) values ('$fetch[0]','$fetch[1]','$fetch[2]','$fetch[3]','$fetch[4]','$fetch[5]','$fetch[6]','$fetch[7]','$fetch[8]')");
  $query = mysqli_query($mysqli, "DELETE from odoma_rev where qid=$qid");
  $query = mysqli_query($mysqli, "DELETE from odoma where qid=$qid");
  if($query) echo "<p class='alert alert-danger'>Question has been removed</p>";
}
else{echo "<p class='alert alert-warning'>Question cannot be found in the database!</p>";}
}
?>