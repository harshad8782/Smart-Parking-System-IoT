<?php
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"car_parking");

$uname=$_GET['t1'];
$pwd=$_GET['t2'];

$qry="SELECT * FROM `users` WHERE `name` LIKE '$uname' AND `password` LIKE '$pwd'";

$raw=mysqli_query($conn,$qry);

$count=mysqli_num_rows($raw);

if($count>0)
 echo "found";
else
 echo "not found";

?>