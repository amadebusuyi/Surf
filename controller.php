<?php 
if(isset($_GET['test'])){
  require "test.php";
}

//This line of code handles, the processing of users selections and adding of score value to database for scoring.

 elseif(isset($_POST['que_ans'])){
      require "check.php";
}
//ends here
  
// This is to display active exams.-->

  else{
   require "exam.php";
}
?>