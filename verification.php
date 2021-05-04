<!DOCTYPE html>
<html>
<head>
	<title>AUTHENTICATION</title>
</head>
<style>
			#form{
				background-color:lightpink;
				border:2px;
				padding:1%;
				height: 300px;
				width:30%;
				opacity: 75%;
				border-radius:15px;
				margin-top:140px;

			}
			#user{
				text-align:left;
			}
			#forget{
				font-color:blue;
			}
			.login{
				background-color:lightblue;
				font-family:arial;
				padding:1px;
			}
			a{
				text-decoration:none;
				font-size:13px;
			}
			.user{
				font-family:arial;
				font-size:18px;
			}
			#txtbox{
				height: 15px;
				width: 200px;
				font-size:15px;
			}
			.login
		{
		    border: none;
			height:25px;
			width: 80px;
			background-color:violet;
			font-color:white;
			font-size:18px;
			border-radius: 25px;
		}
		.text
		{	
			font-size:15px;
			font-family:verdana,san-serif;
			color:#36648B;
			margin-top:-15px;

		}
		body{
		 	background-image: url('glom3.jpg');
  			background-repeat: no-repeat;
  			background-attachment: fixed;
  			background-size: 100% 100%;
			}
		img {
			height:100px;
			width:100px;
			margin-top:-60px;
		}
		</style>
<body>
	<center>
	<form method="post" id="form">
		<img src="logo.png">
		<h3 id="log">Authentication Code</h3>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<input type="text" name="mycode" placeholder="Enter your code here" id="txtbox" ><br></br>


		<button type="submit" class="login" name="sub">Submit</button></br>
		 <a class="" style="color: black;" href="authentic.php" target="_blank">GET CODE</a>
	</form>
	</center>
</body>
</html>	

<?php
session_start();
include ("dbconnect.php");

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "acc";

 $conn2 = mysqli_connect($dbhost ,$dbuser,$dbpass,$dbname);

date_default_timezone_set('Asia/Manila');
$currentDate = date('Y-m-d H:i:s');


if(isset($_POST['sub']))
{ 
    if(empty(trim($_POST["mycode"]))){
        header("Location: loginform.php?error=Please enter your code in Authentication");
		exit();
    } else{ 

        
        $mycode = $_POST['mycode'];
        $id= $_SESSION["user_id"];
        $act = "Login";
        
		$query_code = "SELECT * FROM code WHERE a_code='$mycode'";

		$result2 = mysqli_query($conn2, $query_code);

		$query3 = "SELECT expiration FROM code where a_code='$mycode'";
        $result3 = mysqli_query($conn2, $query3);

       $sql4 = "INSERT INTO event_log (userid, activity) VALUES ('$id','$act' )";

		if(mysqli_num_rows($result2) === 1) {
			$row2 = mysqli_fetch_assoc($result2);
			if($row2['a_code'] === $mycode){
				if (mysqli_num_rows($result3) === 1){
					 $row3 = mysqli_fetch_assoc($result3);
                	if(($row3["expiration"]) > ($currentDate))
                	{
                    	$result4 = mysqli_query($conn2, $sql4) or die(mysqli_error($conn2));
				            if($result4){
							header("Location: homepage.php");	
							}
							else{
							echo "Event recorder crash";
							}

					}else{
					header("Location: verification.php?error=Expired Code");
					die;
				}
			}
			}else{
			header("Location: verification.php?error=Incorrect Code");
			exit();
       			}
		}else{
			header("Location: verification.php?error=Incorrect Code");
			exit();
       }
   }
}
		?>