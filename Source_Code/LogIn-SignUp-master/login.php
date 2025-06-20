<?php
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"test");

$name = $_GET['t1'];

$qry = "SELECT * FROM `a_test` WHERE `Name` LIKE '$name'";

$raw = mysqli_query($conn,$qry);

while($res=mysqli_fetch_array($raw))
{
    $data[]=$res;
}

print(json_encode($data));
?>
