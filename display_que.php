 <?php
if($rows != 0 && $n <= $rows){
echo ' <style> form, p{margin:15px;} .alert-default-info p{margin-top:-23px !important; margin-left:25px;} </style>

    <span style="display:none" id="get-subid">'.$subid.'</span>
    <span style="display:none" id="get-subname">'.$subname.'</span>
    <span style="display:none" id="get-subcode">'.$subcode.'</span>
    <span style="display:none" id="get-user">'.$uid.'</span>
    <span style="display:none" id="get-que">'.$qid.'</span>';

    echo '<div class="alert alert-default"><p class="alert alert-default-info"><b>Question '.$n.'</b></p> <div class="qdisplay" style="margin-left:10px !important;">'.$qtext.'</div></div>';
        
        echo '<form name="choiceForm" action="?start&qn='.$qn.'" method="post">';
        if ($choice_mark == 'A'){
        echo '<div class="optdisplay alert alert-default-info"><input type="radio" name="opt" onclick="updateScore()" value="A" checked> ' . $ans1.'</div>';
        }
        else {
        if ($ans1 != ''){
        echo '<div class="optdisplay alert alert-default-info"><input type="radio" name="opt" onclick="updateScore()" value="A"> ' . $ans1.'</div>';
        }
      }
    
      if ($choice_mark == 'B'){
        echo '<div class="optdisplay alert alert-default-info"><input type="radio" name="opt" onclick="updateScore()" value="B" checked> ' . $ans2.'</div>';
        }
        else {
        if ($ans2 != ''){
        echo '<div class="optdisplay alert alert-default-info"><input type="radio" name="opt" onclick="updateScore()" value="B"> ' . $ans2.'</div>';
        }
      }
      
       if ($choice_mark == 'C'){
        echo '<div class="optdisplay alert alert-default-info"><input type="radio" name="opt" onclick="updateScore()" value="C" checked> ' . $ans3.'</div>';
        }
        else {
        if ($ans3 != ''){
        echo '<div class="optdisplay alert alert-default-info"><input type="radio" name="opt" onclick="updateScore()" value="C"> ' . $ans3.'</div>';
        }
      }

      if ($choice_mark == 'D'){
        echo '<div class="optdisplay alert alert-default-info"><input type="radio" name="opt" onclick="updateScore()" value="D" checked> ' . $ans4.'</div>';
        }
        else {
        if ($ans4 != ''){
        echo '<div class="optdisplay alert alert-default-info"><input type="radio" name="opt" onclick="updateScore()" value="D"> ' . $ans4.'</div>';
        }
      }
      
       if ($choice_mark == 'E'){
        echo '<div class="optdisplay alert alert-default-info"><input type="radio" name="opt" onclick="updateScore()" value="E" checked> ' . $ans5.'</div>';
        }
        else {
        if ($ans5 != ''){
        echo '<div class="optdisplay alert alert-default-info"><input type="radio" name="opt" onclick="updateScore()" value="E"> ' . $ans5.'</div>';
        }
      }
        echo "<hr>";

 if($n<$rows){
        
        if($n==1 && $rows != 1){
        echo '<p><span onclick="nextQues('.$qn.')" class="btn btn-primary"> Next </span></p></form>'; 
        }

        else{
          //to get previous, subtract 2 from the  current value of qn
        $qn=$qn-2;
        echo '<p><span onclick="nextQues('.$qn.')" style="margin-right:20px;" class="btn btn-primary">Prev</span>';
        $qn = $qn+2;
        echo '<span onclick="nextQues('.$qn.')" class="btn btn-primary"> Next </span></p></form>';
        }
       
      }
        //for the last question    
  else if ($n==$rows || $rows == 1){
        //to get previous, subtract 2 from the  current value of qn
        $qn=$qn-2;

        if($n == $rows && $rows>1){
        echo '<p><span onclick="nextQues('.$qn.')" style="margin-right:20px;" class="btn btn-primary">Prev</span>
        <span onclick="submitScore()" class="btn btn-success">Finish</span></p></form>';
      }
        elseif($rows == 1){
          echo '<div><span onclick="submitScore()" class="btn btn-success">Finish</span></p></form>';
        }    
      }
    }
  //just in case, user tried adding value to qn that is greater than the num rows value of question, unset all the variables and return error page.
      else{ 
        echo "<p class='alert alert-warning'>Exam not available. Click <a href='home.php' class='btn-primary'>here</a> to check for available exams.</p>";
      }

      ?>