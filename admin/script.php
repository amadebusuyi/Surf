<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="lib/jquery/jquery.min.js"></script>

  <script src="../js/add.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <script src="/mathjax/mathjax-2.6-latest/MathJax.js?config=default"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../datatables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../datatables/js/dataTables.bootstrap.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to Surf CBT | Admin!',
        // (string | mandatory) the text inside the notification
        text: 'Enjoy your activities',
        // (string | optional) the image to display on the left
        image: 'img/admin.jpg',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 7000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>

<script type="text/javascript">

    function display(str, val){
        $('#display-point').html("<div class='loading-div'><div class='loading'>&nbsp;</div><div class='loading'>&nbsp;</div><div class='loading'>&nbsp;</div>");
    if(str == 0){
        $('#panel-title').html("Dashboard");
        var link = "dashadmin.php";
    }
    else if(str == 1){
        $('#panel-title').html("Courses");
        var link = "courses.php";
    }
    else if(str == 2){
        $('#panel-title').html("Students");
        var link = "students.php";
    }
    else if(str == 3){
        $('#panel-title').html("Questions");
        var link = "questions.php";
    }
    else if(str == 4){
        $('#panel-title').html("Add Questions");
        var link = "add_questions.php";
    }
    else if(str == 5){
        $('#panel-title').html("Active Courses");
        var link = "activate_course.php?active";
    }
    else if(str == 6){
      if(val > 1){
        $('#panel-title').html("Students Results");
        var link = "results.php?results="+val;
    }
    else{
        $('#panel-title').html("Students Results");
        var link = "results.php?results";
    }
  }
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $('#display-point').html(this.responseText);
                counter();
            }
        };
        xmlhttp.open("GET",link,true);
        xmlhttp.send();}

function activate(str, opt) {
        if(opt == 0){
        $('#act-state-'+str).html("<span class='loading1'>&nbsp;&nbsp;&nbsp;</span><span class='loading1'>&nbsp;&nbsp;&nbsp;</span><span class='loading1'>&nbsp;&nbsp;&nbsp;</span>");
        var link = "activate_course.php?subid="+str;
    }
    else{
        $('#act-'+str).html("<span class='loading2 fa fa-refresh'></span>");
        var link = "activate_student.php?uid="+str;
    }
        if (str == "") {
        $("#txtHint").html("");
        return;
    } 
    else { 
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = this.responseText;
                if (response == 1){
                 $('#act-state-'+str).html("Deactivate");
                 $('#active-'+str).html("<i class='fa fa-check fa-2x'> </i> <b>Active</b>'");
                 $('#live-'+str).html('<font class="fa fa-circle" color="#3399ff"></font>'); }
                else if(response == 2){
                $('#act-state-'+str).html("Activate");
                $('#active-'+str).html("<i class='fa fa-times fa-2x'> </i> <b>Not active</b>'");
                 $('#live-'+str).html('<font class="fa fa-circle" color="grey"></font>');}
                else if(response == 3){
                 $('#act-state-'+str).html("<span title='contact your web app manager for solution'>Failed!</span>");}
                else if(response == 4){
                $('#act-'+str).html('<span class="fa fa-times"></span>').removeClass("btn-success").addClass("btn-default");
                $('#row-'+str).toggleClass("alert-danger bold-text"); }
                else if(response == 5){
                $('#act-'+str).html("<span class='fa fa-check-square'></span>").removeClass("btn-default").addClass("btn-success");
                $('#row-'+str).toggleClass("alert-danger bold-text"); }
                else if(response == 6){
                $('#act-'+str).html("<span title='contact your web app manager for solution' class='btn btn-danger'>!!!</span>"); }
                counter(1);                
                }
        };
        xmlhttp.open("GET",link,true);
        xmlhttp.send();}
    }

