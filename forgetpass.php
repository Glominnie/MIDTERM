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
		<h3 id="log">Forget password</h3>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<input type="text" name="verified_email" placeholder="Enter your verified email here" id="txtbox" ><br></br>


		<button type="submit" class="login" name="forget">Send</button></br>
	</form>
	</center>
</body>
</html>	

<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "acc";

$conn3 = mysqli_connect($dbhost ,$dbuser,$dbpass,$dbname);

if(isset($_POST['forget']))
{ 		
        $myemail = $_POST['verified_email'];
        
		$query_email= "SELECT * FROM users  WHERE email='$myemail'";
		$exist_em = mysqli_query($conn3, $query_email);

		$resultmails = mysqli_query($conn3, $query_email);

		if (empty($myemail)){
				header("Location: forgetpass.php?error=Enter your verified email");
						exit();

		}else if (!filter_var($myemail, FILTER_VALIDATE_EMAIL)) {
       header("Location: forgetpass.php?error=Invalid email");
        exit();

        }else if(mysqli_num_rows($exist_em) < 1 ){
			header("Location: forgetpass.php?error=Email Address Doesn't exists");		
			exit();	

		}else if(mysqli_num_rows($resultmails) === 1) {

			$row3 = mysqli_fetch_assoc($resultmails);
			 $_SESSION['email'] = $row3['email'];
			if($row3['email'] === $myemail){

					header("Location: changepass.php");
                 
		           	
		       			}
					}
				}

		?>