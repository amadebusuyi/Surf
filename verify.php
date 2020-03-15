<?php 
  require ('link.php');
?>
<?php 

session_start(); 

function stripper($str){
   $str = trim($str);
  $str = strip_tags($str);
  $str = htmlspecialchars($str);
  $str = stripslashes($str);
  $str = stripcslashes($str);
  return $str;
}

function pass($str){
  $str = md5($str);
  $str = "walekato".$str;
  $str = hash('ripemd128', $str);
  return $str;
}

 if (isset($_POST['register'])) {
        $fstname = stripper($_POST['fname']);

        $lstname = stripper($_POST['lname']);

        $username = stripper($_POST['user']);
        $username = strtolower($username);

        $pw1 = pass($_POST['pass1']);

        $pw2 = pass($_POST['pass2']);

        $dept = stripper($_POST['dept']);

        $phone = $_POST['phone'];

        $email = stripper($_POST['email']);

        //echo "Yea, I got here safely";

      //check database to see if the username and email is not taken
        $user_check = 0;
        $mail_check = 0;

        $query = mysqli_query($mysqli, "SELECT * from arome");
        $row = $query->num_rows;
        while ($check = $query->fetch_assoc()){
        $reguser = $check['user'];
        $regmail = $check['email'];
        $reguser = strtolower($reguser);

        if($reguser == $username){
        $user_check = 1;
        }

        if($regmail == $email){
          $mail_check = 1;
        }      
}

  if($user_check == 1){
          $rand = (mt_rand(10,999));
          $user_suggest = "$username"."$rand";
          echo "<p class='alert alert-instruction'>Sorry! Username already taken, try $user_suggest</p>";
        } 

  else { if($mail_check == 1){
          echo "<p class='alert alert-instruction'>Sorry! Email already taken, use another email</p>";
        }

  else { if (empty($fstname)) {
        echo  '<p class="alert alert-danger"><strong>Please make sure all fields are filled carefully, by:<br/> 1.) providing the correct names, and other information <br/> 2.) making sure names contains alphabets and space only.<br/> Thanks.</strong></p>';
        }

  else { if (!preg_match("/^[a-zA-Z]+$/", $fstname)) {
        echo "<p style='color:red;'>Name must contain only letters (number and characters not allowed)</p>";
        }
  else { if (!preg_match("/^[a-zA-Z]+$/", $lstname)) {
        echo "<p style='color:red;'>Name must contain only letters (number and characters not allowed)</p>";
        }

  else { if ($pw2!=$pw1){
          echo "Your password does not match";
        }

  else{
          $adcheck = "INSERT INTO arome (fname, lname, user, pass, dept, phone, email) VALUES ('$fstname','$lstname', '$username', '$pw1', '$dept', '$phone', '$email')";
          $adq = mysqli_query($mysqli, $adcheck);

          if ($adq) {
            echo 2;
          }

          else {
            echo "failed to store data";
          }
      }
      }
      }
      }
      }
      }
  }

if(isset($_SESSION['login'])){
  header('Location:home.php');
}
else{

  #login validation

    if(isset($_POST['login'])){
    $user = $_POST['username'];
    $user = strtolower($user);
    if (isset($_POST['email'])){
    $email = $_POST['email'];
  }
    $pw = pass($_POST['psword']);

    $query = mysqli_query($mysqli, "SELECT * from arome where user='$user'");
    $check = $query->fetch_assoc();
if($check){
    $loguser = $check['user'];
    $logmail = $check['email'];
    $regpw = $check['pass'];
    $regid = $check['id'];
      if($pw === $regpw){
        if($check['online']==1){
          $error = "<p class='alert alert-info'>You are currently logged in to this account on another system or browser. You must logout first before you can use another browser. <br/> <button class='btn btn-default' id='logmeout' onclick='logout($regid)' type='button'><span class='logmeout'>Log me out</span></button></p>";
        }
        else{
        $_SESSION['login'] = $regid;
        $query = mysqli_query($mysqli, "UPDATE arome set online=1 where id=$regid");
      header('Location:home.php');
    }
      }
      else{
        $error = "<p>Username or Password is not correct! Check username/password and try again or register</p>";
    }
  }
  else{
      $error = "<p>Username or Password is not correct! Check username/password and try again or register</p>";

      }
      
    }
  }

?>
