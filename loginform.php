<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
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
		<h3 id="log">LOGIN FORM</h3>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label class="user">Username</label>
		<input type="text" name="username" placeholder="Enter Username" id="txtbox" ><br></br>

		<label class="user">Password</label>
		<input type="password" name="password" placeholder="Enter Password" id="txtbox" ><br></br>
		<a href="forgetpass.php">Forget Password?</a><br>
		<button type="submit" class="login">Login</button></br>

		<a href="register.php">Register Here</a>	
	</form>
	</center>
</body>
</html>	

<?php
session_start();

include("dbconnect.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$user_name = $_POST['username'];
	$pass = $_POST['password'];

	if(!empty($user_name) && !empty($pass))
		{
			//READ to database
			$query = "select * from users where user_name = '$user_name' limit 1" ;
			$result = mysqli_query($con, $query);

			}else if (empty($user_name)) {
						header("Location: loginform.php?error=User Name is required");
						exit();
			}else if(empty($pass)){
						header("Location: loginform.php?error=Password is required");
						exit();
							}

				if ($result)
				{
					if($result && mysqli_num_rows($result) > 0)
						{
						$user_data = mysqli_fetch_assoc($result);
						$_SESSION['email'] = $user_data['email'];
						$_SESSION['user_id'] = $user_data['user_id'];
						if ($user_data['password'] === $pass)
						{	
							 $_SESSION["code_access"] = true;
							 $_SESSION["verify"] = true;
							header("Location: verification.php");
							die;
						}
							header("Location: loginform.php?error=Incorrect Username and Password");
		
						}
						else {
							header("Location: loginform.php?error=Incorrect Username and Password");
					}
}
					}
 ?>