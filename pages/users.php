<?php
session_start();
include('../php/database2.php');
include ("../php/nav.php");

     
    if (isset($_SESSION['id'])) {
	$id = $_SESSION['id'];
	$results = mysqli_query($db,"select * from `clients` where `client_id` = '$id' ");
	$rows = mysqli_fetch_assoc($results);
	$image = $rows['profile_img'];
	 }
?>

<!--sidebar-->
    <div class="conatainer-fluid">
        <div id="sidebar" class=" col-xs-12 col-md-3 text-center" >
        	<h3><font color = "grey">PROFILE</font></h3>
            
        	<iframe class ="frame" src = "../php/profile_pic.php" scrolling = "no" height="275px" width="250px" border = "red"></iframe>
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
    <div id="viewbox" class="pull-right col-xs-9">
        <H3><p><center><font color = "orange">Suggestions</p></center></font></H3>
        <?php
            $page = basename($_SERVER['PHP_SELF']);
            $search = '';
            $sql = "SELECT * FROM clients WHERE client_lastname LIKE '%$search%' OR client_firstname LIKE '%$search%' OR client_degree LIKE '%$search%'";
            $results =mysqli_query($db,$sql);
            $query_results = mysqli_num_rows($results);
        
         if($query_results > 0){

              while($row =  mysqli_fetch_assoc($results)){
                echo "<div style='background-color:orange;' class='SearchResults'>";
                if ($row['profile_img']==''){echo "<img src='../media/images/Profile_Blank.png' style='width:50px;height='50px;' class = 'img-circle'>";}
                elseif (!isset($row['profile_img'])){echo "<img src='../media/images/Profile_Blank.png' style='width:50px;height='50px;' class = 'img-circle'>";}
                else {echo "<img src='../media/images/".$row['profile_img']."' style='width:50px;height='50px;border-radius:50%;' class = 'img-circle'>";}
                echo  "<a style='font-size:30px; font-weight:bold; text-decoration:none;' href='../pages/viewprofile.php?result_id=".$row['client_id']."'>".$row['client_firstname']." ".$row['client_lastname']."<br>";
                echo "</a>";
                $name = $row['client_firstname'];
                echo "Degree: ".$row['client_degree']."<br>";
                $occupation = $row['client_occupation'];
                echo "<div style='display:inline-block;margin-top:0px;'> Rating :</div> ";?><div style='margin-top:0px;display:inline-block;'><?php include('../php/ratings.php'); echo "</div><br>";
                echo "Occupation: ".$occupation."<br>";
                  echo "</div>";
                  echo "";
                  echo "<br>";
              }
         }else{echo "there are no search results"; }
?>

	</div>
<!-- /.content -->
</body>
</html>