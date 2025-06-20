<?php



    $host = "localhost";		         // host = localhost because database hosted on the same server where PHP files are hosted
    $dbname = "test";              // Database name
    $username = "root";		// Database username
    $password = "";	        // Database password


// Establish connection to MySQL database
$conn = new mysqli($host, $username, $password, $dbname);


// Check if connection established successfully
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else { echo "Connected to mysql database. "; }

   
// Get date and time variables
    date_default_timezone_set('Asia/Kolkata');  // for other timezones, refer:- https://www.php.net/manual/en/timezones.asia.php
    $d = date("Y-m-d");
    $t = date("H:i:s");
    
// If values send by NodeMCU are not empty then insert into MySQL database table

  if(!empty($_POST['sensor1']) && !empty($_POST['sensor2']) )
    {
		$val = $_POST['sensor1'];
        $val2 = $_POST['sensor2'];

        echo $_POST['sensor1'];
        echo $val2;


// Update your tablename here
	        $sql = "INSERT INTO `data` (`Sensor1`, `Sensor2`) VALUES ('".$val."','".$val2."');"; 
            echo '".$val."';
            echo $val2;
 


		if ($conn->query($sql) === TRUE) {
		    echo "Values inserted in MySQL database table.";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}


// Close MySQL connection
$conn->close();



?>