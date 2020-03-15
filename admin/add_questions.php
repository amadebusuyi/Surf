<?php require "../link.php"; ?>
<div class="panel-min-height2">
<?php if(!isset($_POST['set_course'])){

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
    echo '</select>&nbsp; &nbsp;<button type="button" onclick="setCourse(\'001\')" class="btn btn-danger set-button">Set</button></p></form>';
}

   //this is to get selected course to which questions will be added.

    if(isset($_POST['set_course'])){
      $course_val = $_POST['set_course'];
      if ($course_val != ""){

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
      $active_course = $courses['subcode'];
    echo '<option value="'.$course_id.'" selected>'.$courses["subcode"].'</option>';
  }
  else{
    echo '<option value="'.$course_id.'">'.$courses["subcode"].'</option>';
  }
}
   echo '</select>&nbsp; &nbsp;<button type="button" onclick="setCourse(\'001\')" class="btn btn-danger set-button">Set</button></p></form>';

    $query = mysqli_query($mysqli, "SELECT * from odoma WHERE subid='$course_val'");
    $qnum = $query->num_rows;
    $qnum =$qnum+1;
    
       echo ' <form action="" method="post" name="qform">        
          <p class="alert alert-default">Fill the form below to add questions to '.$active_course.'</p>
          <p>
            <label>Question Number</label>
            <input type="number" name="questnum" id="qnum" value="'.$qnum.'" disabled />
          </p>

          <p id="error_log"></p>
          
           <div class="form-group">
              <label for="question">Question</label>
              <textarea class="form-control" rows="10" placeholder="Enter question here" type="text" id="question" name="question"></textarea>
            </div>

            <div style="display:none;" class="form-group">
              <label for="subid">Subid</label>
              <input class="form-control" placeholder="Subid" type="number" id="subid" name="subid" value="'.$course_val.'"/>
            </div>
          
          <div class="form-group col-md-6">
              <label for="choice1">Option A</label>
              <textarea class="form-control" placeholder="Choice Option 1" type="text" id="choice1" name="choice1"></textarea>
            </div>

            <div class="form-group col-md-6">
              <label for="choice2">Option B</label>
              <textarea class="form-control" placeholder="Choice Option 2" type="text" id="choice2" name="choice2"></textarea>
            </div>
            <div class="form-group col-md-6">
              <label for="choice3">Option C</label>
              <textarea class="form-control" placeholder="Choice Option 3" type="text" id="choice3" name="choice3"></textarea>
            </div>
            <div class="form-group col-md-6">
              <label for="choice4">Option D</label>
              <textarea class="form-control" placeholder="Choice Option 4" type="text" id="choice4" name="choice4"></textarea>
            </div>
          
          <div class="form-group col-md-6">
              <label for="choice5">Option E</label>
              <textarea class="form-control" placeholder="Choice Option 5" type="text" id="choice5" name="choice5"></textarea>
            </div>
            <div class="col-md-3" style="margin-top:25px;">
            <select name="correct_choice" id="correct_choice" class="btn btn-warning">
                <option value="">Select correct choice</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select></div>

          <div class="col-md-3" style="margin-top:25px;">
              <button type="button" class="btn btn-success" id="add-button">Add Question</button>
          </div>
        </form>';
    }
    else{
      echo "No course selected. Refresh this page and select a course"; 
    }
  }
  ?>
</div>
    <script>

   let editor;

ClassicEditor
    .create( document.querySelector( '#question' ) )
    .then( newEditor => {
        editor1 = newEditor;
    } )
    .catch( error => {
        console.error( error );
    } );

ClassicEditor
    .create( document.querySelector( '#choice1' ) )
    .then( newEditor => {
        editor2 = newEditor;
    } )
    .catch( error => {
        console.error( error );
    } );

ClassicEditor
    .create( document.querySelector( '#choice2' ) )
    .then( newEditor => {
        editor3 = newEditor;

    } )
    .catch( error => {
        console.error( error );
    } );

ClassicEditor
    .create( document.querySelector( '#choice3' ) )
    .then( newEditor => {
        editor4 = newEditor;

    } )
    .catch( error => {
        console.error( error );
    } );

ClassicEditor
    .create( document.querySelector( '#choice4' ) )
    .then( newEditor => {
        editor5 = newEditor;

    } )
    .catch( error => {
        console.error( error );
    } );

ClassicEditor
    .create( document.querySelector( '#choice5' ) )
    .then( newEditor => {
        editor6 = newEditor;

    } )
    .catch( error => {
        console.error( error );
    } );

// Assuming there is a <button id="submit">Submit</button> in your application.

 document.querySelector('#add-button').addEventListener( 'click', () => {
    var a = editor1.getData();
    $('#question').val(a);
    var b = editor2.getData();
    $('#choice1').val(b);
    var c = editor3.getData();
    $('#choice2').val(c);
    var d = editor4.getData();
    $('#choice3').val(d);
    var e = editor5.getData();
    $('#choice4').val(e);
    var f = editor6.getData();
    $('#choice5').val(f);
    var id = $('#subid').val();
    addQuestion(id);
} );

</script>