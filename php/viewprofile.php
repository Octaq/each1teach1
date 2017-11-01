<?php
session_start();
require 'database2.php';
$user_profile_id = $_GET['result_id'];
$_SESSION['view_profile_id'] = $user_profile_id;
if (isset($user_profile_id)) {
	$query = "SELECT * FROM clients WHERE client_id='$user_profile_id'";
	if ($result=mysqli_query($db,$query)){
	  // Return the number of rows in result set
	  $rowcount=mysqli_num_rows($result);
	  //echo mysqli_num_rows($result);
	  if (mysqli_num_rows($result) == 1){
		//Store session data
		$view = mysqli_fetch_assoc($result);
		$_SESSION['view_fname'] = $view['client_firstname'];// Initializing Session with value of PHP Variable
		$_SESSION['view_lname'] =  $view['client_lastname'];
	  	$view_message = "Viewing ".$_SESSION['view_fname']." ".$_SESSION['view_lname']."'s profile.";
		$_SESSION['view_email'] = $view['client_email'];
		$_SESSION['view_highschool'] =  $view['client_high_school'];
		$_SESSION['view_jobtitle'] = $view['client_jobtitle'];
		$_SESSION['view_institution'] = $view['client_institution'];
		$_SESSION['view_location'] = $view['client_location'];
		$_SESSION['view_degree'] = $view['client_degree'];
		$_SESSION['view_bio'] = $view['client_bio'];
		$_SESSION['view_occupation'] = $view['client_occupation'];
		$_SESSION['view_cellno'] = $view['client_cell_no'];
		$_SESSION['view_rating'] = $view['client_rating'];
		$_SESSION['view_tokens'] = $view['client_tokens'];
		$_SESSION['view_company'] = $view['client_company_name'];
		}
	}
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
		<?php include('Search1.php'); ?>
		<a href = "/"><img class = "iconstyle" src = "sprites/NavigationBar/Home.png" alt = "HomeLink" ></a>
	 <img class = "iconstyle" src = "sprites/NavigationBar/Connects.png" alt = "HomeLink" >
	 <img class = "iconstyle" src = "sprites/NavigationBar/Forums.png" alt = "HomeLink" >
	 <img class = "iconstyle" src = "sprites/NavigationBar/Schedule.png" alt = "HomeLink" >
</div>

<div id="leftnav">
	<H3><p><center><font color = "grey">PROFILE</p></center></font></H3>
	<img class = "img" src = "sprites/Home/Profile_Blank.png" alt = "[Profile Picture here]">
	<br><a href="index3.php">Edit Profile</a></br>
	<br>Settings</br>
	<br>Credits</br>
	<form method = "POST" action = "logout.php">
			<b><input type = "submit" value= "logout"></input></b>
	</form>
</div>
<div id="body">
		<H3><p><center><font color = "orange">ACCOUNT INFOMATION</p></center></font></H3>
	<?php if( !empty($view_message) ): ?>

		<h3><?= $view_message; ?></h3>
		<br />Rating            :  <?= $_SESSION['view_rating']; ?>
		<br />First Name        : <?= $_SESSION['view_fname']; ?>
		<br />Last Name         :  <?= $_SESSION['view_lname']; ?>
		<br />Email Address     :  <?= $_SESSION['view_email']; ?>
		<br />High School       : <?= $_SESSION['view_highschool']; ?>
		<br />Job Title			: <?= $_SESSION['view_jobtitle']; ?>
		<br />Institution       :  <?= $_SESSION['view_institution']; ?>
		<br />Degree            :  <?= $_SESSION['view_degree']; ?>
		<br />Bio	            :  <?= $_SESSION['view_bio']; ?>
		<br />Occupation        :  <?= $_SESSION['view_occupation']; ?>
		<br />Cellphone Number  :  <?= $_SESSION['view_cellno']; ?>
		<br />Company name		:  <?= S_SESSION['view_company']; ?>

		<br />Tokens:  <?= $_SESSION['view_tokens']; ?>
		<br /><br />

	      click <a href="http://www.each1teach1.cf">here</a> to continue

		<br /><br />

		<div id="comments"><H3><p><center><font color = "orange">COMMENTS</H3></p></center></font>

	<?php
      $search_comments = "SELECT * FROM reviews WHERE client_id = '$user_profile_id' ORDER BY review_date_time desc";
      $retrieve = mysqli_query($db, $search_comments);
      $comments = mysqli_num_rows($retrieve);
      if($comments > 0){
      		while($row = mysqli_fetch_assoc($retrieve)){
      			echo "<table style=\"background-color:white \"border=\"2\" width=\"100%\">\n";
      			echo "<tr>\n";
      			//echo "<div class='User Comments:'>";
                //echo "<img src='images/".$row['profile_img']."'>";
                echo "<td width=\"30%\"><span style=\"font-weight:bold\", \"font size = 18\" >Name : </span><a href= 'viewprofile.php?result_id=".$row['review_poster_id']."'>".$row['review_poster_name']."<br/>\n";
                echo "</a>";
                echo "<span style=\"text-decoration:underline; font-weight:bold\">Comment : </span><br/>\n".$row['Message']."<br/>\n";
                echo "<span style=\"font-weight:bold\">Posted: </span>".$row['review_date_time']."</td>\n";
                echo "</tr>\n";
      		}
      }else{echo "<p> There are no messages posted.</p>\n"; }
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
 