<?php require "verify.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CASOR CBT System</title>
    
    <link rel="shortcut icon" href="images/website.png">

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/addstyle.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link href="admin/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />

 <style>
 
    html, body{
            min-height:100% !important;
            background: url('images/cbt1.jpg') 0 0 no-repeat !important; 
            background-size: cover !important;
    }
    
    @media (max-width:769px){
            .panel{
            width: 70% !important;
            margin: 15% !important;
            }
    }
    
    </style>

  </head>
  <body>
        
      <div class="col-md-3 col-sm-3 col-xs-hidden">&nbsp;</div>  
    
      <div class="col-md-6 col-sm-6" id="accessForm">
         
         <?php require 'login.php'; ?>

    </div>
          
    <div class="col-md-3 col-sm-3 col-xs-hidden">&nbsp;</div>
   
        
</body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/add.js"></script>
    
    <script>function getRegister() {
      
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            
                document.getElementById("accessForm").innerHTML = this.responseText;
              
            }
        };
        xmlhttp.open("GET","register.php?register",true);
        xmlhttp.send();
        
    } 

    function getLogin() {
      
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            
                document.getElementById("accessForm").innerHTML = this.responseText;
              
            }
        };
        xmlhttp.open("GET","login.php?login",true);
        xmlhttp.send();
        
    } 
    function logout(id){$('.logmeout').html("<span class='fa fa-spinner fa-spin'></span>");if (window.XMLHttpRequest) {xmlhttp = new XMLHttpRequest();} else {xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}xmlhttp.onreadystatechange = function() {if (this.readyState == 4 && this.status == 200) {$(".alert").html("You can now log in!");
$('#logmeout').remove();
$('.username').prepend('<div class="form-group"><label for="email">Verify Email</label><input class="form-control" placeholder="Verify Email"  type="text" id="email"  name="email"/></div>');
}};xmlhttp.open("GET","logout.php?uid="+id,true);xmlhttp.send();}
    
    function register() {
var fname = document.reg_form.fstname.value;
var lname = document.reg_form.lstname.value;
var dept = document.reg_form.department.value
var phone = document.reg_form.phone_num.value
var email = document.reg_form.email.value
var user = document.reg_form.username.value
var pass1 = document.reg_form.psword.value
var pass2 = document.reg_form.pw2.value
    if (fname == "" || lname == "" || dept == "" || phone == "" || email == "" || user == "" || pass1 == "" || pass2 == "") {
      document.getElementById('error_log').innerHTML = "<p class='alert-warning' style='padding:5px; text-align:center;'>Please make sure all input spaces are filled</p>";
      document.getElementById('error_log').focus();
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

              var feedback = this.responseText;
              if(feedback == 2){

                document.getElementById("error_log").innerHTML = "<p class='alert alert-default' style= text-align:center; padding:7px;'> Your registration was successful. Login with your username and password to get started </p>";
                document.getElementById("reg_form").style.display = "none";
                document.getElementById("reg_btn").style.display = "none";
              }
              else{
                document.getElementById("error_log").innerHTML = this.responseText;
              }
            }
        };
        
        xmlhttp.open("POST", "verify.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("register&fname="+fname+"&lname="+lname+"&dept="+dept+"&phone="+phone+"&email="+email+"&pass1="+pass1+"&pass2="+pass2+"&user="+user);
        }

    } 
    
    </script>

</html>