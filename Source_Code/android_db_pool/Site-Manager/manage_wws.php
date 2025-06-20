<?php
error_reporting(0);
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
	$newval_img1=$_POST['hiddenimage_1'];

	$img_dsc=$_POST['img_dsc'];
	$header=$_POST['header'];

	$desc=$_POST['desc'];
	$desc = str_replace("'","`",$desc);	
	
	 if(is_uploaded_file($_FILES['image_1']['tmp_name']))
				{
					$name1=basename($_FILES['image_1']['name']);
					$type1=$_FILES['image_1']['type'];
					$path1="../Product-Image";
					$temp1=$_FILES['image_1']['tmp_name'];
					$newval_img1 = $f->fileUpload($name1,$type1,$path1,$temp1);
				}
	
		
	$query1="UPDATE  `tbl_wws` SET  `header` = '$header', `desc` = '$desc' WHERE `id` ='$idd'";
		
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
	$qry="delete from  tbl_wws where id=".$_GET['p_id'];
		
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
  <title>Admin Panel</title>
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
<script type="text/javascript">
function get_search(id){
window.location='modify_product.php?id='+id;	
	
}


</script>
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
			$sqlqry="SELECT * FROM  `tbl_wws` WHERE id=".$_GET['p_id'];
			$res=mysql_query($sqlqry);
			$row=mysql_fetch_array($res);
	
	?>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?add=777&<?php echo $paging;?>" onsubmit="return checkfunction();" enctype="multipart/form-data">
<input type="hidden" value="<?php   echo $row['id']; ?>" name="idd" id="idd">
        
<div class="addpage_bgwrapper1">
<div class="addpage_bg1">
<div class="top_bg1">
<div class="bluebg_left"></div>
<div class="bluebg_right1">Modify World Wide support</div>
<div class="clear"></div>
</div>

<div class="text_inner_wrapper">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
   
    <tr>
    <td width="19%" height="50" align="left" valign="middle"><strong>Header :</strong></td>
    <td width="81%" height="50" align="left" valign="middle"><strong>
      <input type="text" name="header" id="header" value="<?php echo $row['header']?>" class="right_text_area" />
     
    </strong></td>
  </tr>
  
  
  <tr>
    <td width="19%" height="50" align="left" valign="middle"><strong>Description :</strong></td>
    <td width="81%" height="50" align="left" valign="middle"><strong>
      <textarea name="desc" id="desc" class="right_text_area"><?php echo $row['desc']?></textarea>
     
    </strong></td>
  </tr>
  
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td height="60" align="left" valign="middle"><input type="submit" name="change" id="change" value="Save"  class="addbtn" style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#fff; font-weight:600; line-height:36px;" /></td>
  </tr>
</table>





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
     
     <br />
<br />

     
     
