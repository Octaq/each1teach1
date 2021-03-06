<?php

session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: /");
}

require 'database2.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password']) /**&& ($_POST['password'] === $_POST['confirm_password'])**/):
	
	// Enter the new user in the database

	$sql = "INSERT INTO `clients` (client_lastname,client_firstname,client_email,client_password,client_high_school,client_jobtitle,client_institution,client_location,client_degree,client_occupation, client_company_name) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
	
	$stmt = $mysqli->prepare($sql);
	if($stmt !== TRUE) {
		if($_POST['password'] === $_POST['confirm_password']){
			//echo 'Assignment of variables successful <br/>';

			$lname =  $_POST['last_name'];
			$fname =  $_POST['first_name'];
			$email =  $_POST['email'];
		//	$pass =  password_hash($_POST['password'], PASSWORD_BCRYPT);
			$pass =  md5($_POST['password']);
			$highSchool =  $_POST['High_School'];
			$jobtitle =  $_POST['Job_title'];
			$institution =  $_POST['Institution'];
			$occupation =  $_POST['Occupation'];
			$location =  $_POST['Location'];
			$degree =  $_POST['Degree'];
			$company = $_POST['Company'];

				
			$stmt->bind_param('ssssssssss',$lname,$fname,$email,$pass,$highSchool,$jobtitle,$institution,$location,$degree,$occupation, $company);
		    //echo 'Bind Parameters Successful <br/>';
		}else{echo "The passwords you entered don't match. <br/>";}
	}
	//else {echo "The passwords you entered don't match. <br/>";}

	if( $stmt->execute() ){
			header('location: /login2.php');//redirect to home page
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
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet" type="text.css">
</head>
<body>

	<div class="header">
		<a href="index2.php"><img src="ETO_FullLogo1.png" height="150"/></a>
	</div>

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Register</h1>
    <!---<span>or <a href="login2.php">login here</a></span>-->

	<form action="register2.php" method="POST">
		<input type="text" placeholder="Enter your First Name" name="first_name">
    <input type="text" placeholder="Enter your Last Name" name="last_name">
    <input type="text" placeholder="Enter your email" name="email">
    <input type="password" placeholder="and password" name="password">
    <input type="password" placeholder="confirm password" name="confirm_password">
	<input type="text" placeholder="Enter your High School" name="High_School">
    <input type="text" placeholder="Enter your Job Title" name="Job_title">
  <input type="text" placeholder="Enter your Institution" name="Institution">
    <input type="text" placeholder="Enter your Degree" name="Degree">
    <input type="text" placeholder="Enter your Occupation" name="Occupation">
     <input type="text" placeholder="Enter your Location" name="Location">
     <input type="text" placeholder="Enter your Company Name" name="Company">
		
		<input type="submit">

	</form>

</body>
</html>