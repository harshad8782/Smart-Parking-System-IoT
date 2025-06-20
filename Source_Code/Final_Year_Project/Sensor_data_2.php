<html>
<body>

<?php

$dbname = 'test';
$dbuser = 'root';  
$dbpass = ''; 
$dbhost = 'localhost'; 

$connect = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$connect){
	echo "Error: " . mysqli_connect_error();
	exit();
}

echo "Connection Success!<br><br>";

$sensor1 = $_GET["sensor1"];
$sensor1 = $_GET["sensor2"]; 


$query = "INSERT INTO data (Sensor1, Sensor2) VALUES ('$sensor1', '$sensor2')";
$result = mysqli_query($connect,$query);

echo "Insertion Success!<br>";

?>
</body>
</html>