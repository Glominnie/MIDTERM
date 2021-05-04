<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "acc";

$conn1 = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if($_SERVER['REQUEST_METHOD'] == "POST")
{	
	
	$user_name = $_POST['username'];
	$pass = $_POST['password'];
	$confirm = $_POST['cpass'];
	$email = $_POST['email'];
	$query_user = "SELECT * FROM users WHERE user_name ='$user_name'";
  	$query_em = "SELECT * FROM users WHERE email='$email'";
  	$exist_user = mysqli_query($conn1, $query_user);
  	$exist_em = mysqli_query($conn1, $query_em);

		if (empty($user_name)) {
		header("Location: register.php?error=User Name is required");
			exit();
		    
		}else if(mysqli_num_rows($exist_user) > 0){
			header("Location: register.php?error=Username already exists");	
			exit();
		}else if(empty($email)){
				header("Location: register.php?error=Email Address is required");
		    	exit();
		 
		}else if(mysqli_num_rows($exist_em) > 0){
			header("Location: register.php?error=Email Address already exists");		
			exit();
		}else if(empty($email)){
				header("Location: register.php?error=Email Address is required");
		    	exit();
		    
		}else if(mysqli_num_rows($exist_em) > 0){
			header("Location: register.php?error=Email Address already exists");		
			exit();	
		}else if(empty($pass)){
			header("Location: register.php?error=Password is required");
			exit();

		}else if(empty($confirm)){
			header("Location: register.php?error=Confirming password is required");
			exit();
		    
		} else if(!empty($user_name) && !empty($pass) && !empty($email))
			{

			if( strlen($pass ) < 8 ) {
				header("Location: register.php?error=Password must be atleast 8 characters");
			  	exit();
			}else if( !preg_match("#[0-9]+#", $pass ) ) {
				header("Location: register.php?error=Password must include at least one number!");
				exit();
			}else if( !preg_match("#[a-z]+#", $pass) ) {
				header("Location: register.php?error=Password must include at least one small 1letter!");
				exit();
			}else if( !preg_match("#[A-Z]+#", $pass ) ) {
				header("Location: register.php?error=Password must include at least one capital letter!");
				exit();
			}else if( !preg_match("#[\_@&!%]+#", $pass ) ) {
				header("Location: register.php?error=Password must include at least one symbol!");
				exit();

			}else if($_POST['password'] !== $_POST['cpass']) {
			header("Location: register.php?error=Password and Confirm password should match!");
				exit();
			
		    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		      	header("Location: register.php?error=Invalid email");
		      	exit();
		    }
			else
			{
				//save to database
				$query = "insert into users values (NULL, '$user_name', '$confirm', '$email')";

				mysqli_query($conn1,$query);

				// header("Location: loginform.php");
				}

		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<style>
#form{
				background-color:lightpink;
				border:2px;
				padding:1%;
				height: 330px;
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
		<h3 id="log">REGISTRATION FORM</h3>
		   <?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>
		<label class="user">Username</label>
		<input type="text" name="username"  placeholder="Enter your Username"  ><br></br>

		<label class="user">Password</label>
		<input type="text" name="password" placeholder="Enter your Password" ><br></br>

		<label class="user"> Confirm Password</label>
		<input type="text" name="cpass" placeholder="Confirm Password" ><br></br>

		<label class="user">Email Address</label>
		<input type="text" name="email" placeholder="Enter your email address"><br></br>

		<button type="submit" name="signup" class="login">Register</button></br>
		<a href="loginform.php" >Log in here</a>
	</form>
		</center>
</body>
</html>