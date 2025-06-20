<?php
session_start();
include("../include/config.inc.php");
$db->connect("mysql");
$pass1=$f->makePassword($_GET['pass1'],'ENC');
$pass2=str_replace("'","",$_GET['pass2']);
//echo "$pass1";
//echo $_SESSION['pwd'];

$resp="";
if($pass1!=$_SESSION['pwd'])
			{
		$resp="<label><span class='style2' style='size:portrait;font-weight:bold;font-size:16px'>Change Password</span><br /><br />Previous Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<input type='password' name='pwd1' id='pwd1' /><br></label><p><label> New Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;   &nbsp;<input type='password' name='pwd2' id='pwd2' /><br></label></p><p><label>Retyper New Password &nbsp;&nbsp;<input type='password' name='pwd3' id='pwd3' /><br></label></p><p><label><input type='button' name='chnage' id='change' value='Change' onClick='return changePassword();' /></label><br><br><font color='red'>Wrong Previous Password</font></p>";
			}
			else
			{
			$newpass=$f->makePassword($pass2,'ENC');
			if($_SESSION['type'] == 'A')
			{
				$query="update blueparking_tbl_admin set pwd='".$newpass."' where uname='".$_SESSION['uname']."'";
			}
			else
			{
				$query="update tbl_user_login set pwd='".$newpass."' where uname='".$_SESSION['uname']."'";
			}
		//echo $query;
			if(mysql_query($query))
			{
			$_SESSION['pwd']=$newpass;
		
	
				$resp="<table border='0' cellspacing='0' cellpadding='2' width='500'>
        <tr>
          <td class='pageName' align='center' height='100'  valign='bottom'><font color='red'>Password Successfully Changed</font></td>
        </tr>
        <tr>
          <td class='bodyText' align='center'><table width='300' height='182' style='background-image:url(images/middle.png);'>
	<tr>
	<td width='292' height='26' align='center'>	<h3>Home</h3></td>
	</tr>
	<tr>
	<td height='47' align='center' valign='middle'>Login From : ".$_SERVER['REMOTE_ADDR']."</td>
	</tr>
	<tr>
	<td height='44' align='center'><script language='javascript' src='../adminscript/date.js'>	</script></td>
	</tr>
	<tr>
	<td height='26'>	</td>
	</tr>
	
	</table></td>
		</tr>
      </table>";
				
				}
				}
echo $resp;

?>