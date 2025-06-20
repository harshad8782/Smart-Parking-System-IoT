<?php 
include("connection.php");

//include("include/config.php");
//$f->isLogin('uname','index.php');

?>
<link rel="stylesheet" type="text/css" href="adminscript/menu/ddsmoothmenu.css"/>
<link rel="stylesheet" type="text/css" href="adminscript/menu/ddsmoothmenu-v.css"/>

<script type="text/javascript" src="adminscript/menu/jquery.js"></script>
<script type="text/javascript" src="adminscript/menu/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
mainmenuid: "smoothmenu1", //menu DIV id
orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
classname: 'ddsmoothmenu', //class added to menu's outer DIV
//customtheme: ["#1c5a80", "#18374a"],
contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

ddsmoothmenu.init({
mainmenuid: "smoothmenu2", //Menu DIV id
orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
//customtheme: ["#804000", "#482400"],
contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>
<div id="smoothmenu1">
  <ul>
    <li><a href="home.php">Home</a></li>
	<li><a href="user.php">Registered User</a>
       <!-- <ul>
          <li><a href="admin_category.php">Create Category</a></li>
         
          <li><a href="admin_subcategory.php">Create Sub Category</a></li>
          
          <li><a href="admin_product.php">Create Product</a></li>
		  
		   <li><a href="#">Edit Category</a></li>
		   <li><a href="#">Edit Sub Category</a></li>
          <li><a href="#">Edit Product</a></li>
         
        </ul>-->
    </li>
   <?php /*?> <li><a href="#">Test</a>
        <ul>
		<?php $sqlqry1="SELECT * FROM  tbl_category_master";
			$result1=mysql_query($sqlqry1);
			while($row1=mysql_fetch_array($result1)){?>
          <li><a href="#"><?php echo $row1['cat_name'];?></a></li><?php }?>
          <!--<li><a href="#">Sub Item 1.2</a></li>
          <li><a href="#">Sub Item 1.3</a></li>
          <li><a href="#">Sub Item 1.4</a></li>
          <li><a href="#">Sub Item 1.2</a></li>
          <li><a href="#">Sub Item 1.3</a></li>
          <li><a href="#">Sub Item 1.4</a></li>-->
        </ul>
    </li>
    
    <li><a href="#">Item 3</a></li>
    <li><a href="#">Folder</a>
	<?php //$sqlqry1="SELECT * FROM  tbl_category_master";
//			$result1=mysql_query($sqlqry1);
//			while($row1=mysql_fetch_array($result1)){?>
        <ul>
          <li><a href="#">TTT</a></li>
          <li><a href="#">AAA<?php // echo $row1['cat_name'];?></a>
              <ul>
                <li><a href="#">Sub Item 2.1.1</a></li>
                <li><a href="#">Sub Item 2.1.2</a></li>
                <li><a href="#">Folder 3.1.1</a>
                    <ul>
                      <li><a href="#">Sub Item 3.1.1.1</a></li>
                      <li><a href="#">Sub Item 3.1.1.2</a></li>
                      <li><a href="#">Sub Item 3.1.1.3</a></li>
                      <li><a href="#">Sub Item 3.1.1.4</a></li>
                      <li><a href="#">Sub Item 3.1.1.5</a></li>
                    </ul>
                </li>
                <li><a href="#">Sub Item 2.1.4</a></li>
              </ul>
          </li>
        </ul>
		<?php //}?>
    </li><?php */?>
    <li><a href="#">Other Link</a>
	<!--<ul><li><a href="user_login.php">User Login</a></li>
	<li><a href="user_registration.php">User Registration Page</a></li></ul>
  </ul>-->
  </li>
  <br style="clear: left" />
</div>
