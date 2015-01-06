<?php
	require_once("/home/u875642593/public_html/process/proc.standard.php");
	
	function hashPassword($password, $salt) {
		return hash("sha256", $password . $salt);
	}
	
	function setLoginDetails($username) {
		$_SESSION["username"] = $username;
		return true;
	}
	
	function checkDetails() {
		$username = cleanString($_POST["username"]);
		$password = cleanString($_POST["password"]);
		
		$dbRes = queryDatabase("SELECT * FROM users WHERE username='" . $username . "'");
		$dbRes_row = $dbRes->fetch_assoc();
		$usersalt = $dbRes_row["usersalt"];
		
		$pw_hash = hashPassword($password, $usersalt);
		$db_hash = $dbRes_row["passhash"];
		
		return ($pw_hash == $db_hash);
	}
	
	if(checkDetails()) {
		setLoginDetails($_POST["username"]);
		header("Location: login.php?login=ffs");
	}
	else {
		header("Location: login.php?login=1");
	}
?>