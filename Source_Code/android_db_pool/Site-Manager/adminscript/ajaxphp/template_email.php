<?php 
 //header('Content-type: text/html');
session_start();
include("../include/config.inc.php");
$db->connect();
$msg = "";

$id = $_GET['id'];




$sql = "select description from tbl_email_template where id = $id";
$res = mysql_query($sql);
$rec = mysql_fetch_assoc($res);
$msg .= "$rec[description]";

echo $msg;
?>