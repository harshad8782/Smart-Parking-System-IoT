<?php 
session_start();
include("include/config.inc.php");	
$db->connect();
if(!isset($_SESSION['admin_name']))
	{
       header("Location:index.php");
	}
	if(@$_GET['r_pageno'])
	{
		$paging = "r_pageno=".$_GET['r_pageno'];
	}
	else
	{
		$paging = "r_pageno=1";	
	}


if((isset($_GET['add'])) && ($_GET['add']==777))
{
	$idd    = $_POST['idd'];
	$category=$_POST['category'];
	
		
	$query1="UPDATE  `magicmasala_tbl_checkout` SET  `category` =  '$category' WHERE `id` ='$idd'";
		
	if(mysql_query($query1))
	{
		$_SESSION['m_msg']="Successfully modified";
		header("Location:".$_SERVER['PHP_SELF']."?$paging");
		exit();
	}	
	else
	{
		$_SESSION['m_msg']="Cannot be modified";
		header("Location:".$_SERVER['PHP_SELF']."?$paging");
		exit();
	}
}
	

	
if(isset($_GET['delete']))
  {	
	$qry="delete from  magicmasala_tbl_checkout where id=".$_GET['p_id'];
		
	if(mysql_query($qry))
	{
		$_SESSION['m_msg']="Details Successfully deleted";
		header("Location:".$_SERVER['PHP_SELF']."?$paging");
		exit();
	}
							
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
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce_src.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>


<script type="text/javascript">
function condelete()
{
var message=confirm("Do you really want to delete");
if(message==true)
{
return true;
}
else 
{
return false;
}
}


</script>

<script type="text/javascript" language="javascript">
function checkfunction()
{ 
	if(document.getElementById("name").value=="")
	{
	alert("Please Enter The Name");
	document.getElementById("name").focus();
	document.getElementById("name").style.background="CCC";
	return false;
	}
	
   else if(document.getElementById("desc").value=="")
	{
	alert("Please Enter The Description");
	document.getElementById("desc").focus();
	document.getElementById("desc").style.background="CCC";
	return false;
	}
	
   else
   {
     return true;
   }
}

</script>
<script type="text/javascript">
//	tinyMCE.init({
//		// General options
//		mode : "textareas",
//		theme : "advanced",
//		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount",
//
//		// Theme options
//		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
//		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
//		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
//		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
//		theme_advanced_toolbar_location : "top",
//		theme_advanced_toolbar_align : "left",
//		theme_advanced_statusbar_location : "bottom",
//		theme_advanced_resizing : true,
//
//		// Example content CSS (should be your site CSS)
//		content_css : "css/content.css",
//
//		// Drop lists for link/image/media/template dialogs
//		template_external_list_url : "lists/template_list.js",
//		external_link_list_url : "lists/link_list.js",
//		external_image_list_url : "lists/image_list.js",
//		media_external_list_url : "lists/media_list.js",
//
//		// Replace values for the template plugin
//		template_replace_values : {
//			username : "Some User",
//			staffid : "991234"
//		}
//	});
</script>

<script type="text/javascript" src="js/jquery1.7.2.min.js"></script>

<style type="text/css">

.ttr{background-color:#f0fbfd; font-size:12px;  font-family:Verdana, Geneva, sans-serif; color:#000;}
.ttr1{background-color:#e2f5f9; font-size:12px;  font-family:Verdana, Geneva, sans-serif; color:#000;}

</style>
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

<div class="mid_area_wrapper">

<?php include("left_pannel.php");?>

<div class="mid_right_panel">
<div class="mid_details">

<div class="mid_table_wrapper" align="center">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle"><font style=" font-size:14px; color:#F00;">
	<?php
	
	if((isset($_SESSION['p_msg'])) && (!isset($_GET['add_one'])))
		{
			echo $_SESSION['p_msg'];
			unset($_SESSION['p_msg']);
		}
	
	?>
    
    </font>
    </td>
  </tr>
</table>
<font style=" font-size:14px; color:#F00;">
<?php
	
	if((isset($_SESSION['m_msg'])) && (!isset($_GET['add'])))
		{?><br /><?php
			echo $_SESSION['m_msg'];
			unset($_SESSION['m_msg']);
			
		}
	
	?>
	
    </font>
    
    <?php
		
		if((isset($_GET['modify']))&&($_GET['modify']==777))
		{
			$a_id= $_GET['a_id'];
			$sqlqry="SELECT * FROM  `magicmasala_tbl_checkout` WHERE id=".$_GET['p_id'];
			$res=mysql_query($sqlqry);
			$row=mysql_fetch_array($res);
	
	?>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?add=777&<?php echo $paging;?>" onsubmit="return checkfunction();" >
<input type="hidden" value="<?php   echo $row['id']; ?>" name="idd" id="idd">
        
<div class="addpage_bgwrapper1">
<div class="addpage_bg1">
<div class="top_bg1">
<div class="bluebg_left"></div>
<div class="bluebg_right1">Modify Product</div>
<div class="clear"></div>
</div>

<div class="text_inner_wrapper">






<br/>



</div>
<div class="clear"></div>






</div>
<div class="clear"></div>
</div> 
        
        



</form>
<?php
	}
		else
		{
	 ?>




		<?php 
 $sql=mysql_query("SELECT * FROM `magicmasala_tbl_checkout` WHERE id='".$_REQUEST['id']."'");
 $row=mysql_fetch_array($sql); 
 ?> 	
 <p>
 
 <table width="100%" border="0" cellspacing="1" cellpadding="0" style="border:solid 1px #000">
  <tr style="color:#FFF;">
    <td width="22%" height="30" align="left" valign="middle" bgcolor="#000000" style="padding:0 5px 0 8px;"><strong><?php echo $row['pertitle']; ?> <?php echo $row['pername']; ?></strong></td>
    <td width="23%" height="30" align="left" valign="middle" bgcolor="#000000" style="padding:0 5px 0 8px;"><strong>Order Date : <?php echo $row['orddate']; ?></strong></td>
    <td width="29%" height="30" align="left" valign="middle" bgcolor="#000000" style="padding:0 5px 0 8px;"><strong>Order No. - <?php echo $row['orderid']; ?></strong></td>
    <td width="26%" height="30" align="left" valign="middle" bgcolor="#000000" style="padding:0 5px 0 8px;"><strong>Payment - By <?php echo $row['paymethod']; ?></strong></td>
  </tr>
</table><p />

	
			
		<table width="100%" border="0" cellspacing="1" cellpadding="0" style="border:solid 1px #000">
  <tr style="color:#FFF;">
    <td width="20%" height="30" align="left" valign="middle" bgcolor="#333333" style="padding:0 0 0 8px;">PRODUCT</td>
    <td width="33%" height="30" align="left" valign="middle" bgcolor="#333333" style="padding:0 0 0 8px;">NAME</td>
    <td width="15%" height="30" align="left" valign="middle" bgcolor="#333333" style="padding:0 0 0 8px;">PRICE</td>
    <td width="12%" height="30" align="center" valign="middle" bgcolor="#333333" style="padding:0 0 0 8px;">QTY</td>
    <td width="20%" height="30" align="right" valign="middle" bgcolor="#333333" style="padding:0 0 0 8px;">TOTAL</td>
  </tr>
  
  <?php 
  $sbttl=0;
  $orw=mysql_query("SELECT * FROM `magicmasala_tbl_checkout` WHERE orderid='".$row['orderid']."'");
  
  
  while($lp=mysql_fetch_array($orw)){
	  
  $sbttl+=$lp['subtotal'];
  
  ?>
  
  
  <tr>
    <td align="center" valign="middle" bgcolor="#CCCCCC" style="padding:0 0 0 8px;"><img src="../Product-Image/<?php echo $lp['prdimage']; ?>" style="border:solid 1px #000" height="50" /></td>
    <td align="left" valign="middle" bgcolor="#CCCCCC" style="padding:0 0 0 8px;"><?php echo $lp['prdname']; ?></td>
    <td align="left" valign="middle" bgcolor="#CCCCCC" style="padding:0 0 0 8px;"><?php echo $lp['price']; ?></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC" style="padding:0 0 0 8px;"><?php echo $lp['qty']; ?></td>
    <td align="right" valign="middle" bgcolor="#CCCCCC" style="padding:0 0 0 8px;"><?php echo $lp['subtotal']; ?></td>
  </tr>
  
  <?php } ?>
  
  </table><br />
<br />

<?php 
$dscnt=($sbttl*$row['discount'])/100;

$gndttl=($sbttl-$dscnt)+$row['shipping_price'];


?>

  <table width="100%" border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td width="6%" height="34" align="left" valign="middle">&nbsp;</td>
    <td width="6%" align="left" valign="middle">&nbsp;</td>
    <td width="51%" align="left" valign="middle">&nbsp;</td>
    <td colspan="2" align="right" valign="middle">Subtotal : &pound;<?php echo number_format($sbttl,2,'.',''); ?> <hr /></td>
    </tr>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td width="14%" align="left" valign="middle">Discount : <?php echo $row['discount']; ?>%</td>
    <td width="23%" align="right" valign="middle">&pound;<?php echo number_format($dscnt,2,'.',''); ?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td colspan="2" align="left" valign="middle"><hr /></td>
    </tr>
  <tr>
    <td height="34" align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td colspan="2" align="right" valign="middle">Shipping Chearge : &pound; <?php echo $row['shipping_price']; ?><hr /></td>
    </tr>
    
     <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td colspan="2" align="right" valign="middle"><strong>Grand Total : &pound;<?php echo number_format($gndttl,2,'.',''); ?></strong> <hr /></td>
    </tr>
</table>
<br />
<br />


<table width="100%" border="0" cellspacing="1" cellpadding="0" style="border:solid 1px #000">
  <tr style="color:#FFF;">
    <td width="51%" height="30" align="left" valign="middle" bgcolor="#333333" style="padding:0 0 0 8px;"><strong>PERSONAL INFORMATION</strong></td>
    <td width="49%" height="30" align="left" valign="middle" bgcolor="#333333" style="padding:0 0 0 8px;"><strong>SHIPPING INFORMATION</strong></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#CCCCFF" style="padding:0 8px 0 8px;">
    <p>
    
    <table width="100%" border="1" cellspacing="1" cellpadding="0">
  <tr>
    <td width="28%" height="25" align="left" valign="middle" bgcolor="#FFFFFF">Name :</td>
    <td width="72%" height="25" align="left" valign="middle" bgcolor="#FFFFFF">: <?php echo $row['pertitle']; ?> <?php echo $row['pername']; ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle" bgcolor="#FFFFFF">Home Phone</td>
    <td height="25" align="left" valign="middle" bgcolor="#FFFFFF">: <?php echo $row['perhomephone']; ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle" bgcolor="#FFFFFF">Contact No.</td>
    <td height="25" align="left" valign="middle" bgcolor="#FFFFFF">: <?php echo $row['permobile']; ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle" bgcolor="#FFFFFF">Email ID</td>
    <td height="25" align="left" valign="middle" bgcolor="#FFFFFF">: <?php echo $row['peremail']; ?></td>
  </tr>
  
  <tr>
    <td height="25" align="left" valign="middle" bgcolor="#FFFFFF">Company</td>
    <td height="25" align="left" valign="middle" bgcolor="#FFFFFF">: <?php echo $row['percompany']; ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle" bgcolor="#FFFFFF">Address</td>
    <td height="25" align="left" valign="middle" bgcolor="#FFFFFF">: <?php echo $row['peraddress']; ?></td>
  </tr>
</table>
</p>
    
    </td>
    <td align="left" valign="top" bgcolor="#CCCCFF" style="padding:0 8px 0 8px;">
    <p>
    
    <table width="100%" border="1" cellspacing="1" cellpadding="0">
  <tr>
    <td width="35%" height="25" align="left" valign="middle" bgcolor="#FFFFFF">Name :</td>
    <td width="65%" height="25" align="left" valign="middle" bgcolor="#FFFFFF">: <?php echo $row['shptitle']; ?> <?php echo $row['shpcontactper']; ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle" bgcolor="#FFFFFF">Home Phone</td>
    <td height="25" align="left" valign="middle" bgcolor="#FFFFFF">: <?php echo $row['shphomephone']; ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle" bgcolor="#FFFFFF">Contact No.</td>
    <td height="25" align="left" valign="middle" bgcolor="#FFFFFF">: <?php echo $row['shpmobileno']; ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle" bgcolor="#FFFFFF">Email ID</td>
    <td height="25" align="left" valign="middle" bgcolor="#FFFFFF">: <?php echo $row['shpemail']; ?></td>
  </tr>
  
  
  
  
  
  
  
  <tr>
    <td height="25" align="left" valign="middle" bgcolor="#FFFFFF">Addreess</td>
    <td height="25" align="left" valign="middle" bgcolor="#FFFFFF">: <?php echo $row['shpaddress']; ?></td>
  </tr>
</table>
</p>
    
    </td>
  </tr>
</table>








<script>
$("tr:odd").css("background", "#e2f5f9");
</script>

<?php
			}
			?>
            
            <font style=" font-size:14px; color:#F00;">
	<?php
	
	if((isset($_SESSION['s_msg'])) && (!isset($_GET['add'])))
		{
			echo $_SESSION['s_msg'];
			unset($_SESSION['s_msg']);
		}
		//$value = str_replace("'","",$value);
		
	
		
	?>
    
    </font>
<br/>

</div>





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