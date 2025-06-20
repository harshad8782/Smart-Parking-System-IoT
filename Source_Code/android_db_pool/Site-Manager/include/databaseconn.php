<?php

class DatabaseConn
{

var $datadase_conn_type;
var $database_host;
var $database_port;
var $database_user;
var $database_password;
var $database_name;
var $Con;

function connect($conType) 
{

			if($conType=="mysql")
				{
			$this->Con = @mysql_connect($this->database_host.":".$this->database_port,$this->database_user,$this->database_password) or die(mysql_error());
			@mysql_select_db($this->database_name,$this->Con) or die($this->error(mysql_error()));
			
			}
			
			else	if($conType=="mysqli")
				{
			$this->Con =mysqli_connect($this->database_host,$this->database_user,$this->database_password,$this->database_name,$this->database_port)or die("Can Not Connect") ;			
			}
			
		}


}

?>