<?php
	require_once("/home/u875642593/public_html/process/proc.standard.php");
	
	function clearSessionData() {
		unset($_SESSION["username"]);
		session_unset();
		session_destroy();
	}
	
	clearSessionData();
	header("Location: /index.php?logout=true");
	
?>