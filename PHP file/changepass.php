<!DOCTYPE html>
<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "acc";

$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if($_SERVER['REQUEST_METHOD'] == "POST")
{ 

  $pwd = $_POST['new'];
  $cpwd = $_POST['confnew'];
  // $em=$_POST['old'];
  
  if(empty( $pwd)){
      header("Location: changepass.php?error=Password is required");
      exit();

    }else if(empty($cpwd)){
      header("Location: changepass.php?error=Confirming password is required");
      exit();
    // }else if(empty($em)){
    //   header("Location: forgot.php?error=email is required");
    //   exit();
    // }else if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
    //    header("Location: forgot.php?error=Invalid email");
    //     exit();  
    } else if(!empty($pwd) && !empty($cpwd))
      {
        if( strlen($pwd ) < 8 ) {
          header("Location: changepass.php?error=Password must be atleast 8 characters");
            exit();
        }else if( !preg_match("#[0-9]+#",  $pwd ) ) {
          header("Location: changepass.php?error=Password must include at least one number!");
          exit();
        }else if( !preg_match("#[a-z]+#",  $pwd) ) {
          header("Location: changepass.php?error=Password must include at least one small 1letter!");
          exit();
        }else if( !preg_match("#[A-Z]+#",  $pwd ) ) {
          header("Location: changepass.php?error=Password must include at least one capital letter!");
          exit();
        }else if( !preg_match("#[\_@&!%]+#",  $pwd) ) {
          header("Location: changepass.php?error=Password must include at least one symbol!");
          exit();

        }else if($_POST['new'] !== $_POST['confnew']) {
        header("Location: changepass.php?error=Password and Confirm password should match!");
          exit();
          
        }else{

        	$em=$_SESSION['email'];

        	// echo $em;
        	$query_pass="UPDATE users set password='$cpwd' where email='$em'";

   			$run2 = mysqli_query($connect,$query_pass) or die(mysqli_error($connect));



   			if ($run2){
   				header("Location: loginform.php");
   			}
   		}
   	}
   }



?>
<html>
<head>
	<title>CHANGE PASSWORD</title>
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
		<h3 id="log">Change Password</h3>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>New pass</label>
		<input type="password" name="new" placeholder="Enter your verified email here" id="txtbox" ><br></br>
		<label>Confirm pass</label>
		<input type="password" name="confnew" placeholder="Enter your verified email here" id="txtbox" ><br></br>
		
		<center><input type="submit" class="login" value="Submit" name="submit"></center>
	</form>
	</center>
</body>
</html>	

