<?php
session_start();
$host="localhost";
$username='eachteac_inga';
$password="ingamgavu@1234!";
$db_name="eachteac_eachteach";
$tbl_name="fcategory";

$con = mysqli_connect("$host", "$username" ,"$password" , "$db_name");

$sql="SELECT * FROM $tbl_name ORDER BY id DESC";

$result=mysqli_query($con,$sql);
?>
<?php
include('../php/database2.php');
include ("../php/nav.php");
if (isset($_SESSION['id'])) {
	
	$id = $_SESSION['id'];
	$results = mysqli_query($db,"select * from `clients` where `client_id` = '$id' ");
	$rows = mysqli_fetch_assoc($results);
	$image = $rows['profile_img'];
	 }
?>
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
<!--		      <li><a href="../pages/chat.php"><img alt="Connect" src="../media/icn/Connects.png" class="thumb"></a></li>-->
<!--		      <li class="active"><a href="../pages/category.php"><img alt="Forums" src="../media/icn/Forums.png" class="thumb"></a></li>-->
<!--		      <li><a href = "../pages/profile.php"><img src="<php echo "images/".$image; ?>" style="margin-left:90px;width:30px;height:30px;" alt ="profile" ></a></li>-->
<!--					<li><a href="#"></a></li>-->
<!--					<li><a href="#"></a></li>-->
<!--					<li><a href="#"></a></li>-->

<!--		    </ul>-->
<!--		  </div>-->
<!--		</nav>-->
<!-- /.nav-collapse -->

<!--sidebar-->
    <div id="category" class="col-xs-4" >
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
        <td width="53%" align="center" bgcolor="orange"><strong>Category</strong></td>
        </tr>
        
        <?php
        
        while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
        <td bgcolor="#FFFFFF"><a href="../pages/main_forum.php?id=<?php echo $row['id']; ?>"><?php echo $row['category']; ?></a><BR><?php echo $row['detail']; ?></td>
        </tr>
        
        <?php
        }
        mysqli_close($con);
        ?>
        </table>
	</form>
    </div>
<!--/.sidebar-->
<!-- content -->
    <div id="viewbox" class="pull-right col-xs-8">
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
        
        <table width="70%" border = "0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
        <td width="20%" align="center" bgcolor="orange">Topic</td>
        <td width="15%" align="center" bgcolor="orange">Views</td>
        <td width="13%" align="center" bgcolor="orange"><strong>Replies</strong></td>
        </tr>
        
        <?php
        
        while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
        <td bgcolor="#FFFFFF"><a href="../php/view_topic.php?id=<?php echo $row['id']; ?>"><?php echo $row['topic']; ?></a><BR></td>
        <td align="center" bgcolor="#FFFFFF"><?php echo $row['view']; ?></td>
        <td align="center" bgcolor="#FFFFFF"><?php echo $row['reply']; ?></td>
        </tr>
        
        <?php
        }
        mysqli_close($con);
        ?>
        
        <tr>
        <td colspan="5" align="right" bgcolor="orange"><a href="../pages/new_topic.php?id=<?php echo $_GET['id']; ?>"><button class="btn btn:hover" >Create New Topic</button> </a></td>
        </tr>
        </table>

	</div>
<!-- /.content -->
</body>
</html>
