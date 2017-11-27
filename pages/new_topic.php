<?php 
session_start();
include('../php/database2.php');
include ("../php/nav.php");

if (isset($_SESSION['id'])) {
	include('../php/database2.php');
	$id = $_SESSION['first_name'];
	$results = mysqli_query($db,"select * from `clients` where `client_id` = '$id' ");
	$rows = mysqli_fetch_assoc($results);
	$image = $rows['profile_img'];
	 }
?>
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--	<link href="../css/style.css" rel="stylesheet" type="text/css" />-->
<!--	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->
<!--	<link href="../css/normalize.css" rel="stylesheet" type="text/css" />-->
<!--	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">-->
<!--	<link href = "../css/ETOstyle.css" rel="stylesheet" type="text/css">-->

<!--</head>-->
<!--<body>-->
        <!-- navbar -->
<!--		<nav class="navbar navbar-default navbar-fixed-top">-->
<!--		  <div class="container-fluid">-->
<!--		    <div class="navbar-header">-->
<!--		      <a class="navbar-brand" href="#">-->
<!--		        <img alt="Each1Teach1" src="../media/Sprites/ETO_LogoHome.png" height="48">-->
<!--		      </a>-->
<!--		    </div>-->
<!--		    <form method="POST" action="../php/Search2.php" class="navbar-form navbar-left" role="search">-->
<!--				  <div class="form-group">-->
<!--				    <input class="form-control" placeholder="Search" type="text">-->
<!--				  </div>-->
<!--			  <button type="submit" class="btn btn-default">Submit</button>-->
<!--			</form>-->
<!--			<ul class="nav navbar-nav navbar-right">-->
<!--		      <li><a href="../pages/users.php"><img alt="Home" src="../media/icn/Home.png" class="thumb"></a></li>-->
<!--		      <li class="active"><a href="../pages/chat.php"><img alt="Connect" src="../media/icn/Connects.png" class="thumb"></a></li>-->
<!--		      <li><a href="../pages/category.php"><img alt="Forums" src="../media/icn/Forums.png" class="thumb"></a></li>-->
<!--		      <li><a href = "../pages/profile.php"><img src="<php echo "images/".$image; ?>" style="margin-left:90px;width:30px;height:30px;" alt ="profile" ></a></li>-->
<!--					<li><a href="#"></a></li>-->
<!--					<li><a href="#"></a></li>-->
<!--					<li><a href="#"></a></li>-->

<!--		    </ul>-->
<!--		  </div>-->
<!--		</nav>-->
<!-- /.nav-collapse -->

<!--sidebar-->
    <div id="sidebar" class="col-xs-4 " >
		<?php
        $host="localhost";
        $username='eachteac_inga';
        $password="ingamgavu@1234!";
        $db_name="eachteac_eachteach";
        $tbl_name = "fquestions";
        $id  = $_GET['id'];
        
        $con = mysqli_connect("$host", "$username" ,"$password" , "$db_name");
        
        $sql="SELECT * FROM $tbl_name where categoryid = '$id' ORDER BY id DESC";
        
        $result=mysqli_query($con,$sql);
        ?>
        
        <table width="100%" border = "0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
        <td width="20%" align="center" bgcolor="orange">Topic</td>
        </tr>
        
        <?php
        
        while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
        <td bgcolor="#FFFFFF"><a href="../php/view_topic.php?id=<?php echo $row['id']; ?>"><?php echo $row['topic']; ?></a><BR></td>
        </tr>
        
        <?php
        }
        mysqli_close($con);
        ?>
        </table>
    </div>
<!--/.sidebar-->
<!-- content -->
    <div id="viewbox" class="pull-right col-xs-8">
       <H3><p><center><font color = "orange">New Topic</p></center></font></H3>
        <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
        <form id="form1" name="form1" method="post" action="../pages/add_new_topic.php">
        <td>
        <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
        <tr>
        <td colspan="3" bgcolor="orange"><strong>Create New Topic</strong> </td>
        </tr>
        <tr>
        <td width="14%"><strong>Topic</strong></td>
        <td width="2%">:</td>
        <td width="84%"><input name="topic" type="text" id="topic" size="50" /></td>
        </tr>
        <tr>
        <td valign="top"><strong>Detail</strong></td>
        <td valign="top">:</td>
        <td><textarea name="detail" cols="50" rows="3" id="detail"></textarea></td>
        </tr>
        <tr>
        <td><input name="name" type="hidden" id="name" size="50" value='<?php echo $_SESSION['first_name']; ?>'/></td>
        </tr>
        <tr>
        <td><input name="email" type="hidden" id="email" size="50" value='<?php echo $_SESSION['email']; ?>'/></td>
        <td><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" /></td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" class="btn btn-warning" name="Submit" value="Submit" />
        <input type="reset" class="btn btn-warning" name="Submit2" value="Reset" /></td>
        </tr>
        </table>
        </td>
        </form>
        </tr>
        </table>
	</div>
<!-- /.content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="bootstrap.min.js"></script>

</body>
</html>
