<?php
    include 'database2.php';
   if(isset($_POST['submit'])){
   	//the real_esape_string thing is just for security perposes
   	//the $q is the variable for the searched item by the user
   	$search = mysqli_real_escape_string($db,$_POST['search']);
   	//this is the drop down that the user has selected
   	//$column =mysqli_real_escape_string($conn,$_POST['column']);
   	//this $q is just to output the search that the user has entered
     
       $sql = "SELECT * FROM clients WHERE client_lastname LIKE '%$search%' OR client_firstname LIKE '%$search%' OR client_degree LIKE '%$search%'";
       //now to take the query into the database
        $results =mysqli_query($db,$sql);
        //now for the query results
        $query_results = mysqli_num_rows($results);
        
         if($query_results > 0){
              /*foreach ($query_results as $row){
                $url = "viewprofile.php?result_id=".($row['client_id']);
                $name = $row['client_lastname']." ".$row['client_firstname']."<br>";
                echo "<li>";
                do_html_url($url,$name);
                echo "</li>";
              }*/
              while($row =  mysqli_fetch_assoc($results)){
                echo "<div class='SearchResults'>";
                echo "<img src='images/".$row['profile_img']."'>";
                echo  "<a href= 'viewprofile.php?result_id=".$row['client_id']."'>".$row['client_firstname']." ".$row['client_lastname']."<br>";
                echo "</a>";
                echo "Degree: ".$row['client_degree']."<br>";
                echo " Rating : ".$row['client_rating']."<br>";
                echo "Occupation: ".$row['client_occupation']."<br>";
              // $_SESSION['result_id'] = $row['client_id'];
                //$message = .$row['client_firstname']." ".$row['client_lastname']."<br>";
                //$_SESSION['profile_viewer']= $message;
                  echo "</div>";
              }
         }else{echo "there are no search results"; }
   	 }
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="searchstyle.css">
</head>
<body>
 
 <style type="text/css">
    a{
      color: black
    };
 
 </style>
</body>
</html>