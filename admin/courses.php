  <?php require "../link.php"; ?>
  <!--the form -->
      <p><button class="btn btn-success" data-toggle="modal" data-target="#addModal"> + Add New Course</button><button class="btn btn-success pull-right" onclick="display(1)"><span class="fa fa-refresh fa-spin"> </span> Refresh</button></p>

   <div class="panel-min-height"> 
   <div style="margin-left:5%;"> <p style="text-align: center;" class="col-md-4 alert alert-success"><i class="fa fa-book"></i> Total registered courses: <span id="courses-count">&nbsp;</span></p><p class="col-md-1"></p>
     <p style="text-align: center;" class="col-md-2 alert alert-info"><font style="color:blue !important;" class='fa fa-circle'></font> Active Courses: <span id="actives-count">&nbsp;</span></p>
     <p class="col-md-1"></p>
     <p style="text-align: center;" class="col-md-3 alert alert-default"><font style="color:grey" class='fa fa-circle'></font> Inactive Courses: <span id="noactives-count">&nbsp;</span></p></div>
     <div id="table">
    <?php
    //fetch courses from database and display here
    echo '<style>

        .action_btns {
          display: inline-block;
          margin-top: 5px !important;
        }

        .action_btns .glyphicon {
          font-size: 12px !important;
        }

        .action_btns form {
          display: inline;
          margin-top: 5px !important;
        }

        .action_btns .btn {
          width: 28px !important;
          height: 28px !important;
          padding: 3px !important; 
        }
      </style>';

    $query = "SELECT * FROM babs";
    $result = $mysqli->query($query);
    $no_courses = $result->num_rows;
    $no=1;
    while ($courses = $result->fetch_assoc()){
    $course_title = $courses['subname'];
    $course_code = $courses['subcode'];
    $course_id = $courses['subid'];
    $duration = $courses['duration'];
    $state = $courses['active'];
    $inst = $courses['instruction'];
    if ($state == 0){
      $state_echo = '<button type="button" onclick="activate('.$course_id.', 0)" id="act-state-'.$course_id.'" title="Click to activate '.$course_title.' for  users" class="btn btn-default">Activate</button>';
      $active_state = '<i class="fa fa-times fa-2x"> </i> <b>Not active</b>';
      $online_indicator = '<font class="fa fa-circle" color="grey"></font>';
       }
    else {
    $state_echo = '<button type="button" onclick="activate('.$course_id.', 0)" id="act-state-'.$course_id.'" title="Click to deactivate '.$course_title.' for  users" class="btn btn-default">Deactivate</button>';
    $active_state = '<i class="fa fa-check fa-2x"> </i> <b>Active</b>';
      $online_indicator = '<font class="fa fa-circle" color="#3399ff"></font>';
      }
    $query= mysqli_query($mysqli, "SELECT * from odoma where subid ='$course_id'");
    $row = $query->num_rows;
 
   //echo table row for user details
     
   echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-panel-spacing" id="row-'.$course_id.'">
    <div class="panel panel-info">
        <div class="panel-heading panel-header-height">
            <h4><span id="c_code-'.$course_id.'">'.$course_code.'</span><span id="live-'.$course_id.'" class="pull-right">'.$online_indicator.'</span></h4>
        </div>
        <div class="panel-body panel-course-body">
            <p class="p-course-name" id="c_title-'.$course_id.'">'.$course_title.'</p>
            <p class="panel-body-text"><span class="pull-left"><i class="fa fa-clock-o fa-2x"></i> <b><span id="c_dur-'.$course_id.'">'.$duration.'</span> mins</b> </span>
                <i class="fa fa-question-circle fa-2x"></i> <b>'.$row.'</b>
        </div>
        <div class="panel-footer">
            '.$state_echo.'
        <div class="pull-right">
            <span style="display:none" id="c_inst-'.$course_id.'">'.$inst.'</span>
            <div class="btn-group">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#viewModal"><span class="fa fa-expand"></span></button>
            <button type="button" id="plus-'.$course_id.'" onclick="setCourse(\'01\', '.$course_id.')" class="btn btn-default"><span class="fa fa-plus"></span></button>
            <button type="button" class="btn btn-default" onclick = "getInfo('.$course_id.')" data-toggle="modal" data-target="#editModal"><span class="fa fa-edit"></span></button>
            <button type="button" class="btn btn-default" onclick="delConfirm(2, '.$course_id.', \''.$course_code.'\')" data-toggle="modal" data-target="#delModal"><span class="fa fa-trash"></span></button>
            </div>
        </div>
        </div>
    </div>
</div>';
      $no++;
}

