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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Surf | Admin</title>

  <!-- Favicons 
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!--<link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">-->
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <!--<script src="lib/chart-master/Chart.js"></script>-->
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/addstyle.css">

  <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>-->
  <link rel="stylesheet" type="text/css" href="../datatables/css/dataTables.bootstrap.min.css"/>
  <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
  <script type="text/javascript" src="../ckeditor5/ckeditor.js"></script>
 
</head>

<body onload="counter(1)">
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="#dashboard" onclick="display(0)" class="logo"><b>Hoop<font color="orange">.</font><span style="text-transform: lowercase;">ng</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="admin_new.php#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">1</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 1 pending tasks</p>
              </li>
              <li>
                <a href="admin_new.php#">
                  <div class="task-info">
                    <div class="desc">Coming soon...</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="admin_new.php#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">1</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 1 new messages</p>
              </li>
              <li>
                <a href="admin_new.php#">
                  <span class="photo"><img alt="avatar" src="img/ui-zac.jpg"></span>
                  <span class="subject">
                  <span class="from">Amb. Kato</span>
                  <span class="time">2 hrs.</span>
                  </span>
                  <span class="message">
                  Enjoying the admin panel?
                  </span>
                  </a>
              </li>
              
              <li>
                <a href="admin_new.php#">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="admin_new.php#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">3</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 3 new notifications</p>
              </li>
              <li>
                <a href="admin_new.php#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Coming soon...
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="admin_new.php#">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span>
                  Jesus loves you...
                  <span class="small italic">Just now</span>
                  </a>
              </li>
              <li>
                <a href="admin_new.php#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Call me if there's a challenge.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="admin_new.php#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php"><i class="fa fa-sign-out"> </i> &nbsp;Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="#"><img src="img/admin.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered"><i class="fa fa-circle" style="color:green"> &nbsp;</i> <?php echo $admin_name; ?></span></h5>
          <li class="mt">
            <a class="active" href="#dashboard" onclick="display(0)">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="mt">
               <a href="#students" onclick="display(2)" name="students"><i class="fa fa-users" aria-hidden="true"></i> <span>Students</span> <span style="margin-right: 10px !important;" class="badge bg-theme pull-right" id="student-count"></span>
              </a>
            </li>
          <li class="mt"><a href="#courses" onclick="display(1)"><i class="fa fa-book" aria-hidden="true"></i> <span>Courses</span> &nbsp; 
                <span style="margin-right: 10px !important;" class="badge bg-theme pull-right" id="course-count"></span> &nbsp;</a></li>

                <li class="mt"><a href="#questions" onclick="display(3)"><i class="fa fa-question-circle" aria-hidden="true"></i> <span>Questions</span></a></li>

                <li class="mt"><a href="#add_questions" onclick="display(4)"><i class="fa fa-plus-circle" aria-hidden="true"></i> <span>Add Questions</span></a></li>

                <li class="mt"><a href="#results" onclick="display(6)"> <i class="fa fa-certificate"></i> <span>Results</span> <span style="margin-right: 10px !important; font-size: 10px !important" class="badge bg-theme pull-right" id="result-count"></span> &nbsp;</a></li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12 main-chart">
            <div class="display-height">
    <?php     
    require "dashboard_title.php";
?>
    <div class="panel panel-default" style="min-height: 100% !important">
    <div class="panel-heading"><h4 class="panel-title" id="panel-title"><?php echo $panel_title; ?></h4></div>
    <div class="container panel-body" id="display-point" style="padding:10px; width: 100%;">

<?php require 'dashadmin.php'; ?>

</div>
</div>
</div>    <!--footer start-->  

            <footer id="thefoot">
              <div class="pull-left"><b>Copyright</b> &copy; 2019 Relief Web Solutions</div>
              <div class="pull-right"><b>Surf CBT Admin system</b></div>

        <a href="admin_new.php#" class="go-top">
          <i class="fa fa-angle-up fa-3x go-top-bg"></i>
          </a>

            </footer>
   
    <!--footer end-->
</div>
</div>
</section>
</section>
    <!--main content end-->

  </section>

<?php require "script.php"; ?>
 
</body>

</html>
