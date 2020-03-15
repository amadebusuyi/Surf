<?php 
require ("../link.php");
session_start();
if(isset($_SESSION['admin'])){
  header('Location:admin_new.php');
}
?>
<?php 
//Get admin login details from admin login
    if(isset($_POST['admin_login'])){
    $admin = $_POST['admin_login'];
    $pass = $_POST['admin_pass'];

    //Verify admin details from database
    $query = "SELECT * FROM gbile WHERE admin_name ='$admin' and admin_pass ='$pass' ";
    $result = $mysqli->query($query);
    $rows = $result->num_rows;
    if($rows){
      $fetch = $result->fetch_assoc();
      $admin = $fetch['admin_name'];
      $_SESSION['admin']=$admin;
      header('Location:admin_new.php');
    }
    else {
      $error= "<p class='alert-danger'>Administrative Access Denied!</p>";
    }
  }
  else {}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Admin Login - Surf </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>

<body>
<?php
//include("header.php");
?>
    <main>
     
    <div class="panel panel-danger" style="width:300px;margin-top: 10%; margin-left: 38%;">
      <div class="panel-heading"><font><span style="margin-top: 10px; margin-right:20px;" class="glyphicon glyphicon-lock pull-right"></span>
        <h4> Admin Verification </h4></font></div>
      <form method="post" name="admin_form" onsubmit="return loginAccess()" action="">
        <div class="panel-body">
          <p id="error"><?php if(isset($error)){echo $error;} ?></p><!-- stopping point, trying to fix login error handlers-->
            <div class="form-group">
                <label for="admin_login">Admin login</label>
                <input class="form-control" placeholder="cklick me" type="text" id="userName"  name="admin_login"/>
              </div>

              <div class="form-group">
                <label for="admin_pass">Security Key</label>
                <input class="form-control" placeholder="cklick me" type="password" id="password"  name="admin_pass"/>
              </div> 
        </div>
        <div class="panel-footer">
                  <input class="btn btn-danger" style="font-weight: bold;" type="submit" name="submit" value="Enter Admin Panel">
        </div>
      </form>
    </div>
    </main>
<script type="text/javascript">
  function loginAccess(){
    if(document.admin_form.admin_login.value==''){
      document.getElementById('error').innerHTML = '<p class="alert-danger">Admin name cannot be empty!</p>';
      document.admin_form.admin_login.focus();
      return false;
    }
    else{
      return true;
    }
  }
</script></body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/jquery-1.11.3-jquery.min.js"></script>
    <script src="../js/add.js"></script>

</html>
