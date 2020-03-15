<!-- DATABASE insertions starts here -->

<?php      
  include ('../link.php');
  include 'functions.php';
      
      //Inserting Students details into database from the admin-->

			if (isset($_POST['adlog'])) {
    		$fstname = trim($_POST['fstname']);
    		$fstname = strip_tags($fstname);
			$fstname = htmlspecialchars($fstname);
    		$lstname = trim($_POST['lstname']);
    		$lstname = strip_tags($lstname);
			$lstname = htmlspecialchars($lstname);
    		$username = trim($_POST['username']);
    		$username = strip_tags($username);
			$username = htmlspecialchars($username);
    		$psword = trim($_POST['psword']);
    		$psword = strip_tags($psword);
			$psword = htmlspecialchars($psword);
      $psword = pass($psword);
    		$department = $_POST['department'];
    		$phone_num = $_POST['phone_num'];
    		$email = trim($_POST['email']);
    		$email = strip_tags($email);
			$email = htmlspecialchars($email);
    			
			if (empty($fstname && $lstname && $username && $psword && $department && $phone_num && $email)) {
				echo  '<p class="alert alert-danger"><strong>Please make sure all fields are filled carefully, by:<br/> 1.) providing the correct names, and other information <br/> 2.) Making sure names contains alphabets and space only<br/> thanks.</strong></p>';
			}elseif (!preg_match("/^[a-zA-Z]+$/", $fstname)) {
				echo "<p style='color:red;'>Name must contain</p>";
			}
			else{
    			$adq = mysqli_query($mysqli, "INSERT INTO arome(fname, lname, user, pass, dept, phone, email) VALUES ('$fstname','$lstname', '$username', '$psword', '$department', '$phone_num', '$email')");

    			if ($adq) {
    				echo '<p class="alert alert-success">Student enrolled successfully</p>';
    			}
    		}

    		}

//Inserting Courses into database

        if (isset($_GET['add_course'])) {

        $course_title = $_GET['title'];
        $course_title = singleQuote($course_title);
        $course_code = $_GET['code'];
        $instruction = $_GET['inst'];
        $instruction = singleQuote($instruction);
        $duration = $_GET['dur'];
        
        $check = mysqli_query($mysqli, "SELECT * from babs where subcode = '$course_code'");
        $row = $check->num_rows;
        if($row < 1){
          $acheck = "INSERT INTO babs(subname, instruction, duration, subcode) VALUES ('$course_title','$instruction', '$duration', '$course_code')";
          $ad = mysqli_query($mysqli, $acheck);

          if ($ad) {
          echo '<p class="alert alert-success">'. $course_code.' added successfully!</p>';
          
        }
        else{
          echo '<p class="alert alert-danger">Failed to add course. Contact Web app manager for help</p>';
        }
        }
        else {
          echo "<p class='alert alert-info'>Sorry! A course with the code - <b>$course_code</b> already exist in the database.</p>";
        }
      }

//Adding questions to database

        if (isset($_POST['add_question'])) {

        $question = singleQuote($_POST['question']);
        $choice1 = singleQuote($_POST['choice1']);
        $choice2 = singleQuote($_POST['choice2']);
        $choice3 = singleQuote($_POST['choice3']);
        $choice4 = singleQuote($_POST['choice4']);
        $choice5 = singleQuote($_POST['choice5']);
        $subid = $_POST['subid'];
        $correct_choice = $_POST['correct_choice'];
        if(empty($choice1 && $choice2 && $subid && $question)){
          echo "<p class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <span>Unable to add question to database! Make sure you  fill all the spaces<br><span><small class='alert-warning'>If problem persist, contact  your  web manager.</small></p>";
        }
        
        else{
          $acheck = "INSERT INTO odoma(subid, qtext, ans1, ans2, ans3, ans4, ans5, ans) VALUES ('$subid','$question','$choice1','$choice2','$choice3','$choice4','$choice5' ,'$correct_choice')";
          $ad = mysqli_query($mysqli, $acheck);

          if ($ad) {
            echo "2";          
        }
           else{
          echo "1";
        }
        }
}
?>