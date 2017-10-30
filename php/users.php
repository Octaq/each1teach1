<?php
//This page displays a list of all registered members
include('database2.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <title>List of all the users</title>
    </head>
    <body>
        <div class="content">
<?php
if(isset($_SESSION['client_firstname']))
{
$nb_new_pm = mysqli_fetch_array(mysqli_query($db,'select count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['client_id'].'" and user1read="no") or (user2="'.$_SESSION['client_id'].'" and user2read="no")) and id2="1"'));
$nb_new_pm = $nb_new_pm['nb_new_pm'];
?>
<div class="box">
	<div class="box_left">
    	<a href="<?php echo $url_home; ?>">Forum Index</a> &gt; List of all the users
    </div>
	<div class="box_right">
    	<a href="list_pm.php">Your messages(<?php echo $nb_new_pm; ?>)</a> - <a href="profile.php?id=<?php echo $_SESSION['client_id']; ?>"><?php echo htmlentities($_SESSION['client_firstname'], ENT_QUOTES, 'UTF-8'); ?></a> (<a href="login.php">Logout</a>)
    </div>
    <div class="clean"></div>
</div>
<?php
}
else
{
?>
<div class="box">
	<div class="box_left">
    	<a href="<?php echo $url_home; ?>">Forum Index</a> &gt; List of all the users
    </div>
	<div class="box_right">
    	<a href="signup.php">Sign Up</a> - <a href="login.php">Login</a>
    </div>
    <div class="clean"></div>
</div>
<?php
}
?>
This is the list of all the users:
<table>
    <tr>
    	<th>ID</th>
    	<th>Username</th>
    	<th>Email</th>
		<th>contact<th>
    </tr>
<?php
$req = mysqli_query($db,'select client_id, client_firstname, client_email from clients');
while($dnn = mysqli_fetch_array($req))
{
?>
	<tr>
    	<td><?php echo $dnn['client_id']; ?></td>
    	<td><a href="profile.php?client_id=<?php echo $dnn['client_id']; ?>"><?php echo htmlentities($dnn['client_firstname'], ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td><?php echo htmlentities($dnn['client_email'], ENT_QUOTES, 'UTF-8'); ?></td>
		<td><a style='color:blue;' href='chat.php?to=<?php echo $dnn['client_firstname']; ?>'>connect</a></td>
    </tr>
<?php
}
?>
</table>
		</div>
		<div class="foot"><a href="http://www.webestools.com/scripts_tutorials-code-source-26-simple-php-forum-script-php-forum-easy-simple-script-code-download-free-php-forum-mysql.html">Simple PHP Forum Script</a> - <a href="http://www.webestools.com/">Webestools</a></div>
	</body>
</html>
