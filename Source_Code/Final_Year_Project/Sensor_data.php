
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $sensor1 = $sensor2 = " ";

$sensor1 = $sensor2 = " ";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
$api_key = test_input($_POST['api_key']);

if($api_key == $api_key_value)
{
	$sensor1 = test_input($_POST['sensor1']);
	$sensor2 = test_input($_POST['sensor2']);

    $conn = new mysql($servername,$username,$password,$dbname);

    if($conn->connect_error)
    {
        die("Connection Failed: ".$conn->connect.error);
    }

    $sql = "INSERT INTO data (Sensor1,Sensor2) VALUES ('".$sensor1."', '".$sensor2."')";

    if ($conn->query(sql) == TRUE)
    {
        echo "New record created sucessfully";
    }
    else{
        echo "Error: ".$sql."<br>" . $conn->error;
    }
    $conn->close();
}
else{
    echo "Wrong API key provided.";
}
}
else {
    echo "No data posted with HTTP post";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
