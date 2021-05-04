<!DOCTYPE html>
 <html>
<head>
    <title>Code</title>
</head>
<body>
</body>
</html> 
 <?php
 session_start();
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "acc";

        $conn3 = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

        date_default_timezone_set('Asia/Manila');

        $_SESSION["gencode"]=rand(100000,999999);
        $currentDate = date('Y-m-d H:i:s');
        $currentDate_timestamp = strtotime($currentDate);
        $endDate_months = strtotime("+5 minutes", $currentDate_timestamp);
        $packageEndDate = date('Y-m-d H:i:s', $endDate_months);
            
        $_SESSION["current"] = $currentDate;
        $_SESSION["expired"] = $packageEndDate;

        // $id= $_SESSION["user_id"];
        $id= $_SESSION["user_id"];
        $codee = $_SESSION["gencode"];

        $query = "INSERT INTO code VALUES (null, '$id','$codee', '$currentDate', '$packageEndDate')";
        
       $run = mysqli_query($conn3,$query) or die(mysqli_error($conn3));

        if($run){
            echo "Here is your code:   " .$codee."</br>" ;
            echo "user_id:   " .$id;
        }
        else{
            echo "Not submitted";
        }
    
    ?>