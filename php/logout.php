<?php
if (isset($_POST['submit'])){
	session_start();
	//$message = 'Until next time, '.$_SESSION['first_name'];
	$_SESSION = array();
	session_unset();
	session_destroy();
	header("Location: /login2.php");
	exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Each1Teach1</title>
		<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet" type="text.css">
	<link rel="stylesheet" type="text/css" href="style3.css">

</head>
<body>

	<div class="header">
		<a href="/"><img src="ETO_FullLogo1.png" height="150" /></a>
	</div>

	<?php if( !empty($user) ): ?>

		<br />Welcome <?= $user['First_Name']; ?>
		<br /><br />

	      click <a href="http://www.each1teach1.cf">here</a> to continue

		<br /><br />
		<a href="logout.php">Logout?</a>
		<style type="text/css">

		</style>

	<?php else: ?>

		<h1>Welcome to Each1Teach1</h1>
		<p>this is the best thing that can heppen in your life right now in the history of learning</p><br>
<form method = "POST" action = "login2.php">
		<input type = "submit" value= "Login"></input>
</form>
<form method = "POST" action = "register2.php">
<input type = "submit" value= "Register">
</form>

	<?php endif; ?>

</body>
</html>
