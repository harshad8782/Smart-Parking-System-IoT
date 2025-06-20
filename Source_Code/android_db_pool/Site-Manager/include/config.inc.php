<?php
	//session_cache_limiter('private');
	$cache_limiter = session_cache_limiter();
	session_cache_expire(180);
	$cache_expire = session_cache_expire();
	//session_start();
	//error_reporting(0);
    ini_set('track_errors', '1');
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
	//include the class file
	require_once('database.inc.php');
	require_once('function.inc.php');
	//require_once('class.phpmailer.php');
	//require_once('define.inc.php');
	// Instance of the database class
	$db = new database();
	//$db->database_host = 'localhost';
	//$db->database_port = '3306';
	//$db->database_user = 'nicgravy';
	//$db->database_password = 'y7dnkh2y';
	//$db->database_name = 'nicgravy';
	
	//server-----------------------
	$db->database_host = 'db563452155.db.1and1.com';
	$db->database_port = '3306';
	$db->database_user = 'dbo563452155';
	$db->database_password = 'u70963221-Sjees#@!';
	$db->database_name = 'db563452155';
	//-----------------------------
	// Instance of the Functions class
	$f = new Functions();
	$paypal_email = "yourpaypalemail@gmail.com";//admin paypal email id
	$admin_email = "youremail@gmail.com"; // admin email id to recieve information regarding the payment cancel,succes,etc.
	$paypal_currency = "USD"; // paypal currency transaction.
	//$script_url = "http://localhost:8181/SMU-CDAK";
	//$sitepath = "http://localhost:8181/SMU-CDAK/";
	$htaccess = 0;
	// Instance of the PHPMailer class
	//$objMail = new PHPMailer();
?>
