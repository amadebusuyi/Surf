<?php echo "<div class='col-md-12'>";
  if($activated == 1){
  $query = mysqli_query($mysqli, "SELECT * from babs where active = 1");
  if($query){

//no of active courses
  $no_active = $query->num_rows;
  if ($no_active < 1){
    echo "<div class='col-md-12'><br><p class='alert alert-instruction' style='font-size:16px'><b>$fname</b>, there is no active exam at the moment, check back  or contact exam administrator to log your complaint.</p><br><br></div>";
}
//Displays all ctive courses
else{
  while($fetch = $query->fetch_assoc()){
  echo "<div class='col-md-6 col-sm-6 col-xs-12'><div class='alert alert-default' style='padding:15px; margin:10px;text-align:center;font-size:16px;'>  <p>".$fetch['subname']."</p><p><a href='test.php?test=".$fetch['subid']."' class='btn btn-default' style='font-size:16px;'>View</a></p></div></div>";
            }
      }
    
    echo "</div>";    
}
}
else{
  echo "<div class='col-md-12'><br><p class='alert alert-instruction' style='font-size:16px'><b>$fname</b>, Your registration has not been confirmed by the admin and so you won't be able to take any exam at the moment, check back later or contact exam administrator to log your complaint.</p><br><br></div>";
}
?>