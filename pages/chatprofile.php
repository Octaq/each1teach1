
<head>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="../css/normalize.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
	<link href = "../css/ETOstyle.css" rel="stylesheet" type="text/css">

</head>
<div id="sidebar">
	<H3><p><center><font color = "grey">PROFILE</p></center></font></H3>

	<?php
	session_start();
	include('../php/database2.php');
	$id = $_SESSION['id'];
	$result = mysqli_query($db,"select * from `clients` where `client_id` = '".$id."' ");
	$row = mysqli_fetch_assoc($result);
	echo "<img src='images/".$row['profile_img']."' style='width:180px;height:180px;'><br/>";
	echo "<h2>".$row['client_firstname']." ".$row['client_lastname']."</h2>";
	?>

</div>