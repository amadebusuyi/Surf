<div class="panel-min-height">
  <?php 
  include ('../link.php');

      //Getting available results from result database....
//Getting available results from result database....

    $query = mysqli_query($mysqli, "SELECT * from elton");
   $res_num = $query->num_rows;

if($_GET['results'] == ''){
  $_SESSION['res_num'] = 0;
    echo "<div class='pull-left'>Total number of result entries : <span id='results-count'></span></div><br>";
    if ($res_num == 0){
      echo "<p class='alert alert-info'>No result is stored in your database at the moment! </p>";
    }

    else{

    $query = mysqli_query($mysqli, "SELECT * from babs");
   while ($fetch = $query->fetch_row()){

  $check = mysqli_query($mysqli, "SELECT * from elton where subid=$fetch[0]");
   $new_res_num = $check->num_rows;
   if($new_res_num == 0){
   
 }
    else{
          
   echo "<div class='col-md-4' style='text-align:center;margin-bottom:35px;'>
      <button type='button' style='height:50px; margin-top:40px;' class='btn btn-success' onclick='display(6, $fetch[0])'><h4>$fetch[2]($new_res_num)</h4></button>
   </div>";

        }

        $_SESSION['res_num'] = $_SESSION['res_num'] + $new_res_num;
 }
  $value = $res_num - $_SESSION['res_num'];
  if($value != 0){
    echo "<div class='col-md-3' style='margin-bottom:35px;  margin-top:40px;'> <a href='?results=x' style='height:50px; margin-left:55px; font-size:18px; padding:10px;' class='btn btn-success'>Deleted ($value)</a></div>";
  }
  else{}
}
}

//to display stored results for courses that have been deleted.
  elseif ($_GET['results']=='x'){
    echo "<p><button type='button' class='btn btn-default pull-right' onclick='display(6)' style='margin-top:-8px !important;'><span style='color:#00233c; border-radius: 25px; padding:3px; background:whitesmoke;' class='glyphicon glyphicon-arrow-left'></span> Back</button></p>";
    $query = mysqli_query($mysqli, "SELECT * from babs_rec");
    while ($fetch = $query->fetch_row()){
    $check = mysqli_query($mysqli, "SELECT * from elton where subid=$fetch[1]");
    $new_res_num = $check->num_rows;
   if($new_res_num !=0){
    $_SESSION['fetch_name'] = $fetch[2];
   echo "<div class='col-md-3' style='text-align:center;margin-bottom:35px;'>
      <a style='height:50px; margin-top: 40px;' class='btn btn-success' href ='?results=$fetch[1]'><h4>$fetch[2]($new_res_num)</h4></a><br><button class='btn btn-danger' style='margin-top:5px;'><span class='glyphicon glyphicon-trash'><span></button>
   </div>";  
        }

    else{

        }

   }
}

//To display results for a selected course
  elseif($_GET['results'] !=''){
    $subid = $_GET['results'];
    $query = mysqli_query($mysqli, "SELECT * from elton where subid=$subid order by name");
  if($query){
  $row = $query->num_rows;
  if($row != 0){
    $fetch = mysqli_query($mysqli, "SELECT * from babs where subid=$subid");
    $fetched = $fetch->fetch_assoc();
    echo "
    <p>Total number of ".$fetched['subcode']." result entries: $row
    <button type='button' class='btn btn-default pull-right' onclick='display(6)' style='margin-top:-8px !important;'><span style='color:#00233c; border-radius: 25px; padding:3px; background:whitesmoke;' class='glyphicon glyphicon-arrow-left'></span> Back</button></p><br>
      <style>
      table th{
        text-align: left;
      }
      td{
        text-align:left !important;
        padding-left:0;
        }
      th{
        border:1px solid black; padding:4px; background-color: #2f4050; color:white;
      }
      </style>

    <table class='table' id='tableres'><thead>
      <th>S/N</th>
      <th>Full name</th>
      <th>Score</th>
      <th>Action</th>
    </thead>
    <tbody>
     <style>
        td:nth-child(even){
            background-color: #eee;
            
        }
     </style>";

   $no = 1;
   while($fetch = $query->fetch_row()){
  
    $sendName = $fetch[5]."\'s result";
      echo " <tr id='row-$fetch[0]'>
      <td>$no</td>
      <td>$fetch[5] </td>
      <td>$fetch[6]</td>
      <td style='border:none; border-bottom:none; width: 90px; text-align: center;'>

<!-- Initiate delete result-->
<button type='button' class='btn btn-danger' name='del_user' title='Delete result from database' onclick=\"delConfirm(3, $fetch[0], '$sendName')\" data-toggle='modal' data-target='#myModal'><span class='fa fa-trash'></span></button>
      <!--<button class='btn-info' type='submit' name='see_result'><span class='glyphicon glyphicon-eye-open'></span></button>-->
    </form></td>
    </tr>";

    $no++;
  }
echo "</tbody></table>";
}
else{
    echo "<p class='alert alert-warning'>Result not found!  Click <a href='?results' class='btn-primary'>here</a> to view available results.</p>";
  }
}
else {
    echo "<p class='alert alert-warning'>Result not found!  Click <a href='?results' class='btn-primary'>here</a> to view available results.</p>";
}
}

?>
</div>  

 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="delete-title">Student's result delete...</h4>
      </div>
      <div class="modal-body">
        <p id="del-user-name"></p>
        <p style="display:none" id="del-user-id"></p>
      </div>
      <div class="modal-footer">
        <span id="delete-student"></span>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>

<script type="text/javascript">
  $(document).ready( function () {
    $('#tableres').DataTable();
} );
</script>