function delConfirm(src, str, name){
  if(src == 1){
    var deleter = "1, "+str;
  }
  else if(src == 2){
    var deleter = "2, "+str;
  }
  else if(src == 3){
    var deleter = "3, "+str;
  }
  else{
    var deleter = "4, "+str;
  }
    $('#del-user-name').html("<p class='alert alert-danger p-course-name'>Do you really want to delete <span class='bold-text'>"+name+"</span> from database?</p>");
    $('#delete-student').html('<button type="button" onclick="deleteUser('+deleter+')" class="btn btn-danger" id="del-button">Delete</button>');
}
function deleteUser(src, str){
  $("#del-button").html("<span class='fa fa-spinner fa-spin'></span>");
    if(src == 1){
      var link = "uid="+str;
    }
    else if(src == 2){
    var link = "subid="+str;
    }
    else if(src == 3){
    var link = "resid="+str;
    }
    else{
      var link = "qid="+str;
    }
     if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $('#del-user-name').html(this.responseText);
                $('#delete-student').html('');
                $('#row-'+str).remove();
                counter();
            }
        };
        xmlhttp.open("GET","delete.php?"+link,true);
        xmlhttp.send();
    }

function addQuestion(subid){
 $("#add-button").html("<i class='fa fa-spinner fa-spin'></i>");
 var qnum = $("#qnum").val();
 var qtext = $('#question').val();
 var choice1 = $('#choice1').val();
 var choice2 = $('#choice2').val();
 var choice3 = $('#choice3').val();
 var choice4 = $('#choice4').val();
 var choice5 = $('#choice5').val();
 var correct_choice = $('#correct_choice').val();
 if(qtext == "")
  {
    $('#error_log').html("<p class='alert-warning' style='padding:5px; text-align:center;'>You have not entered question</p>");
  document.qform.question.focus();
        $("#add-button").html("Add Question");
  return false;
  }
  if(choice1 == "")
  {
    $('#error_log').html("<p class='alert-warning' style='padding:5px; text-align:center;'>You cannot leave option A empty</p>");
  document.qform.choice1.focus();
        $("#add-button").html("Add Question");
  return false;
  }
  if(choice2 == "")
  {
    $('#error_log').html("<p class='alert-warning' style='padding:5px; text-align:center;'>You cannot leave option B empty</p>");
  document.qform.choice2.focus();
        $("#add-button").html("Add Question");
  return false;
  } 
  if(correct_choice == "")
  {
    $('#error_log').html("<p class='alert-warning' style='padding:5px; text-align:center;'>Please select correct choice</p>");
  document.qform.correct_choice.focus();
        $("#add-button").html("Add Question");
  return false;
  }
  
 $.post("add.php",
 {
  add_question: "true",
  subid : subid,
  question : qtext,
  choice1 : choice1,
  choice2 : choice2,
  choice3 : choice3,
  choice4 : choice4,
  choice5 : choice5,
  correct_choice : correct_choice
 },
 function(data, status){
  if(data){$('#error_log').html('<p class="alert alert-success alert-dismissible">Question added successfully <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>');
  qnum = Number(qnum);
$('#qnum').val(qnum+1);
$('#correct_choice').val('');
}
  else{$('#error_log').html('<p class="alert alert-danger alert-dismissible">Failed to add question. <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>');}
        $("#add-button").html("Add Question");
    });
}

function setCourse(cid, ids){
  $('.set-button').html("<span class='fa fa-spinner fa-spin'></span>");
  if(cid == 0){
  var id = document.cform.course_id.value;
  var link = "questions.php";
}

else if(cid == '001'){
  var id = document.cform.course_id.value;
  var link = "add_questions.php";
}

else if(cid == '01'){
  $('#plus-'+ids).html("<span class='fa fa-spinner fa-spin'></span>");
  var id = ids;
  var link = "add_questions.php";
}

else{
  var id = cid;
  var link = "add_questions.php";
}
      $.post(link,
    {
        set_course : id
    },
    function(data, status){
        $('#display-point').html(data);
        $('.set-button').html("Set");
    });
    }

</script>

<script type="text/javascript">
  $(document).ready( function () {
    $('#table').DataTable();
} );
</script>