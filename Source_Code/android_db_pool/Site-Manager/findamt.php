<?php
error_reporting(0);
include("include/config.inc.php");	
$db->connect();

?>



<select name="subcatid" id="subcatid" class="right_text_area">
<option value=""> -- Select -- </option>
<?php 
$amt_isu=$_REQUEST['country_id'];

$scat=mysql_query("SELECT * FROM `arttragen_tbl_subcategory` WHERE `catid`='".$amt_isu."'");
while($scatid=mysql_fetch_array($scat)){
?>
<option value="<?php echo $scatid['id']; ?>"><?php echo $scatid['subcat']; ?></option>

<?php } ?>
</select>
