<?php require "../link.php"; ?>

    	<p><button class="btn btn-success" data-toggle="modal" data-target="#addModal"> + Add New Student</button>
      <button class="btn btn-success pull-right" onclick="display(2)"><span class="fa fa-refresh fa-spin"> </span> Refresh</button></p>
    
      <style>
      td{
        text-align:left !important;
        padding-left:0;
        }
      </style>
      <div class="panel-min-height">
      <div style="margin-left:5%;" class="row"><p style="text-align: center;" class="col-md-4 alert alert-default"><i class="fa fa-users"></i> Total registered students: <span id="students-count">&nbsp;</span></p><p class="col-md-1"></p>
     <p style="text-align: center;" class="col-md-2 alert alert-success"><i class='fa fa-circle'></i> Online: <span id="onlines-count">&nbsp;</span></p>
     <p class="col-md-1"></p>
     <p style="text-align: center;" class="col-md-3 alert alert-instruction"><i class='fa fa-check'></i> Pending Activation: <span id="act-count">&nbsp;</span></p></div>
     
     <div class="alert panel-red">
    
    <table class='table' id="table">
    <thead><tr>
      <th class="hidden-xs" style='border:1px solid black; padding:4px; background-color: #2f4050; color:white;'>Username</th>
      <th style='border:1px solid black; padding:4px; background-color: #2f4050; color:white;'>Full name</th>
      <th class="hidden-xs" style='border:1px solid black; padding:4px; background-color: #2f4050; color:white;'>Department</th>      
      <th style='border:1px solid black; padding:4px; background-color: #2f4050; color:white;'>Phone</th>      
      <th style='border:1px solid black; padding:4px; background-color: #2f4050; color:white;'>Status</th>
      <th style='border:1px solid black; padding:4px; background-color: #2f4050; color:white;'>Actions</th>
    </tr></thead>                                    
    <style>
        tr:nth-child(even){
            background-color: #eee;
        }
        </style>
        
        <?php 

    $query = "SELECT * FROM arome";
    $result = $mysqli->query($query);
    $no_students = $result->num_rows;
    $no =1;

    //run the while to display registered students within the table
    while($students = $result->fetch_row()){
    $uid = $students[0];
      if($students[9] == 1)
        $online = "online";
      else $online = "offline";
      if($students[8] == 0){
        $trclass = "alert-danger bold-text";
        $act_state = "Activate";
        $icon = "check-square";
        $class = "btn btn-success";
      }
      else{
        $trclass = "";
        $act_state = "Deactivate";
        $icon = "times";
        $class = "btn btn-default";

      }
	echo "<tr id='row-$uid' class=\"$trclass\">
    	<td class='hidden-xs'><span id='user-$uid'>$students[3]</span></td>
    	<td style='text-transform:capitalize;'><span id='fname-$uid'>$students[1]</span> <span id='lname-$uid'>$students[2]</span> </td>
    	<td class='hidden-xs'><span id='dept-$uid'>$students[5]</span> </td>
    	<td><span id='phone-$uid'>$students[6]</span></td>
    	<td>$online</td>
      <td>

<!-- student actions -->
      <span id='email-$uid' style='display:none'>$students[7]</span>
      <button type='button' onclick='activate($uid)' class='$class' id='act-$uid' data-toggle='tooltip' data-placement='bottom' title='Click to $act_state'><span class='fa fa-$icon'></span></button>

      <button type='button' id='edit-button' onclick='getInfo($uid)' class='btn btn-info' title='Edit information for user' data-toggle='modal' data-target='#editModal'><span class='fa fa-edit'></span></button>

      <button type='button' class='btn btn-danger' name='del_user' title='Delete user from database' onclick='delConfirm(1, $uid, \"$students[1] $students[2]\")' data-toggle='modal' data-target='#deleteModal'><span class='fa fa-trash'></span></button>
    </td>
    </tr>";
    $no++;
    } 
	
  ?>
</table></div></div>

<?php include 'student_modal.php'; ?>
    
<script type="text/javascript">
  $(document).ready( function () {
    $('#table').DataTable();
} );

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});

function getInfo(uid){
  $('#euser').val($('#user-'+uid).html());
  $('#efname').val($('#fname-'+uid).html());
  $('#error_log').html('Update ' + $('#fname-'+uid).html()+"'s information");
  $('#ephone').val($('#phone-'+uid).html());
  $('#elname').val($('#lname-'+uid).html());
  $('#edept').val($('#dept-'+uid).html());
  $('#eemail').val($('#email-'+uid).html());
  $('#edit-submit').html('<button type="button" id="update-btn" onclick="editStudent('+uid+')" class="btn btn-primary pull-right" style="margin-right: 15px;">Update</button>');
}

function editStudent(uid){
  $('#update-btn').html("<i class='fa fa-circle-o-notch fa-spin'></i>"); 
        var fname = $('#efname').val();
        var lname = $('#elname').val();
        var phone = $('#ephone').val();
        var dept = $('#edept').val();
        var pass = $('#epass').val();
        var cpass = $('#ecpass').val();
    $.post("edit_student.php",
    {
        uid : uid,
        fname : fname,
        lname : lname,
        phone : phone,
        dept : dept,
        pass : pass,
        cpass : cpass
    },
  function(data, status){
  $('#error_log').html(data);
  $('#update-btn').removeClass('btn-primary').addClass('btn-success').html("<i class='fa fa-check'></i>");
  $('#user-'+uid).html($("#euser").val());
  $('#fname-'+uid).html(fname);
  $('#lname-'+uid).html(lname);
  $('#phone-'+uid).html(phone);
  $('#dept-'+uid).html(dept);
      });
    } 
</script>