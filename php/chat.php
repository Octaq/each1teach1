<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
session_start();
?>

<html>
<head>
<title>Chat</title>

<script
  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

<script>

var start = 0;
var limit = 5;
var reachedMax = false;

$(document).ready(function() {
getData();

});

function getData(){
  if (reachedMax)
  return;

  $.ajax({
url: 'logs.php',
method: 'POST',
dataType: {
getData: 1,
start: start,
limit: limit,
},
success: function(response){

}
})
}



function submitChat() {
	if(form1.uname.value == '' || form1.msg.value == '') {
		alert("ALL FIELDS ARE MANDATORY!!!");
		return;
	}
	var uname = form1.uname.value;
	var msg = form1.msg.value;
	var to = form1.to.value;
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
		}
	}

	xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg+'&to='+to,true);
	xmlhttp.send();

}


function ready() {
	var to = form1.to.value;
	var uname = form1.uname.value;
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
		}
	}

	xmlhttp.open('GET','logs.php?to='+to+'&uname='+uname,true);
	xmlhttp.send();

}
setInterval(function(){ ready();}, 500);

</script>
<?php
   //include CSS Style Sheet
   echo "<link rel='stylesheet' type='text/css' href='chat.css'/>";
    echo "<link rel='stylesheet' type='text/css' href='bootstrap.css'/>";

   //include a javascript file
   echo "<script type='text/javascript' src='bootstrap.js'></script>";
echo "<script type='text/javascript' src='jquery.jscroll.js'></script>"
?>




</head>
<body>

<div class="container">
<div id="profile" class="col-lg-3">
    <iframe src="profile.php" height="100%" width="100%" scrolling='no'/></iframe>
</div>

<form class="" type="text">
<form class= "col-lg-6 form-group" name="form1">
<input type="hidden" name="to" value='<?php echo $_GET['to']; ?>' />
<input type="hidden" name="uname" value='<?php echo $_SESSION['first_name']; ?>' />
<input class="send form-control" placeholder="Get learning.."type='text' name="msg" style='width:550px'>

</form>
<button class="send btn btn-sm"><a href="#" onclick="submitChat()" style=''>Send</a></button></input>
  </form>
<div id="chatlogs" class="chat-window col-lg-6" >
LOADING...
</div>

<div id="connections" class="col-lg-3">
  <iframe src="users.php" height="100%" width="100%" scrolling='yes'/></iframe>
</div>



</div>
</body>
</html>
