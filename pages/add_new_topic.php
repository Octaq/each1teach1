<?php
$host="localhost";
$username='eachteac_inga';
$password="ingamgavu@1234!";
$db_name="eachteac_eachteach";
$tbl_name="fquestions"; 
 
$con = mysqli_connect("$host", "$username" ,"$password" , "$db_name");
 
$topic=$_POST['topic'];
$detail=$_POST['detail'];
$name=$_POST['name'];
$email=$_POST['email'];
$id = $_POST['id'];
$fid = $_GET['fid'];
 
$datetime=date("d/m/y h:i:s"); 
 
$sql="INSERT INTO $tbl_name(topic, categoryid ,detail, name, email, datetime)VALUES('$topic','$id' ,'$detail', '$name', '$email', '$datetime')";
$result=mysqli_query($con,$sql);
 
if($result){
header("Location: ../pages/main_forum.php?id=".$id);
}
else {
echo "ERROR";
}
mysqli_close($con);
?>