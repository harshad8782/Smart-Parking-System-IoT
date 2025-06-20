<?php 
session_start();
error_reporting(0);
include("include/config.inc.php");	
$db->connect();
if(!isset($_SESSION['admin_name']))
	{
       header("Location:index.php");
	}

if((isset($_GET['add_one']))&&($_GET['add_one']==222))
{
	

		
 if(is_uploaded_file($_FILES['image_1']['tmp_name']))
				{
					
       			   $name1=basename($_FILES['image_1']['name']);
					$type1=$_FILES['image_1']['type'];
					$path1="../Product-Image";
					$temp1=$_FILES['image_1']['tmp_name'];
					$newval_img1 = $f->fileUpload($name1,$type1,$path1,$temp1);
				}
				
					
 if(is_uploaded_file($_FILES['image_2']['tmp_name']))
				{
					
    				$oname=$_FILES['image_2']['name'];
					
					$name1=basename($_FILES['image_2']['name']);
					$type1=$_FILES['image_2']['type'];
					$path1="../Product-file";
					$temp1=$_FILES['image_2']['tmp_name'];
					$newval_img2 = $f->fileUpload($name1,$type1,$path1,$temp1);
					
					$f=explode(".",$oname);
					$fd=$f[0]."_files";
					$td="../Product-file/$fd";
					
					mkdir($td); 				
                    chmod($td, 0777); 
					
					
					
	$dir = "C:/upload/$fd";
    $dirNew="$td";
    // Open a known directory, and proceed to read its contents
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
            //exclude unwanted 
            if ($file==".") continue;
            if ($file=="..")continue;
            //if ($file=="index.php") continue; for example if you have index.php in the folder

            if (copy("$dir/$file","$dirNew/$file"))
                {
                echo "Files Copyed Successfully";
                //echo "<img src=$dirNew/$file  />"; 
                //if files you are moving are images you can print it from 
                //new folder to be sure they are there 
                }
                else {echo "File Not Copy";}
            }
            closedir($dh);
        }
    }
				}
						
	
  $sql=mysql_query("INSERT INTO `tbl_product` (`id` ,`header` ,`image` ,`sd` ,`ld`)
  					VALUES (NULL , '$name', '$newval_img1', '$sd', '$newval_img2')");  
					
	if($sql){
		$_SESSION['p_msg'] = "Successfully Inserted";}	
	else{
		$_SESSION['p_msg']	="Your Data is Not Inserted";}
	header("Location:".$_SERVER['PHP_SELF']);
	exit();
	
}


?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?add_one=222" onsubmit="return checkfunction();" enctype="multipart/form-data">
    <tr>
    <td width="19%" height="50" align="left" valign="middle"><strong>Image :</strong></td>
    <td width="81%" height="50" align="left" valign="middle"><strong>
     <input name="image_1" type="file" class="right_text_area" id="image_1">
    </strong></td>
  </tr>
  <tr>
    <td width="19%" height="50" align="left" valign="middle"><strong>Header :</strong></td>
    <td width="81%" height="50" align="left" valign="middle"><strong>
      <input type="text" name="name" id="name" class="right_text_area" />
    </strong></td>
  </tr>
 
 
  <tr>
    <td width="19%" height="50" align="left" valign="middle"><strong>Short Description :</strong></td>
    <td width="81%" height="50" align="left" valign="middle"><strong>
     <textarea name="sd" id="sd"></textarea>
    </strong></td>
  </tr>
  
 <tr>
    <td width="19%" height="50" align="left" valign="middle"><strong>Long Description (Browse HTM File) :</strong></td>
    <td width="81%" height="50" align="left" valign="middle"><strong>
     <input name="image_2" type="file" class="right_text_area" id="image_2">
     
     <input type="hidden" name="sdirpath" id="sd"/>
     <input type="hidden" name="ddirpath" id="dd" />
     
    </strong></td>
  </tr>

  
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td height="60" align="left" valign="middle"><input type="submit" name="change" id="change" onclick="return chkvalid();" value="Add"  class="addbtn" style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#fff; font-weight:600; line-height:36px;" /></td>
  </tr>
  </form>
</table>
