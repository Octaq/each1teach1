<?php

session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: ../pages/profile.php");
}

require '../php/database2.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password']) /**&& ($_POST['password'] === $_POST['confirm_password'])**/):

	// Enter the new user in the database

	$sql = "INSERT INTO `clients` (client_lastname,client_firstname,client_email,client_password,client_high_school,client_jobtitle,client_institution,client_location,client_degree,client_occupation,profile_img,client_company_name) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

	$stmt = $db->prepare($sql);
	if($stmt !== TRUE) {
		if($_POST['password'] === $_POST['confirm_password']){
			//echo 'Assignment of variables successful <br/>';

			$lname =  $_POST['last_name'];
			$fname =  $_POST['first_name'];
			$email =  $_POST['email'];
		//	$pass =  password_hash($_POST['password'], PASSWORD_BCRYPT);
			$pass =  md5($_POST['password']);
			$highschool =  $_POST['highschool'];
			$jobtitle =  $_POST['jobtitle'];
			$institution =  $_POST['institution'];
			$location =  $_POST['location'];
			$degree =  $_POST['degree'];
			$occupation =  $_POST['occupation'];
			$company =  $_POST['company'];
			$profile = "Profile_Blank.png";

			$stmt->bind_param('ssssssssssss',$lname,$fname,$email,$pass,$highschool,$jobtitle,$institution,$location,$degree,$occupation,$profile,$company);
		    //echo 'Bind Parameters Successful <br/>';
		}else{echo "The passwords you entered don't match. <br/>";}
	}
	//else {echo "The passwords you entered don't match. <br/>";}

	if( $stmt->execute() ){
			header('location: ../index.php');//redirect to home page
			exit();
	}else{
		$message = 'Sorry there must have been an issue creating your account';
	};

endif;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register Below</title>
	<link rel="stylesheet" type="text/css" href="../css/style2.css">
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="../css/normalize.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
</head>
<body style="background:url('../media/img/1.png')">

	<div class="header">
		<a href="/ETO/index2.php"><img src="../media/Sprites/ETO_FullLogo1.png" height="150"/></a>
	</div>

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Register</h1>
    <span>or <a href="../pages/login.php">login here</a></span>

	<form action="register2.php" method="POST">
    <input type="text" placeholder="Enter your First Name" name="first_name">
    <input type="text" placeholder="Enter your Last Name" name="last_name">
    <input type="text" placeholder="Enter your Email" name="email">
    <input type="password" placeholder="Enter your password" name="password">
    <input type="password" placeholder="Confirm password" name="confirm_password">
	<input type="text" placeholder="Enter your High School" name="highschool">
    <input type="text" placeholder="Enter your Job Title" name="jobtitle">
    <input type="text" placeholder="Enter your Institution" name="institution">
    <input type="text" placeholder="Enter your Degree" name="degree">
    <input type="text" placeholder="Enter your Occupation" name="occupation">
    <input type="text" placeholder="Enter your Location" name="location">
	<input type="text" placeholder="Enter your Company Name" name="company">
	<input type="submit">
	</form>
</body>
</html>
