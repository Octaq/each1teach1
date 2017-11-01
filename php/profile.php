<?php
session_start();
require 'database2.php';
if (isset($_SESSION['loggedin'])) {
	$message = $_SESSION['loggedin'];
}
elseif ( isset($_SESSION['success']) ){
	$message = $_SESSION['success'];
}



?>

<!DOCTYPE html>
<html>
<head>
		<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet" type="text.css">
	<link href = "ETOstyle.css" rel="stylesheet" type="text/css">

</head>
<body>
<div id="container">

	<div id="header">
		<img class = "mainicon" src = "sprites/ETO_LogoHome.png" alt = "Each One Teach One Logo">
		<iframe class="search" src="Search1.php"></iframe>
		<a href = "/"><img class = "iconstyle" src = "sprites/NavigationBar/Home.png" alt = "HomeLink" ></a>
	 <img class = "iconstyle" src = "sprites/NavigationBar/Connects.png" alt = "HomeLink" >
	 <img class = "iconstyle" src = "sprites/NavigationBar/Forums.png" alt = "HomeLink" >
	 <img class = "iconstyle" src = "sprites/NavigationBar/Schedule.png" alt = "HomeLink" >
</div>

<div id="leftnav">
	<H3><p><center><font color = "grey">PROFILE</p></center></font></H3>

	<iframe class ="frame" src = "index3.php" scrolling = "no" height="225px" width="200px" border = "red"></iframe>

	<br>Settings</br>
	<br>Credits</br>
	<form method = "POST" action = "logout.php">
			<b><input type = "submit" value= "logout"></input></b>
	</form>
</div>
<div id="body">
		<H3><p><center><font color = "orange">ACCOUNT INFOMATION</p></center></font></H3>
	<?php if( !empty($message) ): ?>

		<h3><?= $message; ?></h3>
		<br />Rating            :  <?= $_SESSION['rating']; ?>
		<br />First Name        :  <?= $_SESSION['first_name']; ?>
		<br />Last Name         :  <?= $_SESSION['last_name']; ?>
		<br />Email Address     :  <?= $_SESSION['email']; ?>
		<br />High School       :  <?= $_SESSION['high_school']; ?>
		<br />Job Title			:  <?= $_SESSION['jobtitle']; ?>
		<br />Institution       :  <?= $_SESSION['institution']; ?>
		<br />Degree            :  <?= $_SESSION['degree']; ?>
		<br />Bio	            :  <?= $_SESSION['bio']; ?>
		<br />Occupation        :  <?= $_SESSION['occupation']; ?>
		<br />Cellphone Number  :  <?= $_SESSION['cellno']; ?>
		<br />Company Name  	:  <?= $_SESSION['company']; ?>	

		<br />Tokens:  <?= $_SESSION['tokens']; ?>
		<br /><br />

	      click <a href="http://www.each1teach1.cf">here</a> to continue

		<br /><br />

		<div id="comments"><H3><p><center><font color = "orange">COMMENTS</H3></p></center></font>

	<?php
//this line is to enable the user to be able to delete message and addd new
//elements in the array

if(isset($_GET['action'])){
	if((file_exists("MessagesBoard/messages.txt")) &&
		  (filesize("MessagesBoard/messages.txt")!=0)){
		$MessageArray = file("MessagesBoard/messages.txt");
       switch ($_GET['action']) {
       	case 'Delete First':
       		array_shift($MessageArray);
       		break;
       		case 'Delete Message':
       		   if(isset($_GET['message']))
       		   	array_splice($MessageArray, $_GET['message'],1);
       		   break;
       	}//this is the end of the switch statement
       if(count($MessageArray)>0){
       	$NewMessages = implode($MessageArray);
       	$MessageStore = fopen("MessagesBoard/messages.txt","wb");
       	if($MessageStore === false)
       		echo "There was an error updating the message file\n";
       }else{
       	 fwrite($MessageStore, $NewMessages);
       	 fclose($MessageStore);
       }
	}else{
		unlink("MessagesBoard/messages.txt");
	}
}
  if((!file_exists("MessagesBoard/messages.txt")) || (filesize("MessagesBoard/messages.txt") == 0))
   echo "<p> There are no messages posted.</p>\n";
else{
	$MessageArray = file("MessagesBoard/messages.txt");
	echo "<table style=\"background-color:white \"border=\"2\" width=\"100%\">\n";
	$Count = count($MessageArray);
	for($i = 0; $i < $Count; ++$i){
		$CurrMsg = explode("~",$MessageArray[$i]);

		echo "<tr>\n";
		echo "<td width=\"30%\"><span style=\"font-weight:bold\">Subject : </span>".htmlentities($CurrMsg[0])."<br/>\n";
		echo "<span style=\"font-weight:bold\", \"font size = 18\" >Name : </span>".htmlentities($CurrMsg[1])."<br/>\n";
		echo "<span style=\"text-decoration:underline; font-weight:bold\">Comments : </span><br/>\n".htmlentities($CurrMsg[2])."</td>\n";
		echo "</tr>\n";
	}
	echo "</table>\n";
}
?>
<p>

<!--<a href="PostMessages.php"><img src="images.jpg" height="60"></a><br/>
 <a href="MessageBoard.php?action=Delete%20First">
 Delete First Message</a>-->

<form method = "POST" action = "PostMessages.php">
		<b><input type = "submit" value= "Comment"></input></b>
</form>
 </p>
		</div>


	<?php else: ?>

		<h1>Please Login or Register</h1>
		<a href="login2.php">Login</a> or
		<a href="register2.php">Register</a>

	<?php endif; ?>

	</div>

</body>
</html>
