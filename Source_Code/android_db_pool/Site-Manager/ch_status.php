<?php 
session_start();
error_reporting(0);
include("include/config.inc.php");	
$db->connect();
$id=$_REQUEST['id'];
$status=$_REQUEST['status'];
if($status=='Active'){
 $status='Inactive';
}else{
$status='Active';
}
mysql_query("UPDATE bwddirectory_tbl_cusrecrd SET listing='".$status."' WHERE id='".$id."'");

$sql=mysql_query("SELECT listing FROM `bwddirectory_tbl_cusrecrd` WHERE id='".$id."'");
$row11=mysql_fetch_array($sql);
echo $row11['id'];

 /*?>if($row11['listing']=="Active"){?>
 <a href="javascript:(void);" onclick='javascript:ch_status(<?php echo $row11['id'];?>);'><img src="images/green_btn.png" /></a>
 <?php }else{ ?>
 <a href="javascript:(void)" onclick='javascript:ch_status(<?php echo $row11['id'];?>);'><img src="images/red_btn.png" /></a>
 <?php }?> <?php */?>