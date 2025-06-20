<?php 
header("location:admin_login.php");
session_start();
include("include/config.inc.php");
$db->connect();
	
	
if(isset($_GET["add"]) && isset($_GET["add"])==222)
{
	$uname=$_POST['uname'];
	$password=$_POST['password'];	
	
	$qry="SELECT * FROM `arttragen_tbl_admin` WHERE username='".$uname."' AND password='".$password."'";
   
	$sql=mysql_query($qry);
	$count=mysql_num_rows($sql);
	$row=mysql_fetch_array($sql);

	if ($count>0)
	 {
		$_SESSION['admin_name']= $row['username'];	
		$_SESSION['id']=$row['id'];
		header("location:home.php");
	 }
	else
	 {
	  /* echo "<script>alert('Wrong username and password!!!!!')</script>";*/
	  $dms="Wrong username and password!";
	 }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css"   />
<link rel="shortcut icon" href="images/redlogo.png"/>
<title>Admin Panel Home</title>
</head>

<body>
<div class="homewrapper1">

<div class="mainwrapper">
<div class="toptext">Sign inTo Your Site Management System</div>
<div class="clear"></div>

<div class="secureloginwrapper">
<div class="secureloginleft"></div>
<div class="secureloginright">SECURE LOGIN</div>


</div>
<div class="clear"></div>

<div class="midareawrapper">
<div class="sideslide"></div>
<div class="midareabg">

<div class="left_area_wrapper">
<div class="left_whitebg" align="center">  <br /><br /><br /><br />
<img src="images/arnabicon.png" />
<br />
</div>
<div class="left_header">ADMIN PANEL <font color="#FFFF00" style="font-size:13px; font-weight:900;"><?php echo $dms; ?></font></div>
</div>
<form id="form1" name="form1" action="<?php echo $_SERVER['PHP_SELF'];?>?add=222" method="post">
<div class="right_area_wrapper">

<div class="right_text"><label for="name" style="cursor:pointer;">User Name</label></div>
<div class="right_text_areawrapper"><input name="uname" id="uname" type="text" class="right_text_area" /></div>

<div class="clear"></div>

<div class="right_text1"><label for="passrd" style="cursor:pointer;">Password</label></div>
<div class="right_text_areawrapper"><input name="password" id="password" type="password" class="right_text_area" /></div>

<div class="button_wrapper">
<div class="button_left"><input type="submit" name="Submit" id="Submit" value="&nbsp;" class="submitbtn" /></div>
<div class="button_right">
<div class="checkboxarea"><input name="remember" id="remember" type="checkbox" value="true" class="checkbox" /></div>
<div class="checktext"><label for="remember" style="cursor:pointer;">Remember Me</label></div>
<div class="clear"></div>
</div>


<div class="forgot_text"> Forgot Password ?</div>

<div class="clear"></div>

</div>

</div>
</form>
<div class="clear"></div>




</div>

<div class="brand_wrapper">Powered By :WebSyntax<br/>
</div>

<div class="clear"></div>


<div class="footer_links">
<ul>
<li style="background:none; font-weight:600;">Our Service Offerings :</li>
<li style="background:none;"><a href="#">Website Design</a></li>
<li><a href="#">SEO & PPC Service</a></li>
<li><a href="#">iPhone & iPad Applications</a></li>
<li><a href="#">Facebook Application</a></li>
<li style="background:none;"><a href="#">Mobile App Development </a></li>
<li><a href="#">Internet Marketing  Web Video Production</a></li>
<li><a href="#">IT Outsourcing</a></li>
<li><a href="#">Call Center Services</a></li>


</ul>
</div>

<div class="footer_nav_wrapper">
<div class="footer_left">WebSyntax.info © All Rights Reserved</div>
<div class="footer_right">Version 2.0.2012</div>
<div class="clear"></div>

</div>







</div>



</div>

</div>
</body>
</html>