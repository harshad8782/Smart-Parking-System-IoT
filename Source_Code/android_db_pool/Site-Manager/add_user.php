<?php 
session_start();
error_reporting(0);
include("include/config.inc.php");	
$db->connect();
if(!isset($_SESSION['admin_name']))
	{
       header("Location:index.php");
	}

if((isset($_GET['add_one']))&&($_GET['add_one']==111))
{
  $sql=mysql_query("INSERT INTO `arttragen_tbl_admin` SET `username` = '".$_REQUEST['username']."', `password` = '".$_REQUEST['password']."'");
	if($sql){
		$_SESSION['p_msg'] = "Your User Data is Successfully Inserted";}	
	else{
		$_SESSION['p_msg']	="Your User Data is Not Inserted";}
	header("Location:".$_SERVER['PHP_SELF']);
	exit();
	
}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css"   />
<meta name="robots" content="index, follow" />
  <meta name="keywords" content="Website Design, Affordable web site design services, web development, website development company, seo friendly website design, web  development services, mobile website design, facebook application design, logo design, custom logo design, web design UK, Website design UK, london website designers, Ireland web development company, website design Australia, website designer  Canada, web design UAE, website designer Scotland, web site designer Scotland, professional web design company UK USA, Web Designers, iPhone iPad App Development, Web Design UK, Web Site Developers, Web Development USA, Web Site Designers" />
  <meta name="description" content="Website design and web design service from expert website designers. Affordable web site design from £99. Call UK 0203 372 5310. Email: sales@brandwebdirect.com . We are a preferred website design company, offering affordable mobile web application development, search engine optimisation services, mobile search results marketing, social media and facebook application design and other web development services." />
  <meta name="generator" content="Joomla! 1.5 - Open Source Content Management" />
  <title>Brand Web Direct | Website Design | Web Designers | Iphone Ipad App Development | Web Design UK | Web Site Developers | Web Development USA | Web Site Designers</title>
  <link rel="stylesheet" type="text/css" href="css/style.css"   />

</head>

<body>

<!-- Header Area Start-->

<?php include("header.php");?>
<div class="clear"></div>

<!-- Header Area End-->


<!--<div class="menu">
<ul>
<li><a href="#">Dashboard</a></li>
<li><a href="#">Dashboard</a></li>
<li><a href="#">Dashboard</a></li>
</ul>
</div>-->


<!-- Menu Area Start-->

<?php include("menu.php");?>


<div class="clear"></div>


<!-- Menu Area End-->





<!-- Mid Area Start-->

<div class="mid_area_wrapper" align="center">

<?php include("left_pannel.php");?>

<div class="mid_right_panel">
<div class="mid_details">

<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?add_one=111" onsubmit="return checkfunction();">

<div class="mid_table_wrapper" align="center">
<font style=" font-size:14px; color:#F00;">
	<?php
	
	if((isset($_SESSION['p_msg'])) && (!isset($_GET['add_one'])))
		{
			echo $_SESSION['p_msg'];
			unset($_SESSION['p_msg']);
		}
	
	?>
    
    </font>













<div class="addpage_bgwrapper">
<div class="addpage_bg">
<div class="top_bg">
<div class="bluebg_left"></div>
<div class="bluebg_right">Add New User</div>
<div class="clear"></div>
</div>


<div class="text_area_wrapper">
<div class="left_text">Username</div>
<div class="right_text"><input type="text" name="username" id="username" class="right_text_area" /></div>
<div class="clear"></div>
</div>


<div class="text_area_wrapper1">
<div class="left_text">Password</div>
<div class="right_text"><input type="password" name="password" id="password" class="right_text_area" /></div>
<div class="clear"></div>
</div>
<div class="clear"></div>







<div class="text_area_wrapper2">
<div class="left_ttext"><input type="submit" name="change" id="change" value="Save"  class="addbtn" style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#fff; font-weight:600; line-height:36px;" /></div>
<div class="clear"></div>
</div>
<div class="clear"></div>





</div>
<div class="clear"></div>
</div>



</div>

</form>
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>


</div>
</div>


<div class="clear"></div>
</div>

<!-- Mid Area End-->




<!-- Footer Area Start-->

<?php include("footer.php");?>

<!-- Footer Area End-->

</body>
</html>