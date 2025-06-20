<?php
session_start();
require_once('function.inc.php');
require_once('databaseconn.php');
class ConfigConn extends DatabaseConn
	{
					function setVal()
					{
					//$db = new DatabaseConn();
					$this->database_host = 'localhost';
					$this->database_port = '3306';
					$this->database_user = 'root';
					$this->database_password = '';
					$this->database_name = 'ganesh';
					}		
	}
	$f=new Functions();
	$db = new ConfigConn();
	$db->setVal();
	
?>