<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="/demos/js/scroll.jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			$( '#infinite_scroll' ).scrollLoad({

				url : 'my_scroll_ajax_file.php', //your ajax file to be loaded when scroll breaks ScrollAfterHeight

				getData : function() {
					//you can post some data along with ajax request
				},

				start : function() {
					$('<div class="loading"><img src="ajax-loader.gif"/></div>').appendTo(this);
// you can add your effect before loading data
				},

				ScrollAfterHeight : 95,			//this is the height in percentage after which ajax stars

				onload : function( data ) {
					$(this).append( data );
					$('.loading').remove();
				}, // this event fires on ajax success

				continueWhile : function( resp ) {
					if( $(this).children('li').length >= 100 ) { // stops when number of 'li' reaches 100
						return false;
					}
					return true;
				}
			});

		});

		</script>
<?php
session_start();
include('database2.php');
$uname=$_REQUEST['uname'];
$to = $_REQUEST['to'];
$result1 = mysqli_query($db,"select * from `logs` where `username` = '".$uname."' and `to` ='".$to."' or `username` = '".$to."' and `to` ='".$uname."' ORDER BY id DESC");
$result2 = mysqli_query($db,"select * from `clients` where `client_firstname` = '".$uname."'");


$extract1 = mysqli_fetch_assoc($result2);
echo "<img src='".$extract1["profile_img"]."' >";





while($extract = mysqli_fetch_array($result1)) {
	if($to == $extract['to'])
	{
	echo "<div class= 'wrapper' style=''>
	<div class='content' sytle=''; height:auto;'>
	<strong><h4 style='text-align:right;background-color:#FFCC00;border-radius:3px;color:black; border-right:solid;'>".$extract['username']." : ".$extract['msg']."</h4>
	</div>
	</div>";
	}
	else {
	echo "<div class= 'wrapper' style=''>
	<div class='content' sytle='max-width:200px'>
	<strong><h4 style=' text-align:left;background-color:#99FF00;border-radius:3px; color:black;border-left:solid;'>".$extract['username']." : ".$extract['msg']."</h4>
	</div>
	</div>";
	}
}

   //include CSS Style Sheet
   echo "<link rel='stylesheet' type='text/css' href='chat.css' />";
    echo "<link rel='stylesheet' type='text/css' href='bootstrap.css'/>";

   //include a javascript file
   //echo "<script type='text/javascript' src='path-to-javascript-file'></script>";

	 //infinte scroll
