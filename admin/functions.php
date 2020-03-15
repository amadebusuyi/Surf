<?php
function singleQuote($text){
          $text = str_replace("'", "\'", $text);
          return $text;
        }

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
?>