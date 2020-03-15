
    <!-- Registration form goes here -->
            <div class="panel panel-success" style="margin-top: 15%; margin-bottom: 15%">
              <div class="panel-heading">
                <font><span style="margin-top: 10px; margin-right:20px;" class="glyphicon glyphicon-edit pull-right"></span>
        <h4> Register on Surf </h4></font>
              </div>
               <div class="panel-body container" style="width: 100% !important; margin-bottom: 20px !important;">
                <p id="error_log">
                <?php if(isset($reg_error)){echo $reg_error;} ?></p>

                <form name="reg_form" id="reg_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              
              <div class="col-md-6"><br>
                  <div class="fname">
                    <label for="firstName">First Name</label>
                    <input class="form-control" placeholder="First Name"  type="text" id="firstName"  name="fstname"/>
                  </div>
<br>
                  <div class="lname">
                    <label for="lastName">Surname</label>
                    <input class="form-control" placeholder="Surname"  type="text" id="lastName"  name="lstname"/>
                  </div>
<br>
                  <div class="dept">
                    <label for="department">Department</label>
                    <input class="form-control" placeholder="Department"  type="text" id="department"  name="department"/>
                  </div><br>
                  <div class="phone">
                    <label for="phone_num">Phone Number</label>
                    <input class="form-control" placeholder="Phone number"  type="text" id="phone_num"  name="phone_num"/>
                  </div>
              </div><br>
              <div class="col-md-6">
                  <div class="email">
                    <label for="email">Email</label>
                    <input class="form-control" placeholder="Email"  type="email" id="email"  name="email"/>
                  </div><br>
                  <div class="user">
                    <label for="userName">Username</label>
                    <input class="form-control" placeholder="Username"  type="text" id="userName"  name="username"/>
                  </div>
<br>
                  <div class="pw">
                    <label for="pass">Password</label>
                    <input class="form-control" placeholder="Password" onkeyup="return passLength()" type="password" id="pass"  name="psword"/>
                  </div><br>
                  <div class="pw">
                    <label for="cpass">Repeat Password</label>
                    <input class="form-control" placeholder="Repeat Password" onkeyup="return passCheck()" type="password" id="cpass"  name="pw2"/>
                  </div>
              </div>
            </form>
                </div>
                
           <div class="panel-footer">
                  <button type="button" id="reg_btn" class="btn btn-success pull-right" onclick="register()" onmousedown="return check()">Register</button>
                  <button type="button" id="log_btn" class="btn btn-primary" onclick="getLogin()">Login</button>
            </div>
              </div>