?>
</div></div>
<?php include "course_modal.php"; ?>

<script type="text/javascript">
  ClassicEditor
    .create( document.querySelector( '#instruction' ) )
    .then( newEditor => {
        editor = newEditor;
    } )
    .catch( error => {
        console.error( error );
    } );

function addCourse(){
     var title = $('#course_title').val();
     var code = $('#course_code').val();
     var dur = $('#duration').val();
     var inst = editor.getData();

     if(title == "" || code == "" || dur == "" || inst == ""){
     document.getElementById('add-feed').style.display = "block";
     $('#add-feed').html("All input field must be filled");
     return;
     }
     else{
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('add-feed').style.display = "block";
                $('#add-feed').html(this.responseText + "<br>Click on refresh if the new course is not showing on courses list!");
                counter(1);
            }
        };
        xmlhttp.open("GET","add.php?add_course=1&title="+title+"&code="+code+"&dur="+dur+"&inst="+inst,true);
        xmlhttp.send();}
}

function getInfo(cid){
  $('#cname').val($('#c_title-'+cid).html());
  $('#code').val($('#c_code-'+cid).html());
  $('#edit-feed').html('Update ' + $('#c_code-'+cid).html()+"'s information");
  $('#cdur').val($('#c_dur-'+cid).html());
  //var prev = $('#inst').attr('class');
  //$('#inst').removeClass(prev).addClass('textarea');
  var ojo = ojo+cid;
  $('#inst').html($('#c_inst-'+cid).html());
  
  
  $('#edit-submit').html('<button type="button" id="update-btn" onclick="editCourse('+cid+')" class="btn btn-primary pull-right" style="margin-right: 15px;">Update</button>');

/*ClassicEditor
    .create( document.querySelector( '.textarea' ) )
    .then( newEditor => {
        ojo = newEditor;
    } )
    .catch( error => {
        console.error( error );
    } );
*/
} 

function editCourse(cid){   
  $('#update-btn').html("<i class='fa fa-circle-o-notch fa-spin'></i>");   
  var code = $('#code').val();
  var inst = ojo+cid.getData();
  var dur = $('#cdur').val();
  var subname = $('#cname').val();
  alert (inst);
  if(code == ""){
  $('#edit-feed').html("<p class='alert-warning' style='padding:5px; text-align:center;'>You have not entered course code</p>");
  document.course_edit.code.focus();
  $("#update-btn").html("Update");
  return false;
  }
  if(dur == "")
  {
    $('#edit-feed').html("<p class='alert-warning' style='padding:5px; text-align:center;'>You cannot leave duration empty</p>");
  document.course_edit.cdur.focus();
        $("#update-btn").html("Update");
  return false;
  }
  if(subname == "")
  {
    $('#edit-feed').html("<p class='alert-warning' style='padding:5px; text-align:center;'>You cannot leave course title empty</p>");
  document.course_edit.cname.focus();
        $("#update-btn").html("Update");
  return false;
  } 
    $.post("edit_course.php",
    {
        cid : str,
        code : code,
        inst : inst,
        dur : dur,
        subname : subname
    },
  function(data, status){
      $('#edit-feed').html(data);
      $('#update-btn').removeClass('btn-primary').addClass('btn-success').html("<i class='fa fa-check'></i>");
      });
    }
    
</script>

