<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<style type="text/css">
   h1{color:orange;font-family: arial}
</style>
<?php
  session_start();
  include "database2.php";
       $sql = "INSERT INTO `reviews` (client_id,review_poster_id,review_poster_name,Message) VALUES (?,?,?,?)";
        $stmt = $mysqli->prepare($sql) or ('error');
        if($stmt !== TRUE) {
          if(isset($_POST['submit'])){

             $Message = " ";
             $Message = stripslashes($_POST['message']);
             //replace any '~' charactores with the '-' charactors
             $Message = str_replace('~','-',$Message);
             //$datetime = new DateTime(null, new DateTimeZone('Africa/Johannesburg'));
             //$datetime->format('Y-m-d H:i:s');
             //$datetime->getTimestamp();
            $posterid = $_SESSION['id'];
            $postedby = $_SESSION['first_name'];
            $searchedClient = $_SESSION['view_profile_id'];
            $stmt->bind_param("iiss", $searchedClient,$posterid,$postedby,$Message);
            $stmt->execute();
            $reviewid = $stmt->insert_id;
            $timestamp = date('Y-m-d H:i:s');
            $insert_timestamp = "UPDATE reviews 
                               SET review_date_time = '".$timestamp."'
                               WHERE review_id = '".$reviewid."'";
            if (mysqli_query($db, $insert_timestamp)) {
            echo "Recorded successfully.";
          } else {
              echo "Error: " . $insert_timestamp . "<br>" . mysqli_error($db);
          }
          mysqli_close($db);
            echo "It is completed";
          }
        }
           
   	   /*$MessageFile = fopen("MessageBoard/messages.txt","ab");
   	   if($MessageFile === FALSE)
   	   	echo "There was an error saving your message! \n";
   	   else{
   	   	 fwrite($MessageFile, $MessageRecord);
   	   	 fclose($MessageFile);
   	   	 echo "Your Message has been saved!.\n".'<br>';*/
   	  // }
   //}
?>
<!--<h1>Post New Message</h1>-->

<form action="PostMessages.php" method="POST"><br>
<span style="font-weight:bold" style="font-family:arial">Subject: </span>
 <span style="font-weight:bold" style="font-family:arial">Name: </span>
 <input type="hidden" name="name" placeholder="enter your name" value='<?php echo $postedby ?>'>
 <p>
 <?php // now to make the text area to type the comments ?>
 <textarea name="message" rows="6" cols="80" placeholder="Type comment here"></textarea><br /> 
 <style type="text/css">
button{
     background: orange;
    border: 2px solid;
    border-radius: 25px ;
}

 </style>

 <button type="submit" name="submit">Post Comment</button>
 <a href="MessageBoard.php" ><img src="download.jpg" height="20" /></a>
 </form>
<p>
</p>

</body>
</html>