<?php
	//session_cache_limiter('private');
	$cache_limiter = session_cache_limiter();
	session_cache_expire(180);
	$cache_expire = session_cache_expire();
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
	
	
	//server-----------------------
	$db->database_host = 'localhost';
	$db->database_port = '3306';
	$db->database_user = 'php1';
	$db->database_password = 'Funny9';
	$db->database_name = 'rootsherbs';
	//-----------------------------
	// Instance of the Functions class
	$f = new Functions();
	// Instance of the PHPMailer class
	//$objMail = new PHPMailer();
?>