<table width="100%" border="1" bordercolor="#FFFFFF" cellspacing="0" cellpadding="0">
  <tr style="background-color:#00a9d4; font-size:14px; font-weight:600; font-family:Verdana, Geneva, sans-serif; color:#FFF">
    <td width="5%" height="40" align="center" valign="middle" style="background-color:#00a9d4;">SL NO</td>
    
    <td width="20%" height="40" align="center" valign="middle" style="background-color:#00a9d4;">Header</td>
     
     <td width="4%" height="40" align="center" valign="middle" style="background-color:#00a9d4;">Edit</td>
    <td width="6%" align="center" valign="middle" style="background-color:#00a9d4;">Delete</td>
  </tr>
  
  <?php
			$pageno=1;
			if(isset($_REQUEST['r_pageno']))
			{
			$pageno=$_REQUEST['r_pageno'];
										}
			$start=($pageno-1)*20; 
			$qry="SELECT * FROM  `tbl_wws`  ORDER BY id LIMIT  $start, 20";
			
			$editrslt=mysql_query($qry);
			$slno=$start+1;
			
			while($editrow=mysql_fetch_array($editrslt))
			{ 
			
			?>
  <tr style="background-color:#f0fbfd; font-size:12px;  font-family:Verdana, Geneva, sans-serif; color:#000;">
    <td align="center" height="100%" valign="middle"><?php echo $slno; ?></td>
   
    <td align="center" valign="middle" style="padding:2px 10px 2px 10px; text-align:justify;"><?php echo $editrow['header'];?></td>
     
    <td align="center" valign="middle"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?modify=777&p_id=<?php echo $editrow['id'];?>&<?php echo $paging;?>&a_id=<?php echo $a_id;?>"><img src="images/edit-notes.png" title="Edite <?php echo $editrow['name'];?> ? Click here" /></a></td>
    <td align="center" valign="middle"><a href="<?php $_SERVER['PHP_SELF'];?>?delete=999&p_id=<?php echo $editrow['id'];?>&<?php echo $paging;?>&a_id=<?php echo $a_id;?>" onClick="return condelete()"><img src="images/recycle.png" title="Delete <?php echo $editrow['name'];?> ? Click here" /></a></td>
  </tr>
   <?php
			$slno++;
			
			}
			?>
            
          <tr style="background-color:#f0fbfd; font-size:12px;  font-family:Verdana, Geneva, sans-serif; color:#000;">
            
            <?php $res=@mysql_query("SELECT * FROM  `tbl_wws`  ORDER BY id");
	$row=@mysql_num_rows($res);
	//echo $row;
	 $val= $row/20;
	 settype($val, "integer"); 
	//echo $val;
	$mul=$val*20;
	//echo $mul;
	if($mul!=$row)
		{
		
		$val++;
		
	
		}
	$start=$start+20;

	
	
	$pageno=$pageno+1;
	
	?>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
    <td align="center" height="100%" valign="middle">Total: <?php echo $val;?>&nbsp;pages</td>
   
    <td align="center" valign="middle" colspan="5" style="padding:2px 10px 2px 10px; text-align:justify;">
    <?php
								
								if(($pageno-1) > 1 && $val > 7)
								{
									$prev = $pageno-2;
									?>
										<div class="pgn1"><a href="<?php echo $_SERVER['PHP_SELF'];?>?r_pageno=<?php echo $prev;?>" style="text-decoration:none">< &nbsp;Prev</a></div>
								<?php }
								else if($val > 7)
								{?>
									<div class="pgn2"><a  style="text-decoration:none;">< &nbsp;Prev</a></div>
								<?php }
							if($val > 7)
							{
								if(($pageno-1) > 7 && ($pageno-1) < ($val-6))
								{
									$s = ($pageno - 1)-6;
								}
								else if(($pageno-1) >= ($val-6))
								{
									$s = $val - 6;
								}
								else
								{
									$s = 1;
								}
							}
							else
							{
								$s = 1;	
							}
								//echo $s;
			for($i=$s;$i<=($s+6) && $i<=$val;$i++)
				{
					
					if(isset($_GET['r_pageno']) && ($_GET['r_pageno']==$i))
					{
					?>
					
					<div class="pgn"><a href="<?php echo $_SERVER['PHP_SELF'];?>?r_pageno=<?php echo $i;?>" style="text-decoration:none; color:#900"><b><?php echo $i;?> </b></a></div>
					<?php
					}
					else if((!isset($_GET['r_pageno'])) && ($i==1))
						{
						?>
						<div class="pgn"><a href="<?php echo $_SERVER['PHP_SELF'];?>?r_pageno=<?php echo $i;?>" style="text-decoration:none; color:#900"><b><?php echo $i;?> </b></a></div>
						<?php
						}
					else
						{
						?>
						<div class="pgn"><a href="<?php echo $_SERVER['PHP_SELF'];?>?r_pageno=<?php echo $i;?>" style="text-decoration:none"><?php echo $i;?></a></div>
						
						<?php
						}
						
				}
			if(($pageno-1) < $val && $val > 7)
								{
									$next = $pageno;
									?>
										<div class="pgn1"><a href="<?php echo $_SERVER['PHP_SELF'];?>?r_pageno=<?php echo $next;?>" style="text-decoration:none"><b>Next&nbsp;></b></a></div>
								<?php }
								else if($val > 7)
								{?>
									<div class="pgn2"><a  style="text-decoration:none"><b>Next&nbsp;></b></a></div>
								<?php } ?>
    
    
    </td>
    </form>
    
    
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