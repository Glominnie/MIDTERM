<?php
session_start();

include ("dbconnect.php");


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
</head>
<body>
	<h1>Hello, <?php echo $_SESSION['user_id']; ?> </h1>
	<a href="display.php" >View Activity</a><br><br>
	<a href="logout.php">logout</a>

</body>
</html>

