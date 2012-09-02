<?php
	define("CROSSER_ROOT_DIR", dirname("."));
	
	require_once(CROSSER_ROOT_DIR . "/classes/Crosser.class.php");
	
	$crosser = new Crosser();
	
	$crosser->LoadConfig("default");
	$crosser->DoTheWork();
?>
