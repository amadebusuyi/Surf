<?php 
	include ('../link.php');
  session_start();
?>
<?php 
//getting logged in admin
  if(!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

	$admin_name = $_SESSION['admin'];
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Surf</title>

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/addstyle.css">

    <script src="../js/add.js"></script>
    
  </head>
  <body onload="counter(1)">
    <div class="container-fluid display-table">
      <div class="row display-table-row">
        <!-- Side bar-->
        <div class="col-md-2 col-sm-1 col-xs-1  hidden-xs display-table-cell valign-top" id="side_menu">
          <h1 class="hidden-sm hidden-xs">NAVIGATION</h1>
          <ul>
            <li class="link active">
              <a href="admin_panel.php">
                <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Dashboard</span>
              </a>
            </li>

            <li class="link">
               <a href="#students" onclick="display(2)" name="students"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Students</span>
                <span class="label label-success pull-right hidden-sm hidden-xs"><span id="online-count"></span><span id="student-count"></span></span>
              </a>
            </li>

            <li class="link">
              <a href="#collapse-post-exam" data-toggle="collapse" aria-controls="collapse-post-exam" aria-expanded="false">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Exams</span>

              </a>
              <ul class="collapse collapseable" id="collapse-post-exam">
                <li><a href="#courses" onclick="display(1)">Courses &nbsp; 
                <span class="label label-success pull-right hidden-sm hidden-xs" id="course-count"></span></a></li>

                <li><a href="#questions" onclick="display(3)">Questions <span class="label glyphicon-plus pull-right hidden-sm hidden-xs"></span></a></li>

                <li><a href="#add_questions" onclick="display(4)">Add questions <span class="label glyphicon-plus pull-right hidden-sm hidden-xs"></span></a></li>

                <li><a href="#active" onclick="display(5)" name="active">Active Exams <span id="active-count" class="label label-success pull-right hidden-sm hidden-xs"></span></a></li>
                <li><a href="#results" onclick="display(6)">Results <span class="label label-success pull-right hidden-sm hidden-xs" id="result-count"></span></a></li>
                
              </ul>
            </li>

            <li class="link settings_button">
              <a href="#">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Settings</span>
              </a>
            </li>
          </ul> 
        </div>
        <!--content bar-->
        <div class="col-md-8 col-sm-11 col-xs-11 display-table-cell  valign-top">
          <div  class="row">
            <header id="navhead" class="clearfix">
              <div class="col-md-5">
                <nav class="navbar-default pull-left">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side_menu">
                    <span class="sr-only"> Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </nav>
                <input type="text" class="hidden-sm hidden-xs" id="search_space" name="admin_search" placeholder="search">
              </div>
              <div class="col-md-7">
                <ul class="pull-right">
                  <li id="welmessage"  class="hidden-xs">Hello <?php echo $admin_name; ?></li>
                  <li class="fixed_width">
                   <a href="#"> 
                      <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
                      <span class="label label-warning">3</span>
                    </a>
                  </li>
                  <li class="fixed_width">
                   <a href="#"> 
                      <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                      <span class="label label-message">3</span>
                    </a>
                  </li>
                  <li>
                   <a href="logout.php" class="logout"> 
                      <span class="glyphicon glyphicon-log-out" aria-hidden="true"> logout</span>
                    </a>
                  </li>
                </ul>
              </div>
            </header>
          </div>
 <?php     
    require "dashboard_title.php";
?>
    <div class="panel panel-primary">
    <div class="panel-heading"><h4 class="panel-title" id="panel-title"><?php echo $panel_title; ?></h4></div>

    <div class="container panel-body" id="display-point" style="padding:10px; width: 100%;">


<!-- Course activation and deactivation feedback Message posting goes here  -->
<?php 
if(isset($_POST['activate_course'])){
echo $_SESSION['act'];
echo $_SESSION['deact'];
}

//Adding files to database
require "add.php";

// DATABASE Deletions goes here  
require "delete.php";

//Getting available results from result database....
//Getting available results from result database....
//Getting available results from result database....
  if(isset($_GET['results'])){
    require "results.php";
}

    //adding questions to the database

    else if(isset($_GET['add_questions'])){
      require "add_questions.php";
  }

    else if(isset($_GET['questions'])){
      require "questions.php";
  }

  else if(isset($_GET['edit_course'])){
      require "edit_course.php";
  }

  else if(isset($_GET['edit_question'])){
      require "edit_question.php";
  }

  else if(isset($_GET['edit_student'])){
      require "edit_student.php";
  }

    else{
      require 'dashadmin.php';
    }

?>

</div>
</div>
  <br><br>
          <div class="row">
            <footer id="thefoot">
              <div class="pull-left"><b>Copyright</b> &copy; 2019 Relief Web Solutions</div>
              <div class="pull-right"><b>Surf CBT Admin system</b></div>
            </footer>
          </div>
        </div>
      </div>
      </div>
  </body>

<?php require "script.php"; ?>

</html>