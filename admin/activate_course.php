<?php
//course activation and deactivation
include ('../link.php');

if(isset($_GET['subid'])){
    $subid = $_GET['subid'];
    $query = mysqli_query($mysqli, "SELECT active from babs where subid = '$subid' ");
    $check = $query->fetch_assoc();
    $switch_state = $check['active'];

    if($switch_state == 0){
      
    $query = mysqli_query($mysqli, "UPDATE babs set active = 1 where subid = '$subid'");
    if($query){
      echo  1;
    }
    else{
      echo 3;
  }
  }

    else {
      $query = mysqli_query($mysqli, "UPDATE babs set active = 0 where subid ='$subid'");
    if($query){
      echo  2;

  }    
  else{
    echo 3;

  }

}
}
else if(isset($_GET['active'])){
    echo '<div class="panel-min-height">';
    echo "<p class='alert alert-info'>Students will only see active courses on their page</p>";
    $query =  mysqli_query($mysqli, "SELECT * from babs WHERE active = 1");
    $no_act = $query->num_rows;
    $no=1;
    echo "
    <p>Total number of Active Course(s): <span id='actives-count'>&nbsp;</span></p>"
      ;
      if ($no_act < 1){
        echo "<p class='alert alert-default-info'>There is no active course for students at the moment <br> Click <button type='button' onclick='display(1)' class='btn btn-info'>Check Courses</button> to add and activate courses</p>";
      }
      else{
    while($active = $query->fetch_assoc()){
     $active_course = $active['subname'];
     $actid = $active['subid'];
     

echo "
<div class='col-md-3' style='text-align:center;margin-bottom:35px;'>
      <span style='height:50px;' name ='$active_course'><h4> $no. $active_course</h4></span>
      <span style='height:50px;'>
      <span style='display:none;' id='act-title'>$active_course</span>
             <a href='#active' class='btn btn-primary' id='act-state-$actid' title='Click to deactivate course' onclick='activate($actid, 0)'><span class='btn btn-default'>Deactivate</span></a href='#active'></span></div>
";
$no++;
    }
  }
  echo "</div>";
  }
?>