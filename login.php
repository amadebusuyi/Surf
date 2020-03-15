    <!-- Sign in form goes here -->
    <div class="panel panel-primary" style="margin-top:18%; margin-left:15%; width:70%;">
      <div class="panel-heading"><font><span style="margin-top: 10px; margin-right:20px;" class="glyphicon glyphicon-lock pull-right"></span>
        <h4> Login to CASOR CBT System </h4></font></div>
      <form method="post" name="login_form" onsubmit="return access()" action="">
        <div class="panel-body">
          <p id="error"><?php if(isset($error)){echo $error;} ?></p><!-- stopping point, trying to fix login error handlers-->
                  <div class="form-group username">
                    <label for="userName">Username</label>
                    <input class="form-control" placeholder="Username"  type="text" id="userName"  name="username"/>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" placeholder="Password"  type="password" id="password"  name="psword"/>
                  </div>
                  <div class="pull-left" style="margin-top:15px;">
                    <input type="submit" value="Login" class="btn btn-primary" name="login"/>
                  </div>

        </div>
        </form>
        <div class="panel-footer alert-success">
                  <span>Not yet registered?</span> <span onclick="getRegister()" class="btn btn-success pull-right" style="margin-top:-7px !important;">Register</span>
        </div>
                
    </div>