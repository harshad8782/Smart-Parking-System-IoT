<?php



    $host = "localhost";		         // host = localhost because database hosted on the same server where PHP files are hosted
    $dbname = "car_parking";              // Database name
    $username = "root";		// Database username
    $password = "";	        // Database password


// Establish connection to MySQL database
$conn = new mysqli($host, $username, $password, $dbname);


// Check if connection established successfully
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else { //echo "Connected to mysql database. "; 
}

   
// Get date and time variables
    date_default_timezone_set('Asia/Kolkata');  // for other timezones, refer:- https://www.php.net/manual/en/timezones.asia.php
    $d = date("Y-m-d");
    $t = date("H:i:s");
    
// If values send by NodeMCU are not empty then insert into MySQL database table


  if(!empty($_POST['sensor1']) && !empty($_POST['sensor2']) && !empty($_POST['sensor3']) )
    {
		$val = $_POST['sensor1'];
        $val2 = $_POST['sensor2'];
        $val3 = $_POST['sensor3'];

        //echo $_POST['sensor1'];
        //echo $val2;


// Update your tablename here
	        $sql = "INSERT INTO `data` (`Sensor1`, `Sensor2`, `Sensor3`) VALUES ('".$val3."','".$val2."','".$val."');"; 
            $result = mysqli_query($conn,$sql);
            //echo '".$val."';
            //echo $val2;

        //     $mot = "SELECT * FROM `motor` WHERE `no` = 1";
        //     $result_2 = mysqli_query($conn,$mot);

        //     $raw = mysqli_fetch_array($result_2);
        //     $rot = $raw['slot'];
        //     echo $rot;

        //    if($rot == true){
        //     $motr = "UPDATE `motor` SET `slot` = '0' WHERE `motor`.`no` = 1;";
        //     $result_3 = mysqli_query($conn,$motr);
     
        $mot = "SELECT * FROM `motor` WHERE `no` = 1";
        $result_2 = mysqli_query($conn,$mot);

        $raw = mysqli_fetch_array($result_2);
        $rot = $raw['slot'];
        echo $rot;

        $motr = "UPDATE `motor` SET `slot` = '0' WHERE `motor`.`no` = 1;";
        $result_3 = mysqli_query($conn,$motr);
    }       

?>