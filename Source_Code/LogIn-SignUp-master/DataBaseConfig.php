<?php
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"car_parking");

$name = $_GET['R_name'];
$phone_no = $_GET['R_Phone_no'];
$email_id = $_GET['R_Email_id'];
$number_plate = $_GET['R_Number_plate'];
$password = $_GET['Pass'];


if (!empty($name) && !empty($phone_no) && !empty($email_id) && !empty($number_plate) && !empty($password))
	{
        $qry = "INSERT INTO `users` (`name`, `phone_no`, `email_id`, `number_plate`, `password`) VALUES ('$name', '$phone_no', '$email_id', '$number_plate', '$password');";
		mysqli_query($conn, $qry);
    }

echo "Inserted Sucessfully";
?>
