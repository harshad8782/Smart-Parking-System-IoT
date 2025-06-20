<?php
/*
$database_host = 'localhost';
	$database_port = '3306';
	$database_user = 'root';
	$database_password = '';
	$database_name = 'news';
	$link=mysqli_connect($database_host,$database_user,$database_password,$database_name,$database_port)or die(mysql_error()) ;
	
	
	
	$sql="CALL testProc()";
	$res=mysqli_query($link,$sql);
	$row=mysqli_fetch_array($res);
	echo $row['id'];
	mysqli_close($link);
	//////////////////////
	$link=mysqli_connect($database_host,$database_user,$database_password,$database_name,$database_port)or die(mysql_error()) ;
	$sql="select * from tbl_comment where id=10";
	$res=mysqli_query($link,$sql);
	$row=mysqli_fetch_array($res);
	echo $row['id'];
	
	////////////
	*/
	include("config.php");
	$db->connect("mysqli");
	////////////////////////
	$sql="CALL testProc()";
	$res=mysqli_query($db->Con,$sql);
	$row=mysqli_fetch_array($res);
	echo $row['id'];
	$db->connect("mysql");
	$sql="select * from tbl_comment where id=10";
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res);
	echo $row['id'];
	
	?>