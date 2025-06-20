<?php 
error_reporting(0);
session_start();
include("include/config.inc.php");
$db->connect();
	
	
if(isset($_REQUEST['Submit']))
{
	$sql=mysql_query("SELECT * FROM blueparking_tbl_admin WHERE username='".$_REQUEST['uname']."' AND password='".$_REQUEST['password']."'");
	$count=mysql_num_rows($sql);
	$row=mysql_fetch_array($sql);

	if ($count != '')
	 {
		$_SESSION['admin_name']= $row['username'];
		$_SESSION['id']=$row['id'];
		header("location:home.php");
	 }
	else
	 {
	   echo "<script>alert('Wrong username and password!!!!!')</script>";
	 }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Brand Web Direct | Website  Management System | CMS Websites</title> 
		<link href="css/style_3.css" type="text/css" rel="stylesheet"> 
 
<style type="text/css">
.for{font-family:Arial, Helvetica, sans-serif;}
.for a{text-decoration:none; color:#1393c9;}
.for a:hover{text-decoration:underline; color:#08709c;}

</style>
</head> 
 
<body> 
<table cellspacing="0" cellpadding="0" border="0" width="100%"> 
  <tbody><tr> 
    <td align="center"> 
	<table cellspacing="0" cellpadding="0" border="0" width="850"> 
	  <tbody><tr> 
		<td align="center" class="main"> 
			<!--Blue box start here--> 
			<table cellspacing="0" cellpadding="0" border="0" width="821"> 
			 <tr> 
				<td align="right" valign="top"><br /> 
<br /> 
<img style="margin-bottom: 40px; margin-top:25px;border:0px solid #f00;" src="images/Admin_Header_.png" ></td> 
			 </tr> 
			  <tr> 
				<td class="blue-bx-bg"> 
					<!--Admin Panel box start here--> 
					<table cellspacing="0" cellpadding="0" border="0" width="821"> 
					
																									
					  <tbody><tr> 
						<td class="blue-bx-header"> 
							<!--Adnin panel details are here--> 
							<table cellspacing="0" cellpadding="0" border="0" width="821"> 
							  <tbody><tr> 
							  	<!--Left part start here--> 
								<td align="center" width="20"></td> 
								<td align="center" class="client-bx"><img src="images/logo.png" height="200" /></td> 
								<!--Left part end here--> 
								
								<!--Right part start here--> 
								<td align="center" width="10"></td> 
								<td align="center" width="265" valign="top" class="login-bx"> 
								<!--<p><strong>Sign in to Administrative Zone</strong></p>--> 
								<img src="images/Admin_Login_Icon__BWD__design_service_company.png"> 
								<div class="msg_cont"><div id="msg_cont">&nbsp;</div></div>
												
								<!--Login Form start here--> 
                                    
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">                                   
 
<table cellspacing="0" cellpadding="0" border="0" width="100%" class="para_login-bx"> 
    <tr> 
        <td align="right" valign="top"><label>Username</label></td> 
        <td align="left" valign="top"> 
        <input type="text" name="uname" id="uname" class="field"size="20" maxlength="20" ><div class="err_div" id="usrlog_err"></div></td> 
    </tr>
     
    <tr> 
        <td align="right" valign="top"><label>Password</label></td> 
        <td align="left" valign="top"> 
        <input type="password" class="field" name="password" id="password" size="20" maxlength="20" ><div class="err_div" id="usrpass_err"></div></td> 
    </tr> 
    
    <tr> 
     <td align="right" valign="middle"><span class="rem_txt">Remember Me </span><input type="checkbox" name="remember" id="remember" class="checkbox" value="true"/></td> 
     <td align="right" valign="middle"><input type="submit" name="Submit" id="Submit" class="added-btn" value="Login" size="30" style="border:none;">
        </td> 
    </tr> 
    
    <tr> 
        <td align="left" valign="top" class="for"><a href="http://www.tjunctioncars.com/admin/forgetpass">Forgot Password</a></td> 
        <td align="right" valign="top" id="dateformat">&nbsp;</td> 
    </tr> 
</table> 
</form> 
								<!--Login Form end here--> 
								</td> 
								<td align="center" width="20"></td> 
								<!--Right part end here--> 
							  </tr> 
							</tbody></table> 
 
						</td> 
					  </tr> 
					</tbody></table> 
 
					<!--Admin Panel box start here--> 
				</td> 
			  </tr> 
			  <tr> 
				<td class="blue-bx-bottom">&nbsp;</td> 
			  </tr> 
			</table> 
 
			<!--Blue box end here--> 
		</td> 
	  </tr> 
	  <tr> 
		<td align="right" valign="top"><a target="_blank" href="http://www.brandwebdirect.com"><img border="0" style="margin-top: 10px; padding:0 15px 0 0;" alt="Brand Web Direct Website Design SEO PPC Web Video Service Company" src="images/BWD_PoweredBy_Logo_design_service_company.png"></a></td> 
	  </tr> 
	  <tr> 
	    <td align="center" valign="top"> 
		<p style="margin: 30px 0px;"> 
		<strong>Our Service Offerings:</strong> 
		Website Design | SEO & PPC Service | iPhone & iPad Applications | Facebook Application | Mobile App Development | Internet Marketing | Web Video Production | IT Outsourcing | Call Center Services
		</p> 
		</td> 
	    </tr> 
	  <tr> 
	    <td align="left" valign="top" class="footer"> 
			<table cellspacing="0" cellpadding="0" border="0" width="100%"> 
			  <tbody><tr> 
				<td align="left" width="50%" valign="top"><p style="margin: 15px 10px;">BrandWeb Direct.Com &copy; All Rights Reserved.</p></td> 
				<td align="right" width="50%" valign="top"><p style="margin: 15px 10px;">Version 1.0.2011</p></td> 
			  </tr> 
			</tbody></table> 
 
		</td> 
	    </tr> 
 
	</tbody></table> 
 
	</td> 
  </tr> 
</tbody></table> 
</body> 
</html> 