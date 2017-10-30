<!DOCTYPE html>
<html>
<head>
	<title>PHP Search Form</title>
</head>
<body>
<style type="text/css">
#div{
	background-color: orange;
	border: 1.5px solid black;
	width: 200px;
	border-radius: 5px;
}
input{
	border-radius: 2.5px;
	height: 20px;
}
.moveimage{
	position: relative;
	top: 3px;
}
	button{
	width: 30px;
	height: 20px;
	border-color: transparent;
	background-color: orange;
	}
</style>
  <form method="POST" action="search2.php">
  <div id = "div">
    <input type="text" name ="search" placeholder="Search">
    <button type="submit" name="submit" value="Search" img class = "moveimage"><img src="SearchIcon.png" width="14px" /></button>
    </div>
    </form>
</body>
</html>