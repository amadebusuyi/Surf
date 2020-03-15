<div class="panel-min-height">
<?php 

if(isset($_POST['updateQ'])){

require_once "../link.php";

	$qid = $_POST['qid'];
	$qtext = $_POST['qtext'];
	$ans1 = $_POST['ans1'];
	$ans2 = $_POST['ans2'];
	$ans3 = $_POST['ans3'];
	$ans4 = $_POST['ans4'];
	$ans5 = $_POST['ans5'];
	$ans = $_POST['ans'];

	$query =  mysqli_query($mysqli, "UPDATE odoma SET qtext = '$qtext', ans1 = '$ans1', ans2 = '$ans2', ans3 = '$ans3', ans4 = '$ans4', ans5 = '$ans5', ans = '$ans' WHERE qid = '$qid' ");
	if($query){
		$check = mysqli_query($mysqli, "SELECT subid from odoma where qid = $qid ");
		$res = $check->fetch_assoc();
		$subid = $res['subid'];
		echo 'Question updated succesfully';
	}
	else{
		echo '<p class="alert alert-danger"> Update failed! Try again or contact system administrator for help.</p>';
	}
}

if(isset($_GET['editForm'])){
	$qid = $_GET['qid'];

require_once "../link.php";

	if ($qid != ""){

	$query =  mysqli_query($mysqli, "SELECT * from odoma WHERE qid = $qid");

	$result = $query->fetch_assoc();
  $ans = $result['ans'];
  $a=""; $b=""; $c=""; $d=""; $e="";
  if($ans == "A"){
    $a = "selected";
  }
  elseif($ans == "B"){
    $b = "selected";
  }
  elseif($ans == "C"){
    $c = "selected";
  }
  elseif($ans == "D"){
    $d = "selected";
  }
  elseif($ans == "E"){
    $e = "selected";
  }

  $subid = $result['subid'];
  $fetch = mysqli_query($mysqli, "SELECT subcode from babs where subid = $subid");
  $check = $fetch->fetch_assoc();
  $subname = $check['subcode'];

	echo '<form name="cform" action="" method="post">
  <p class="alert alert-info">Course Code of Question: '.$subname.' <button style="margin-top: -7px;" type="button" class="btn btn-default pull-right" onclick="setCourse(0)"><i class="fa fa-arrow-left"></i> Back</button></p>
  <div class="form-group col-md-12">
  <input type="number" name="course_id" value="'.$subid.'" class="hidden">
    <label for="qtext">Question:</label>
    <textarea type="text" class="form-control" rows="3" id="qtext" name="qtext">'.$result['qtext'].'</textarea>
  </div>
  
   <input type="text" style="display:none;" id="qid" name="qid" value="'.$qid.'">

  <div class="form-group col-md-6">
    <label for="ans1">Option A:</label>
    <textarea class="form-control input-lg" id="ans1" name="ans1">'.$result['ans1'].'</textarea>
  </div>
  
  <div class="form-group col-md-6">
    <label for="ans2">Option B:</label>
    <textarea class="form-control input-lg" id="ans2" name="ans2">'.$result['ans2'].'</textarea>
  </div>
  
  <div class="form-group col-md-6">
    <label for="ans3">Option C:</label>
    <textarea class="form-control input-lg" id="ans3" name="ans3">'.$result['ans3'].'</textarea>
  </div>
  
  <div class="form-group col-md-6">
    <label for="ans4">Option D:</label>
    <textarea class="form-control input-lg" id="ans4" name="ans4">'.$result['ans4'].'</textarea>
  </div>
  
  <div class="form-group col-md-6">
    <label for="ans5">Option E:</label>
    <textarea class="form-control input-lg" id="ans5" name="ans5">'.$result['ans5'].'</textarea>
  </div>
  
  <div class="form-group col-md-6">
    <label for="ans">Correct Option:</label>
    <select type="text" class="form-control input-lg" id="ans" name="ans">
    <option value="A" '.$a.'>A</option>
    <option value="B" '.$b.'>B</option>
    <option value="C" '.$c.'>C</option>
    <option value="D" '.$d.'>D</option>
    <option value="E" '.$e.'>E</option>
    </select>
  </div>

  <div class="col-md-6 pull-right"><button type="button" style="margin-top:10px;" name="editQ-button" id="editQ-button" class="btn btn-success btn-lg pull-right">Update</button></div>
</form>';

	}

	else{
		echo "<p class='alert alert-danger'>Oops! The page you requested for is not found, click <a href='admin_panel.php?courses'><span color='blue'>here</span></a> to return to courses</p>";
	}
}

?>
</div>

<script type="text/javascript">
  
  ClassicEditor
    .create( document.querySelector( '#qtext' ) )
    .then( newEditor => {
        qedit1 = newEditor;
    } )
    .catch( error => {
        console.error( error );
    } );

ClassicEditor
    .create( document.querySelector( '#ans1' ) )
    .then( newEditor => {
        qedit2 = newEditor;
    } )
    .catch( error => {
        console.error( error );
    } );

ClassicEditor
    .create( document.querySelector( '#ans2' ) )
    .then( newEditor => {
        qedit3 = newEditor;

    } )
    .catch( error => {
        console.error( error );
    } );

ClassicEditor
    .create( document.querySelector( '#ans3' ) )
    .then( newEditor => {
        qedit4 = newEditor;

    } )
    .catch( error => {
        console.error( error );
    } );

ClassicEditor
    .create( document.querySelector( '#ans4' ) )
    .then( newEditor => {
        qedit5 = newEditor;

    } )
    .catch( error => {
        console.error( error );
    } );

ClassicEditor
    .create( document.querySelector( '#ans5' ) )
    .then( newEditor => {
        qedit6 = newEditor;

    } )
    .catch( error => {
        console.error( error );
    } );

// Assuming there is a <button id="submit">Submit</button> in your application.

  document.querySelector('#editQ-button').addEventListener( 'click', () => {
    var a = qedit1.getData();
    $('#qtext').val(a);
    var b = qedit2.getData();
    $('#ans1').val(b);
    var c = qedit3.getData();
    $('#ans2').val(c);
    var d = qedit4.getData();
    $('#ans3').val(d);
    var e = qedit5.getData();
    $('#ans4').val(e);
    var f = qedit6.getData();
    $('#ans5').val(f);
    var qid = $('#qid').val();
    var ans = $('#ans').val();
    alert(f);
    
    $.post("edit_question.php", {
      updateQ : true,
      qid : qid,
      qtext: a,
      ans1 : b,
      ans2 : c,
      ans3 : d,
      ans4 : e,
      ans5 : f,
      ans : ans
    } function(data, status){
      alert(data);
    });
} );

</script>