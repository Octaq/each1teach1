<!DOCTYPE html>
<html>
<head>
	<title>Image Upload</title>
	<h2> Image Upload</h2>
<?php
session_start();
include "database2.php";
	//$_SESSION['id'] = 3;
	$id = $_SESSION['id'];
	if (isset($_POST['upload']) && isset($_SESSION['id'])){
		$target = "images/".basename($_FILES['image']['name']);

		$image = $_FILES['image']['name'];
		//$sql = "INSERT INTO images (image) VALUES ('$image')";
		$sql = "UPDATE clients
				SET profile_img = '".$image."'
				WHERE client_id = '".$id."'";
		mysqli_query($db, $sql);

		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
		}
	}

	$profile_image = "SELECT profile_img FROM `clients` WHERE client_id = '".$id."'";
	$result = mysqli_query($db, $profile_image);
	//$row = mysqli_fetch_array($result);
	if((mysqli_num_rows($result)>=0) && ($profile_image != "")){
		//while($row = mysqli_fetch_array($result)){
				echo "<div id='img_div'>";
				$row = mysqli_fetch_array($result);
					echo "<img src='images/".$row['profile_img']."'>";
				echo "</div>";
		//}
	}else{
		echo "<img src='ETO_FullLogo1.png'>"."<br/>"."<br/>"."<br/>"."<br/>".
		"<br/>"."<br/>";
	}
		echo "<form method='POST' action='index3.php' enctype='multipart/form-data'>
			     <input type='file' name='size' value='1000000'>
			           <div>
				   <input type='hidden' name='image'>
			      </div>
			    <div>
				  <button type='submit' name='upload'>POST</button>
			     </div>
		     </form>";
?>
	<div id="content">
	<style type="text/css">
		#content{
			width: 50%;
			margin: 20px auto;
		}
		form{
			float: left;
			width: 50%;
			margin: 20px auto;
		}
		form div{
			margin-top: 5px;
		}
		#img_div{
			width: 80%;
			padding: 5px;
			margin: 15px auto;
		}
		#img_div:after{
			content: "";
			display: block;
			clear: both;
		}
		img{
			float: left;
			width: 100px;
			height: 100px;
        border-radius: 50%;
		}
    img.round{
      border-radius: 50%;
    }
	</style>
</head>
</html>
