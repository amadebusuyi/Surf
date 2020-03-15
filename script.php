
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/jquery-1.11.3-jquery.min.js"></script>
    <script src="./js/add.js"></script>
    <script>
      new WOW().init();
    </script>
    
    <script src="/mathjax/mathjax-2.6-latest/MathJax.js?config=default"></script>

    <script>function nextQues(str) {
     var subid = document.getElementById('get-subid').innerHTML;
     var subname = document.getElementById('get-subname').innerHTML;
     var subcode = document.getElementById('get-subcode').innerHTML;
     var user = document.getElementById('get-user').innerHTML;
    document.getElementById('display-point').innerHTML = "Loading question...";
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
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
                document.getElementById("display-point").innerHTML = this.responseText;
                document.getElementById("panel-title").innerHTML = subcode;
            }
        };
        xmlhttp.open("GET","start.php?qn="+str+"&subid="+subid+"&subname="+subname+"&subcode="+subcode+"&user="+user,true);
        xmlhttp.send();}

    } 

    function nextRev(str) {
     var subid = document.getElementById('get-subid').innerHTML;
     var subname = document.getElementById('get-subname').innerHTML;
     var subcode = document.getElementById('get-subcode').innerHTML;
     var user = document.getElementById('get-user').innerHTML;
    document.getElementById('display-point').innerHTML = "Loading question...";
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
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
                document.getElementById("display-point").innerHTML = this.responseText;
                document.getElementById("countdown").innerHTML = "Completed!";
            }
        };
        xmlhttp.open("GET","review.php?qn="+str+"&subid="+subid+"&subname="+subname+"&subcode="+subcode+"&user="+user,true);
        xmlhttp.send();}

    } 

function updateScore() {
     var str = document.choiceForm.opt.value;
     var subid = document.getElementById('get-subid').innerHTML;
     var user = document.getElementById('get-user').innerHTML;
     var qid = document.getElementById('get-que').innerHTML;
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
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
                document.getElementById("display-check").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","check.php?opt="+str+"&subid="+subid+"&qid="+qid+"&user="+user,true);
        xmlhttp.send();
    }
}

function submitScore() {
     var subid = document.getElementById('get-subid').innerHTML;
     var subname = document.getElementById('get-subname').innerHTML;
     var subcode = document.getElementById('get-subcode').innerHTML;
     var user = document.getElementById('get-user').innerHTML;
     document.getElementById("countdown").style.display = "none";
    document.getElementById('display-point').innerHTML = "Submitting test...";
     
    if (subid == "") {
        document.getElementById("txtHint").innerHTML = "";
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
                document.getElementById("display-point").innerHTML = this.responseText;
            document.getElementById("countend").style.display = "inline";
        document.getElementById("countend").innerHTML = "Submitted!";
            }
        };
        xmlhttp.open("GET","finish.php?finish&subid="+subid+"&subname="+subname+"&user="+user+"&subcode="+subcode,true);
        xmlhttp.send();
    }
}

function finishRev() {
     var subid = document.getElementById('get-subid').innerHTML;
     var subname = document.getElementById('get-subname').innerHTML;
     var subcode = document.getElementById('get-subcode').innerHTML;
     var user = document.getElementById('get-user').innerHTML;
    document.getElementById('display-point').innerHTML = "Finishing review...";
    if (subid == "") {
        document.getElementById("txtHint").innerHTML = "";
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
                document.getElementById("display-point").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","finish.php?finish=rev&subid="+subid+"&subname="+subname+"&user="+user+"&subcode="+subcode,true);
        xmlhttp.send();
    }
}

function startTimer() {
     var subid = document.getElementById('get-subid').innerHTML;
     var user = document.getElementById('get-user').innerHTML;
    if(subid == "") {
        document.getElementById("countdown").innerHTML = "Submit!";
      } 
    else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var duration = this.responseText;
        if(duration == "done"){
            
        }

        else{
confirmLocation(1);
var seconds = duration * 60;
var countdown = setInterval(function() {
    seconds--;
        
    second = seconds%60;
    minutes = seconds / 60;
    minutes = Math.floor(minutes);
    
    if (second < 10){
    second = "0" + second;
    }
    if (minutes < 10){ minutes = "0" + minutes;}
    if(seconds < 1)
        submitScore();
    
    else if(seconds < 121)
    document.getElementById("countdown").innerHTML = "<span class='blink'>" + minutes + " : " + second + "</span>";
    else
    document.getElementById("countdown").textContent = minutes + " : " + second;
    
    if (seconds <= 0) clearInterval(countdown);
}, 1000);
            }
        }
        };
        xmlhttp.open("GET","timer.php?test&subid="+subid+"&user="+user,true);
        xmlhttp.send();
    }
}

var lcheck = document.getElementById('lcheck').innerHTML;
if (lcheck == "yes"){
function confirmLocation(str){
if(str == 1){

window.onbeforeunload = function(event) {
    return "Are you sure you want to navigate away?";
    submitScore();
};
window.onunload = function(event) {
    // do stuff here
    return "Are you sure you want to navigate away?";
    submitScore();
};
}
else{}
}
}
else{}
</script>