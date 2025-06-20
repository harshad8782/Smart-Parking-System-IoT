<?php
	class Functions {
		
	function AddDate($date,$day)
	{
		$day = $day + 1;
		$start_date = $date;
		$st = strtotime($start_date);
		$end = strtotime("+$day days",$st);
		for ($i=$st;$i<$end;$i += 86400) // 86400 seconds in a day
		{ 
		   $d= $i;
		}
		//echo date('Y-m-d');
		return date('Y-m-d',$d);
	}
	function sqlDate1($dt)	
		{
				/*$day=substr($dt,8,2);
				$mon=substr($dt,5,2);
				$yr=substr($dt,0,4);
				return $day."-".$mon."-".$yr;*/
				$newdt=explode("-",$dt);
				return $newdt[2]."-".$newdt[0]."-".$newdt[1];
		}
		function sqlDate($dt)	
		{
				/*$day=substr($dt,8,2);
				$mon=substr($dt,5,2);
				$yr=substr($dt,0,4);
				return $day."-".$mon."-".$yr;*/
				$newdt=explode("-",$dt);
				return $newdt[2]."-".$newdt[1]."-".$newdt[0];
		}
	function loginValidation($uname,$upass)
		{
			//echo"aaaa";
		$uname=str_replace("'","",$uname);
		$upass=str_replace("'","",$upass);
		$pass=$this->makePassword($upass,"ENC");
		//echo $pass;
		if($uname == "admin")
		{
			$sql="select * from blueparking_tbl_admin where uname='".$uname."' and pwd='".$pass."'";
		}
		else
		{
			$sql="select * from tbl_user_login where uname='".$uname."' and pwd='".$pass."' and  status='Active'";	
		}
		$res=mysql_query($sql);
		$num=mysql_num_rows($res);
		$row=mysql_fetch_array($res);
		//print_r($row);
		//die;
		//echo $row['uname'];
		if($num>0)
			{
				if($row['uname'] == "admin")
				{
					$_SESSION['type'] = 'A';
				}
				else
				{
					$_SESSION['type'] = 'E';
				}
				$_SESSION['userid'] = $row['id'];
				$_SESSION['uname']=$row['uname'];
				$_SESSION['pwd'] = $row['pwd'];
				//echo $_SESSION['userid'];
				//die;
			//echo $_SESSION['uname'];
			$this->location("home.php");
			}
			else 
			{
			
			return "not";
			}
		
		}
		
		function logOut()
			{
			unset($_SESSION['uname']);
			unset($_SESSION['pwd']);
			$this->location("index.php");
			
			
			}
			function changePass ($newpass)
				{
				$newpass=str_replace("'","",$newpass);
				$query="update blueparking_tbl_admin set pwd='".$newpass."' where uname='".$_SESSION['uname']."'";
		//echo $query;
		if(mysql_query($query))
			{
			$_SESSION['pwd']=$newpass;
			return $query;
			}
				
				}
		
		
		function isLogin($getSessionName,$getBackPage) {
			//echo $_SESSION['uname'];
			if(!isset($_SESSION[$getSessionName])) {
				
				echo "<script language=\"javascript\" type=\"text/javascript\">\n";
				echo "window.top.location.href=\"".$getBackPage."\";\n";
				echo "</script>";
				exit();
			}
		}
		
		function CreatThumbnail($dstWidth,$dstHeight,$path) {
			$file_array = explode(".",$path);
			$file_ext = $file_array[count($file_array)-1];
			$source_file = $path;
			$dest_file = $source_file;
			//move_uploaded_file($file['tmp_name'],$source_file);
			//chmod($source_file,0777);
			
			$ext_type = strtolower($file_ext);
			if($ext_type == 'jpg' || $ext_type == 'jpeg') {
				$handle = imagecreatefromjpeg($source_file);
			} elseif($ext_type == 'gif') {
				$handle = imagecreatefromgif($source_file);
			} elseif($ext_type == 'png') {
				$handle = imagecreatefrompng($source_file);
			}
			
			if(!$handle) {
				return false;
			}			
			
			$srcWidth  = imagesx($handle);
   			$srcHeight = imagesy($handle);
			
			//$dstHeight = (int)(($dstWidth / $srcWidth) * $srcHeight);
			$newHandle = imagecreatetruecolor($dstWidth, $dstHeight);
			
			if(!newHandle) {
				return false;
			} else {
				if(!imagecopyresampled($newHandle,$handle,0,0,0,0,$dstWidth,$dstHeight,$srcWidth,$srcHeight)) {
					return false;
				}
				imagedestroy($handle);
				if($ext_type == 'jpg' || $ext_type == 'jpeg') {
					imagejpeg($newHandle,$dest_file,90);
				}
				if($ext_type == 'gif') {
					imagegif($newHandle,$dest_file);
				}
				if($ext_type == 'png') {
					imagepng($newHandle,$dest_file);
				}
				chmod($dest_file,0777);
				imagedestroy($newHandle);
				//return $filename;
			}
		}
		
		function CaptchaImg($height,$width,$Text) {
			$img_number = imagecreate($width,$height);
			$white = imagecolorallocate($img_number,255,255,255);
			$black = imagecolorallocate($img_number,0,0,0);
			$orange = imagecolorallocate($img_number,252,228,218);
			$deep_orange = imagecolorallocate($img_number,215,105,6);
		
			imagefill($img_number,0,0,$orange);
			imagerectangle($img_number,0,0,($width-1),($height-1),$black);
		
			imagestring($img_number,6,13,2,$Text,$deep_orange);
			 
			header("Content-Type: image/jpeg"); 
	
			imagejpeg($img_number); 
			imagedestroy($img_number);
		}

		function getHtmlError($msg) {
			return "<div class=\"error\">".$msg."</div>";
		}
		
		function getHtmlMessage($msg) {
			return "<div class=\"message\">".$msg."</div>";
		}
				
		function alert($msg) {
			$scr = "<script language=\"javascript\" type=\"text/javascript\">\n";
			$scr.= "alert(\"".$msg."\");\n";
			$scr.= "</script>\n";
			echo $scr;
		}
		
		function location($path) {
			$scr = "<script language=\"javascript\" type=\"text/javascript\">\n";
			$scr.= "window.location.href=\"".$path."\";\n";
			$scr.= "</script>\n";
			echo $scr;
		}
		
		function close() {
			$scr = "<script language=\"javascript\" type=\"text/javascript\">\n";
			$scr.= "self.close();\n";
			$scr.= "</script>\n";
			echo $scr;
		}
		
		function reload() {
			$scr = "<script language=\"javascript\" type=\"text/javascript\">\n";
			$scr.= "window.opener.location.reload();\n";
			$scr.= "</script>\n";
			echo $scr;
		}
		
		function CreateFolder($Path,$Permission) {
			if(!is_dir($Path) == true) {
				@mkdir($Path,$Permission) or $this->error($php_errormsg);
				@chmod($Path,$Permission) or $this->error($php_errormsg);
			}
		}

		function makePassword($pwd,$type) {
			$pass = $pwd;
			if($type == "ENC") {
				$pass = base64_encode(strrev($pass));
			} else {
				$pass = base64_decode(strrev($pass));
			}
			return $pass;
		}
		
		

		function RandomNumber($length) {
			$random=""; 
			srand((double)microtime()*1000000); 
			$data = "ADE123IJKLMN67QRSTUVWXYZ"; 
			$data.= "BC123456789"; 
			$data.= "0FGH45OP89"; 
			for($i = 0;$i < $length;$i++) {
				$random.= substr($data,(rand()%(strlen($data))),1); 
			}
			return $random;
		}

		function SendMail($MailToAddress,$MailMessage,$MailSubject,$Cc,$Bcc,$MailFromAddress) {
			$header = "MIME-Version: 1.0\r\n";
			$header.= "Content-Type: text/html; charset=iso-8859-1\r\n";
			$header.= "From: ".$MailFromAddress."\r\n";
			if(empty($Cc)==false) {
				$header.= "Cc: ".$Cc."\r\n";
			}
			if(empty($Bcc)==false) {
				$header.= "Bcc: ".$Bcc."\r\n";
			}
			@mail($MailToAddress,$MailSubject,$MailMessage,$header) or die($this->error($php_errormsg));
		}

		function ChangeFormatDate($dt,$type) {
			$VarTotalDate = explode("-",$dt);
			if($type == 'mysql') {
				$VarDate = $VarTotalDate[1];
				$VarMonth = $VarTotalDate[0];
				$VarYear = $VarTotalDate[2];
				$CompleteDate = $VarYear.'-'.$VarMonth.'-'.$VarDate;
			} else {
				$VarDate = $VarTotalDate[2];
				$VarMonth = $VarTotalDate[1];
				$VarYear = $VarTotalDate[0];
				// Indian Format
				//$CompleteDate = $VarDate.'-'.$VarMonth.'-'.$VarYear;
				// USA Format
				$CompleteDate = $VarDate.'-'.$VarMonth.'-'.$VarYear;
			}
			return $CompleteDate;
		}
		
		function error($arg_error_msg) {
			if(empty($arg_error_msg)==false) {
				$error_msg = "<div style=\"font-family: Tahoma; font-size: 11px; padding: 10px; background-color: #FFD1C4; color: #990000; font-weight: bold; border: 1px solid #FF0000; text-align: center;\">";
				$error_msg.= $arg_error_msg;
				$error_msg.= "</div>";
				return $error_msg;
			}
		}
		//////////////
		function getRandomFileName($filename) {
			$file_array = explode(".",$filename);
			$file_ext = $file_array[count($file_array)-1];
			$new_file_name = @uniqid().date('m').date('d').date('Y').date('G').date('i').date('s').".".$file_ext;
			return $new_file_name;
		}
		
		function imageFileUpload($name,$type,$FILEREPOSITORY,$tmpname,$f)
		{
				
				
				if ($type =="image/jpeg" || $type =="image/png" || $type =="image/gif" || $type =="image/jpg" || $type =="image/pjpeg" )
	   								
					{
						$newName =$this->getRandomFileName($name);
						$result = move_uploaded_file($tmpname, $FILEREPOSITORY."/$newName");
						if($result==1)
						{
							return $newName;
						}
						else 
						{
							return "File size is more than 2Mb";
						}	
					}
					
					
				else 
				{
					return "Files must be uploaded in jpg,jpeg,gif,png format ";
				}	
		}
		//////////////
		
		function imageUpload($name,$type,$FILEREPOSITORY,$tmpname)
		{
				
				
				if ($type =="image/jpeg" || $type =="image/png" || $type =="image/jpg" || $type =="image/pjpeg" )
	   								
					{
						$newName =$this->getRandomFileName($name);
						$result = move_uploaded_file($tmpname, $FILEREPOSITORY."/$newName");
						if($result==1)
						{
							return $newName;
						}
						else 
						{
							return "not upload";
						}	
					}
					
					
				else 
				{
					return "not upload";
				}	
		}
		function fileUpload($name,$type,$FILEREPOSITORY,$tmpname)
		{
				
				
				
						$newName =$this->getRandomFileName($name);
						$result = move_uploaded_file($tmpname, $FILEREPOSITORY."/$newName");
						//return "asssss";
						if($result==1)
						{
							return $newName;
						}
						else 
						{
							return "no upload";
						}	
					
		}
		
		///////////////
		function getDate()
			{
					$date=getdate();
					$day=$date['mday'];
					$month=$date['mon'];
					$year=$date['year'];
					$dt=$year."-".$month."-".$day;
					return $dt;
			}
		function getTime()
			{
					$date=getdate();
					$hr=$date['hours'];
					$min=$date['minutes'];
					$sec=$date['seconds'];
					$tm=$hr.":".$min.":".$sec;
					return $tm;
			}	
			
			
			
			
			/////////////////////

			
			//////////////////
		
		function revDate($dt)	
		{
				/*$day=substr($dt,8,2);
				$mon=substr($dt,5,2);
				$yr=substr($dt,0,4);
				return $day."-".$mon."-".$yr;*/
				$newdt=explode("-",$dt);
				return $newdt[2]."-".$newdt[1]."-".$newdt[0];
		}
		function revDate1($dt)	
		{
				/*$day=substr($dt,8,2);
				$mon=substr($dt,5,2);
				$yr=substr($dt,0,4);
				return $day."-".$mon."-".$yr;*/
				$newdt=explode("-",$dt);
				return $newdt[2]."-".$newdt[1]."-".$newdt[0];
		}
		
		/////////////////////
		
		function LmtTxt($txt,$lmt)
		{
			$nwtxt = explode(" ",$txt);
			for($i=0;$i<8;$i++)
			{
				$txtn = $nwtxt[$i];
				
				$rtntxt = $rtntxt." ".$txtn;
			}
			return $rtntxt;
		}
	}
?>
