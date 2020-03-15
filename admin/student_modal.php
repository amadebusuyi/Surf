<div class="modal fade" tabindex="-1" id="addModal" data-keyboard="false" >
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times</button>
                <h4 class="modal-title">New Student Details</h4>
              </div>
            <form method="post" action="" name="reg_form" return>
              <div class="modal-body container" style="width:100% !important;">
          <div class= "col-md-6"> 
                  <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input class="form-control" placeholder="First Name"  type="text" id="firstname"  name="fstname"/>
                  </div>

                  <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input class="form-control" placeholder="Last Name"  type="text" id="lastname"  name="lstname"/>
                  </div>

                  <div class="form-group">
                    <label for="department">Department</label>
                    <input class="form-control" placeholder="Department"  type="text" id="department"  name="department"/>
                  </div>
                  <div class="form-group">
                    <label for="phone_num">Phone Number</label>
                    <input class="form-control" placeholder="Phone number"  type="text" id="phone"  name="phone"/>
                  </div>
          </div>
          <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" placeholder="Email"  type="email" id="email"  name="email"/>
                  </div>
                  <div class="form-group">
                    <label for="userName">Username</label>
                    <input class="form-control" placeholder="Username"  type="text" id="username"  name="username"/>
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" placeholder="Password"  type="password" id="pass"  name="psword"/>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" placeholder="Password"  type="password" id="cpass"  name="pw2"/>
                  </div>
          </div>
          </div>
            <div class="modal-footer">
                  <button type="button" class="btn btn-success" onclick="addStudent()" onmousedown="return check()">Add Student </button>
                <button class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
                </form>
            
            </div>
          </div>
        </div>


<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="delete-title">Edit Student Information...</h4>
      </div>
	<form name="student_edit" action="" method="post">
    <div class="modal-body row">
<p style="margin:10px; max-height: 50px;" class="alert alert-info alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><span id="error_log"></span>
</p>
<p style="text-align: center;"><span class="alert-instruction" style="margin:10px;text-align: center;">Please note that changes cannot be made to the Email and Username</span></p>

  <div class="form-group col-md-6">
    <label for="user">Username:</label>
    <input type="text" class="form-control" id="euser" name="user" disabled>
  </div>

  <div class="form-group col-md-6">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="eemail" name="email" disabled>
  </div>

  <div class="form-group col-md-6">
    <label for="fname">First Name:</label>
    <input type="text" class="form-control" id="efname" name="fname">
  </div>

  <div class="form-group col-md-6">
    <label for="lname">Last Name:</label>
    <input type="text" class="form-control" id="elname" name="lname">
  </div>

  <div class="form-group col-md-6">
    <label for="phone">Phone:</label>
    <input type="text" class="form-control" id="ephone" name="phone">
  </div>

  <div class="form-group col-md-6">
    <label for="dept">Department:</label>
    <input type="text" class="form-control" id="edept" name="dept">
  </div>

  <div class="form-group col-md-6">
    <label for="pass">Change Password:</label>
    <input type="password" class="form-control" id="epass" name="pass" placeholder="Enter new password">
  </div>

  <div class="form-group col-md-6">
    <label for="cpass">Confirm Password:</label>
    <input type="password" class="form-control" id="ecpass" name="cpass" placeholder="Confirm new password">
  </div>
</div>
<div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal">Close</button> &nbsp; &nbsp;<span id="edit-submit"></span>
</div>

</form>
</div>
</div>
</div>


<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="delete-title">Student delete...</h4>
      </div>
      <div class="modal-body">
        <p id="del-user-name"></p>
        <p style="display:none" id="del-user-id"></p>
      </div>
      <div class="modal-footer">
        <span id="delete-student"></span>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>