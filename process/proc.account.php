<?php
	require_once("/home/u875642593/public_html/process/proc.standard.php");
	
	class loginStatus {
		public $True = "LOGGED_IN";
		public $False = "NOT_LOGGED_IN";
	}
	
	function verify() {
		if(strlen(isLoggedIn()) > 0) {
			return loginStatus.True;
		}
		else {
			return loginStatus.False;
		}
	}
?>