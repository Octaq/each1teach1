<?php
session_start();
include('../php/database2.php');
include ("../php/nav.php"); 
if (isset($_SESSION['loggedin'])) {
	$message = $_SESSION['loggedin'];
}
elseif ( isset($_SESSION['success']) ){
	$message = $_SESSION['success'];
}
$page = basename($_SERVER['PHP_SELF']);
$name = $_SESSION['first_name'];

?>
<?php
if (isset($_SESSION['id'])) {
	$id = $_SESSION['id'];
    $fetch = "SELECT * FROM `clients` WHERE client_id = '".$id."' ";
	$results = mysqli_query($db,$fetch);
	$rows = mysqli_fetch_assoc($results);
	$image = $rows['profile_img'];
    $_SESSION['last_name'] =  $rows['client_lastname'];
    $_SESSION['high_school'] =  $rows['client_high_school'];
    $_SESSION['jobtitle'] = $rows['client_jobtitle'];
    $_SESSION['institution'] = $rows['client_institution'];
    $_SESSION['location'] = $rows['client_location'];
    $_SESSION['degree'] = $rows['client_degree'];
    $_SESSION['bio'] = $rows['client_bio'];
    $_SESSION['occupation'] = $rows['client_occupation'];
    $_SESSION['cellno'] = $rows['client_cell_no'];
    $_SESSION['profile'] = $rows['profile_id'];
    $_SESSION['tokens'] = $rows['client_tokens'];
    $_SESSION['company'] = $rows['client_company_name'];
	 }
else{header("Location: ../pages/login.php");}
?>

<!--sidebar-->
    <div class="conatainer-fluid">
        <div id="sidebar" class=" col-xs-12 col-md-3 text-center" >
        	<h3><font color = "grey">PROFILE</font></h3>
            
        	<iframe class ="frame" src = "../php/profile_pic.php" scrolling = "no" height="250px" width="250px" border = "red"></iframe>
            <br>
        	<br>
        	<a href='../pages/edit_profile.php'>Edit Profile</a></br>
        	<br>Credits</br>
        	<form method = "POST" action = "../index.php">
        			<input type = "submit" value= "logout"></input>
        	</form>
        </div>
    </div>
    
<!--/.sidebar-->

<!-- content -->
    <div class="container-fluid">
        <div id="viewbox" class="col-xs-12 col-md-9 ">
        		<H3><p><center><font color = "orange">ACCOUNT INFOMATION</p></center></font></H3>
        	<?php if( !empty($message) ): ?>

                <h3><?= $message; ?></h3>
                <br /><?php require('../php/ratings.php'); ?>
                <br />BIO               :  <?= $_SESSION['bio']; ?>
                <br />First Name        : <?= $_SESSION['first_name']; ?>
                <br />Last Name         :  <?= $_SESSION['last_name']; ?>
                <br />Email Address     :  <?= $_SESSION['email']; ?>
                <br />High School       : <?= $_SESSION['high_school']; ?>
                <br />Job Title         : <?= $rows['client_jobtitle']; ?>
                <br />Institution       :  <?= $_SESSION['institution']; ?>
                <br />Degree            :  <?= $_SESSION['degree']; ?>
                <br />Occupation        :  <?= $_SESSION['occupation']; ?>
                <br />Company Name      :  <?= $_SESSION['company']; ?>
                <br /><br />

                <div id="comments"><H3><p><center><font color = "orange">COMMENTS</H3></p></center></font>

        <?php
        //this line is to enable the user to be able to delete message and add new
        //elements in the array
              $search_comments = "SELECT * FROM reviews WHERE client_id = '$id' ORDER BY review_date_time desc";
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
                </div>


        <?php else: ?>

            <h1>Please Login or Register</h1>
            <a href="login2.php">Login</a> or
            <a href="register2.php">Register</a>

        <?php endif; ?>

        </div>

    </body>
    </html>
    <style>
    /* Popup container - can be anything you want */
    .popup {
        position: relative;
        display: inline-block;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* The actual popup */
    .popup .popuptext {
        visibility: hidden;
        width: 500px;
        height: 200px;
        background-color: orange;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 8px 0;
        position: absolute;
        z-index: 1;
        bottom: 200px;
        left: 50%;
        margin-left: -80px;
    }

    /* Popup arrow */
    .popup .popuptext::after {
        content: "";
        position: absolute;
        top: 10%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent transparent transparent;
    }

    /* Toggle this class - hide and show the popup */
    .popup .show {
        visibility: visible;
        -webkit-animation: fadeIn 1s;
        animation: fadeIn 1s;
    }

    /* Add animation (fade in the popup) */
    @-webkit-keyframes fadeIn {
        from {opacity: 0;} 
        to {opacity: 1;}
    }

    @keyframes fadeIn {
        from {opacity: 0;}
        to {opacity:1 ;}
    }
    </style>

    <div class="popup" onclick="myFunction()">*
      <span class="popuptext" id="myPopup">Hi There Thanks for Signing up with ETO! <br><br>To get maximum benefit from our site,<br><br> please enter more details about yourself in edit profile.<br><br> Thank you very much!!!</span>
    </div>

    <script>
    function myFunction() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
    function stop() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("hide");
    }
    myFunction();
    setInterval(function(){stop();},5000);

    </script>