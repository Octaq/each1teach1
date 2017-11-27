<?php
session_start();
require '../php/database2.php';
include '../php/nav.php';
$message = '';

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {

	// Enter the new user in the database
	$id = $_SESSION['id'];

	$sql = "UPDATE `clients` 
			SET client_lastname = ?,client_firstname = ?,client_email = ?,client_password = ?,client_high_school = ?,client_jobtitle = ?,client_institution = ?,client_location = ?,client_degree = ?,client_occupation = ?, client_company_name = ?, client_bio = ? 
			WHERE client_id = '".$id."'";

	$stmt = $db->prepare($sql);
	if($stmt !== TRUE) {
		if($_POST['password'] === $_POST['confirm_password']){
			//echo 'Assignment of variables successful <br/>';
			$lname =  $_POST['last_name'];
			$fname =  $_POST['first_name'];
			$email =  $_POST['email'];
		//	$pass =  password_hash($_POST['password'], PASSWORD_BCRYPT);
			$pass =  md5($_POST['password']);
			$highschool =  $_POST['High_School'];
			$jobtitle =  $_POST['jobtitle'];
			$institution =  $_POST['Institution'];
			$occupation =  $_POST['Occupation'];
			$location =  $_POST['Location'];
			$degree =  $_POST['Degree'];
			$company =  $_POST['company'];
			$bio =  $_POST['Bio'];

			$stmt->bind_param('ssssssssssss',$lname,$fname,$email,$pass,$highschool,$jobtitle,$institution,$location,$degree,$occupation,$company,$bio);
		    //$register = 'Bind Parameters Successful <br/>';
		}else{$register = "The passwords you entered don't match. <br/>";}
	}
	//else {echo "The passwords you entered don't match. <br/>";}

	if( $stmt->execute() ){
			header('location: ../pages/profile.php');//redirect to home page
			exit();
	}else{
		$message = 'Sorry there must have been an issue editing your account';
	};
}
$id = $_SESSION['id'];
$result = mysqli_query($db,"select * from clients where client_id = '$id' ");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<body>
<!DOCTYPE html>
<html>
<head>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="../css/normalize.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
	<link href = "../css/ETOstyle.css" rel="stylesheet" type="text/css">

</head>
<body>
<?php
if (isset($_SESSION['id'])) {
	include('../php/database2.php');
	$id = $_SESSION['id'];
	$results = mysqli_query($db,"SELECT * FROM `clients` WHERE `client_id` = '".$id."' ");
	$rows = mysqli_fetch_assoc($results);
	$image = $rows['profile_img'];
	 }
?>
<!--sidebar-->
    <div id="sidebar" class="col-xs-3 " >
    	<H3><p><center><font color = "grey">PROFILE</p></center></font></H3>
    
    	<iframe class ="frame" src = "../php/profile_pic.php" scrolling = "no" height="225px" width="200px" border = "red"></iframe>
        <br>
    	<br>
    	<a href='../pages/edit_profile.php'>Edit Profile</a></br>
    	<br>Credits</br>
    	<form method = "POST" action = "../pages/logout.php">
    			<b><input type = "submit" value= "logout"></input></b>
    	</form>
    </div>
<!--/.sidebar-->

<!-- content -->
    <div id="viewbox" class="pull-right col-xs-9">
    <H3><p><font color = "orange">ACCOUNT INFOMATION</p></font></H3>
    	<form action="../pages/edit_profile.php" method="POST">
    	<input type="text" placeholder="Enter your First Name" name="first_name" value="<?php echo $rows['client_firstname']; ?>">
        <input type="text" placeholder="Enter your Last Name" name="last_name" value="<?php echo $rows['client_lastname']; ?>">
        <input type="text" placeholder="Enter your email" name="email" value="<?php echo $rows['client_email']; ?>">
        <input type="password" placeholder="and password" name="password" value="<?php echo $rows['client_password']; ?>">
        <input type="password" placeholder="confirm password" name="confirm_password" value="<?php echo $rows['client_password']; ?>">
    	<input type="text" placeholder="Enter your High School" name="High_School" value="<?php echo $rows['client_high_school']; ?>">
        <input type="text" placeholder="Enter your Job Title" name="jobtitle" value="<?php echo $rows['client_jobtitle']; ?>">
        <input type="text" placeholder="Enter your Institution" name="Institution" value="<?php echo $rows['client_institution']; ?>">
        <input type="text" placeholder="Enter your Location" name="Location" value="<?php echo $rows['client_location']; ?>">
        <input type="text" placeholder="Enter your Degree" name="Degree" value="<?php echo $rows['client_degree']; ?>">
        <input type="text" placeholder="Enter your Occupation" name="Occupation" value="<?php echo $rows['client_occupation']; ?>">
    	<input type="text" placeholder="Enter your Bio" name="Bio" value="<?php echo $rows['client_bio']; ?>">
    	<input type="text" placeholder="Enter your Company Name" name="company" value="<?php echo $rows['client_company_name']; ?>">
    	<input type="submit" value="Save Changes" />
    
    	</form>

</body>
</html>