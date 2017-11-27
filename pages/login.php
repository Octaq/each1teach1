<?php
//Start a new session
session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: ../pages/profile.php");
}

require '../php/database2.php';

if(!empty($_POST['email']) && !empty($_POST['password'])){
	$email = ($_POST['email']);

	//	$pass =  password_hash($_POST['password'], PASSWORD_BCRYPT);
	$pass =  md5($_POST['password']);
	$query = "SELECT * FROM clients WHERE client_email='$email'";

	if ($result=mysqli_query($db,$query)){
	  // Return the number of rows in result set
	  $rowcount=mysqli_num_rows($result);
	  echo mysqli_num_rows($result);
	  if (mysqli_num_rows($result) == 1){
		//Store session data
		$row = mysqli_fetch_assoc($result);
		$_SESSION['first_name'] = $row['client_firstname'];// Initializing Session with value of PHP Variable
	  	$message = 'Welcome to Each1Teach1, '.$_SESSION['first_name'];
	  	$_SESSION['loggedin']= $message;
		$_SESSION['password'] = $row['password'];
	  	$_SESSION['id'] = $row['client_id'];
		$_SESSION['last_name'] =  $row['client_lastname'];
		$_SESSION['email'] = $email;
		$_SESSION['high_school'] =  $row['client_high_school'];
		$_SESSION['jobtitle'] = $row['client_jobtitle'];
		$_SESSION['institution'] = $row['client_institution'];
		$_SESSION['location'] = $row['client_location'];
		$_SESSION['degree'] = $row['client_degree'];
		$_SESSION['bio'] = $row['client_bio'];
		$_SESSION['occupation'] = $row['client_occupation'];
		$_SESSION['cellno'] = $row['client_cell_no'];
		$_SESSION['profile'] = $row['profile_id'];
		$_SESSION['rating'] = $row['client_rating'];
		$_SESSION['tokens'] = $row['client_tokens'];
		$_SESSION['company'] = $row['client_company_name'];
	  	//Change web page to Profile page
		header("Location: ../pages/profile.php");
		exit();
		}else {$message = 'Sorry, those credentials do not match';
	}

}else {$message = 'Please enter your login email address and password.';}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/style2.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet"> 
</head>
<body style="background:url('../media/img/1.png')">

	<div class="header">
		<a href="logout.php"><img src="../media/Sprites/ETO_FullLogo1.png" height="150"/></a>
	</div>

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Login</h1>
	<span>or <a href="../pages/register2.php">register here</a></span>

	<form action="../pages/login.php" method="POST">

		<input type="text" placeholder="Enter your email" name="email">
		<input type="password" placeholder="Enter your password" name="password">
		<button type="submit" id="default-btn" class="btn btn-info">Submit</button>

	</form>

</body>
</html>