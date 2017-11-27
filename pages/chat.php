
<?php
session_start();
include('../php/database2.php');
include ("../php/nav.php"); 
if (isset($_SESSION['id'])) {
	$id = $_SESSION['id'];
	$results = mysqli_query($db,"select * from `clients` where `client_id` = '$id' ");
	$rows = mysqli_fetch_assoc($results);
	$image = $rows['profile_img'];
	 }
?>
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

	xmlhttp.open('GET','../php/insert.php?uname='+uname+'&msg='+msg+'&to='+to,true);
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
   echo "<link rel='stylesheet' type='text/css' href=../css/chat.css'/>";
    echo "<link rel='stylesheet' type='text/css' href='../css/bootstrap.css'/>";

   //include a javascript file
   echo "<script type='text/javascript' src='../js/bootstrap.js'></script>";
echo "<script type='text/javascript' src='jquery.jscroll.js'></script>"
?>



<!--sidebar-->
    <div id="sidebar" class="col-xs-12 col-md-3 ">
        <div id="connections" class="">
          <iframe src="../php/connections.php" height="100%" width="100%" style="border-radius:5px;"scrolling='yes'/></iframe>
        
        </div>
    </div>

<!--/.sidebar-->
<!-- content -->
    <div id="viewbox" class="pull-right col-xs-12 col-md-9">
        <form class= "form-group" name="form1">
        <input type="hidden" name="to" value='<?php echo $_GET['to']; ?>' />
        <input type="hidden" name="uname" value='<?php echo $_SESSION['first_name']; ?>' />
        <input class=" form-control" placeholder="Get learning.."type='text' name="msg" style='width:100%'></input>
        </form>
        <button class="btn  btn-sm"><a href="#" onclick="submitChat()" style='width:100%'>Send</a></button>
        <div id="chatlogs" class="chat-window" >
        LOADING...
        </div>
        
        <!--<div id="connections" class="">-->
        <!--  <iframe src="../php/connections.php" height="100%" width="100%" style="border-radius:5px;"scrolling='yes'/></iframe>-->
        
        <!--</div>-->

	</div>
<!-- /.content -->

</body>
</html>
