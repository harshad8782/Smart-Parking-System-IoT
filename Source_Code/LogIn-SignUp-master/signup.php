<?php
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"hackathon");

//$email=trim($_POST['t1']);
//$pawd=trim($POST_['t2']);

$id;

$qry = "SELECT * FROM `admin` WHERE `email` LIKE 'admin@gmial.com' AND `password` LIKE 'Admin@123'";
$raw=mysqli_query($conn,$qry);
$count=mysqli_num_rows($raw);


while($res=mysqli_fetch_array($raw)){
    $id = $res['first_name'];
}

if($id == )
{
echo $id;
}
else{
    echo "land";
}
?>