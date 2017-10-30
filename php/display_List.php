<?php
 include('database2.php');
?>
<html>
  <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <link href="<?php echo $design; ?>/style.css>" rel="stylesheet" title="Style"/>
     <title>LIST OF USERS </title>

   </head>
   <body>
   <div class="header">
     <a href="<?php echo $url_home; ?>"><img src="echo $design; ?>"/ETO_FullLogo1.png" alt="Suggestions" /></a>
   </div>
   <div class="content">
      <h3>Sugestions<h3/>
      <br/>
      <?php
       //we get the IDs username and email of users
       $req  = mysqli_query($db, "SELECT client_id, client_lastname, client_firstname, client_degree,client_occupation,client_rating,profile_img FROM clients");
       while($row=mysqli_fetch_array($req)){

            echo "<div class='left'>";
            echo "-------------------------------------------------------------------------------------------------"."<br>";
          echo "<img src='images/".$row['profile_img']."'>";
            echo  "<a href= 'viewprofile.php?result_id=".$row['client_id']."'>".$row['client_firstname']." ".$row['client_lastname']."<br>";
                echo "</a>";
            echo $row['client_degree'] ."<br/>";
            echo $row['client_occupation'] .$row['client_rating']."</br>";
            echo "-------------------------------------------------------------------------------------------------";
            echo  "</div>";
       }
      ?>
  </div>
  <div class="foot"><a href="<?php echo $url_home; ?>" Go Home </a></div>
