<?php 
echo ' <style> form, p{margin:15px;} .alert-default-info p{margin-top:-23px !important; margin-left:25px;}.alert-instruction p{margin-top:-22px !important; margin-left:25px;}</style>

    <span style="display:none" id="get-subid">'.$subid.'</span>
    <span style="display:none" id="get-subname">'.$subname.'</span>
    <span style="display:none" id="get-subcode">'.$subcode.'</span>
    <span style="display:none" id="get-user">'.$uid.'</span>
    <span style="display:none" id="get-que">'.$qid.'</span>';
  if($n<1 || $n>$rows){
    echo "<p class= 'alert alert-danger'>Request not found! Click <a href='home.php' class='btn-primary'>here</a> to check for available exams</p>";
  }
  else{
  echo '<div class="alert alert-default"><p><b>Question '.$n."</b></p><p class='qdisplay'> ".  $qtext.'</p></div>
    <form action="?finish_rev" method="post">';
        if ($choice_mark == 'A'){
        echo '<div class="alert alert-instruction"><input type="radio" name="opt" disabled value="A" checked>'." ".$ans1.'</div>';
        }
        else {
        if ($ans1 != ''){
        echo '<div class="alert alert-default-info"><input type="radio" name="opt" disabled value="A">'." ".$ans1.'</div>';
        }
      }
      if ($choice_mark == 'B'){
        echo '<div class="alert alert-instruction"><input type="radio" name="opt" disabled value="B" checked>'." ".$ans2.'</div>';
        }
        else {
        if ($ans2 != ''){
        echo '<div class="alert alert-default-info"><input type="radio" name="opt" disabled value="B">'." ".$ans2.'</div>';
        }
      }
       if ($choice_mark == 'C'){
        echo '<div class="alert alert-instruction"><input type="radio" name="opt" disabled value="C" checked>'." ".$ans3.'</div>';
        }
        else {
        if ($ans3 != ''){
        echo '<div class="alert alert-default-info"><input type="radio" name="opt" disabled value="B">'." ".$ans3.'</div>';
        }
      }
      if ($choice_mark == 'D'){
        echo '<div class="alert alert-instruction"><input type="radio" name="opt" disabled value="D" checked>'." ".$ans4.'</div>';
        }
        else {
        if ($ans4 != ''){
        echo '<div class="alert alert-default-info"><input type="radio" name="opt" disabled value="D">'." ".$ans4.'</div>';
        }
      }
       if ($choice_mark == 'E'){
        echo '<div class="alert alert-instruction"><input type="radio" name="opt" disabled value="E" checked>'." ".$ans5.'</div>';
        }
        else {
        if ($ans5 != ''){
        echo '<div class="alert alert-default-info"><input type="radio" name="opt" disabled value="E">'." ".$ans5.'</div>';
        }
      }
        echo "<hr>";

  if($n<$rows){
        if($n==1){
        echo '<p><span onclick="nextRev('.$qn.')" class="btn btn-primary"> Next </span></p></form>'; 
        }
        else{
        $qn=$qn-2;
        echo '<p><span onclick="nextRev('.$qn.')" class="btn btn-primary"> Prev </span>&nbsp;';
        $qn = $qn+2;
        echo '&nbsp;<span onclick="nextRev('.$qn.')" class="btn btn-primary"> Next </span></p></form>';
        }
      }
      
  elseif ($n==$rows){
        if($n==1){
        echo '<p><span onclick="finishRev()" class="btn btn-success">Finish Check</span></p></form>'; 
        }
        else{
        $qn=$qn-2;
        echo '<p><span onclick="nextRev('.$qn.')" class="btn btn-primary"> Prev </span> &nbsp; &nbsp;
        <span onclick="finishRev()" class="btn btn-success">Finish Check</span></p></form>';
      }
    }
  }
  ?>