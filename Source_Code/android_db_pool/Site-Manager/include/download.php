<?php
	$oFileName = $_GET['oFileName'];
	$sFileName = $_GET['sFileName'];
	$fType = $_GET['fType'];
	$fPath = $_GET['fPath'];
	header('Content-type: '.$fType);
	header('Content-Disposition: attachment; filename="'.$oFileName.'"');
	readfile($fPath'/'.$sFileName);
?>