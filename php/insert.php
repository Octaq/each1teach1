<?php
session_start();
include('database2.php');

$uname = $_REQUEST['uname'];
$msg = $_REQUEST['msg'];
$to = $_REQUEST['to'];

mysqli_query($db,"INSERT INTO logs (`username`, `msg`, `to`) VALUES ('$uname', '$msg', '$to')");

$result1 = mysqli_query($db,"select * from `logs` where `username` = '".$uname."' and `to` ='".$to."' or `username` = '".$to."' and `to` ='".$uname."' ORDER BY id DESC");

while($extract = mysqli_fetch_array($result1)) {
	if($to == $extract['to'])
	{
	echo "<h4 style='margin-left:200px;background-color:yellow;width:400px;border-radius:8.5px;'>".$extract['username']." : ".$extract['msg']."</h4>";
	}
	else {
	echo "<h4 style='margin-left:-200px;background-color:orange;width:400px;border-radius:8.5px;'>".$extract['username']." : ".$extract['msg']."</h4>";
	}
}
