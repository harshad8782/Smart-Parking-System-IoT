<?php
	class LeftMenu {
		var $MenuItem = array();
		
		function AddMenu($ItemName,$ItemValue) {
			$cur = count($this->MenuItem);
			$this->MenuItem[$cur][0] = $ItemName;
			$this->MenuItem[$cur][1] = $ItemValue;
		}
	}
	$gg = new LeftMenu();
	$gg->AddMenu("Yahoo","http://www.yahoo.com");
	$gg->AddMenu("Rediff","http://www.rediff.com");
	$gg->AddMenu("Gmail","http://www.gmail.com");
	
	//print_r($gg->MenuItem);
?>
<?php
	$cur = count($gg->MenuItem);
	for($i=0;$i<$cur;$i++) {
?>
<a href="<?php echo $gg->MenuItem[$i][1];?>"><?php echo $gg->MenuItem[$i][0];?></a><br />
<?php }?>