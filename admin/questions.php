<div class="panel-min-height2">
 <?php
 require "../link.php";
 if(!isset($_POST['set_course'])){
 echo '<form method="post" name="cform">
          <p>
          <p class="alert alert-success">The last added course is automatically selected, click on set to add questions to the  course selected. Choose by clicking on the select button.</p>
            <select class="btn btn-primary" name="course_id">
              ';

    //check resgistered courses in the database

    $query = "SELECT * FROM babs ORDER BY subid desc";
    $result = $mysqli->query($query);
    $no_courses = $result->num_rows;
    while ($courses = $result->fetch_assoc()){
    $course_title = $courses['subname'];
    $course_id = $courses['subid'];

    //set courses in select  button
    echo '<option value="'.$course_id.'">'.$courses["subcode"].'</option>';
    }
    echo '</select>&nbsp; &nbsp;<button type="button" onclick="setCourse(0)" class="btn btn-danger set-button">Set</button></p></form>';
}

else {
	if(isset($_POST['set_course'])){
      $course_val = $_POST['set_course'];
      if ($course_val != "null"){

    echo '<form method="post" name="cform">
          <p>
            <select class="btn btn-primary" name="course_id">
                ';

    $query = "SELECT * FROM babs";
    $result = $mysqli->query($query);
    while ($courses = $result->fetch_assoc()){
    $course_title = $courses['subname'];
    $course_id = $courses['subid'];
    if($course_id==$course_val){
    echo '<option value="'.$course_id.'" selected>'.$courses["subcode"].'</option>';
  }
  else{
    echo '<option value="'.$course_id.'">'.$courses["subcode"].'</option>';
  }
}
   echo '</select>&nbsp; &nbsp;<button type="button" onclick="setCourse(0)" class="btn btn-danger set-button">Set</button></p></form>';
   $query = mysqli_query($mysqli, "SELECT * from babs where subid = $course_val");
   $que = $query->fetch_assoc();
   $course_title = $que['subname'];
   $course_code = $que['subcode'];
   $course_id = $que['subid'];
echo '<table class="table">
	<thead><p class="alert alert-default">'.$course_title .' ('.$course_code.') 
	<span class="pull-right">
      <button type="button"  style="margin-top:-8px;" onclick="setCourse('.$course_id.')" class="btn btn-success">+ Add Question</button></span></p>
	<th>Question</th>
	<th>Option A</th>
	<th>Option B</th>
	<th>Option C</th>
	<th>Option D</th>
	<th>Option E</th>
	<th>Answer  </th>
	<th>Actions  </th></thead><tbody>';

   $query = mysqli_query($mysqli, "SELECT * from odoma where subid = $course_val");
   while($res = $query->fetch_assoc()){
     	echo '<tr id="row-'.$res['qid'].'">
		<td>'.$res['qtext'].'</td>
		<td>'.$res['ans1'].'</td>
		<td>'.$res['ans2'].'</td>
		<td>'.$res['ans3'].'</td>
		<td>'.$res['ans4'].'</td>
		<td>'.$res['ans5'].'</td>
		<td style="text-align:center;">'.$res['ans'].'</td>
		<td>
			<button type="button" onclick="qedit('.$res['qid'].')" class="btn btn-info" style="height:24px !important; width:24px !important; padding:2px;"><span class="glyphicon glyphicon-edit"></span></button>
			<button type="button" class="btn btn-danger" name="del_user" title="Delete result from database" onclick="delConfirm(4, '.$res["qid"].', \'this Question\')" data-toggle="modal" data-target="#myModal"><span class="fa fa-trash"></span></button>
		</td></tr>';}
	echo '</tbody></table>';
}
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
        <h4 class="modal-title" id="delete-title">Question delete...</h4>
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
    $('.table').DataTable();
} );

  function qedit(qid){
    if(qid !== ""){
        $('#display-point').html("<div class='loading-div'><div class='loading'>&nbsp;</div><div class='loading'>&nbsp;</div><div class='loading'>&nbsp;</div>");
      
        $.get("edit_question.php?editForm&qid="+qid, function(data, status){
        $('#display-point').html(data);
        $('#panel-title').text("Edit Course");
      });
    }
    else{ return false;}
  }

</script>