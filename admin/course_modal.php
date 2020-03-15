<div class="modal fade" tabindex="-1" id="addModal" data-keyboard="false" >
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times</button>
                <h4 class="modal-title">New Course Details</h4>
              </div>
              <div class="modal-body">
                <p class="alert alert-info" style="display: none;" id="add-feed"></p>
                <form method="post" action="" name="add_course">
                       
                  <div class="form-group">
                    <label for="course">Course Title</label>
                    <input class="form-control input-lg" placeholder="e.g. Introduction to Physics(PHY 101)"  type="text" id="course_title" name="course_title"/>
                  </div> 

                  <div class="form-group col-md-6" style="margin-left:-15px; margin-right: 27px">
                    <label for="course_code">Course Code</label>
                    <input class="form-control input-lg" maxlength="20" placeholder="e.g. PHY 101"  type="text" id="course_code" name="course_code"/>
                  </div>

                  <div class="form-group col-md-6" style="margin-right:-15px;">
                    <label for="duration">Duration:</label>
                    <div class="input-group">
                      <input type="number" min="0" class="form-control input-lg" id="duration" name="duration" value="10"><span class="input-group-addon">mins</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="instruction">Course Instruction</label>
                    <textarea class="form-control" placeholder="e.g. Please any complaint should be attended to by the invigilator, no student is allowed to talk, stand, or distract other students." rows="3"  type="text" id="instruction" name="instruction"></textarea>
                  </div>
                  
                <div class="modal-footer">
                  <span type="button" onclick="addCourse()" class="btn btn-primary"> Add Course </span>
                <button class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
                </form>
              </div>
            
            </div>
          </div>
        </div>

        <!-- Edit Modal starts here -->
<div class="modal fade" tabindex="-1" id="editModal" data-keyboard="false" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times</button>
                <h4 class="modal-title">Edit Course Details...</h4>
              </div>
              <div class="modal-body">
                <p class="alert alert-default" id="edit-feed"></p>
                <form method="post" action="" name="edit_course">
                       
                  <div class="form-group">
                    <label for="course">Course Title</label>
                    <input class="form-control input-lg" max="200" type="text" id="cname"  name="cname"/>
                  </div> 

                  <div class="form-group col-md-6" style="margin-left:-15px; margin-right: 27px">
                    <label for="course_code">Course Code</label>
                    <input class="form-control input-lg" maxlength="20" type="text" id="code"  name="code"/>
                  </div>

                  <div class="form-group col-md-6" style="margin-right:-15px;">
                    <label for="duration">Duration:</label>
                    <div class="input-group">
                      <input type="number" min="1" class="form-control input-lg" id="cdur" name="cdur" value="10"><span class="input-group-addon">mins</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="instruction">Course Instruction</label>
                    <textarea id="inst" class="textarea" name="inst" style="width: 100%"></textarea>
                  </div>
                  
                <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Close</button>&nbsp; &nbsp;<span id="edit-submit"></span>
            </div>
                </form>
              </div>
            
            </div>
          </div>
        </div>


  <div id="delModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="delete-title">Course delete...</h4>
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


  <div id="viewModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="vcode"></h4>
      </div>
      <div class="modal-body">
        <p id="vtitle" class="alert alert-default">Title</p>
        <p class="panel-body-text"><span class="pull-left"><i class="fa fa-clock-o fa-2x"></i> <b><span id="vtime">'.$duration.'</span> mins</b> </span>
                <i class="fa fa-question-circle fa-2x"></i> <b><span id="vques">'.$row.'</span></b>
             <span class="pull-right" id="active-state">'.$active_state.'</span></p>
        <p id="vinst" class="alert alert-default-info">Instructions</p>
      </div>
      <div class="modal-footer">
        <span id="delete-student"></span>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>