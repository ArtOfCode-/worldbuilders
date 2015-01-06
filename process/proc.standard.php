<?php
	session_start();
	
	// Database control: get connections; return query results
	function queryDatabase($query) {
		$DB_HOST = "mysql.hostinger.co.uk";
		$DB_USER = "u875642593_admin";
		$DB_PASS = "----";
		$DB_NAME = "u875642593_dbm";
		$connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
		if(!$connection || mysqli_connect_errno()) return false;
		else return mysqli_query($connection, $query);
	}
	function getDBConnection() {
		$DB_HOST = "mysql.hostinger.co.uk";
		$DB_USER = "u875642593_admin";
		$DB_PASS = "----";
		$DB_NAME = "u875642593_dbm";
		$connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
		return $connection || false;
	}
	
	// User data: find current username; userlevel; is user logged in
	function usernameIs() {
		return $_SESSION["username"];
	}
	function getUserlevel() {
		$connection = getDBConnection();
		$username = mysqli_real_escape_string($connection, $_SESSION["username"]);
		$results = queryDatabase("SELECT userlevel FROM users WHERE username='" . $username . "'");
		$row = $results->fetch_assoc();
		return $row["userlevel"];
	}
	function isLoggedIn() {
		return $_SESSION["username"];
	}
	
	// General utilities: clean up strings (remove illegal chars), logging
	function cleanString($string) {
		$string = str_replace("\0", " ", $string); // NULL char: ASCII 0, \0
		$string = str_replace("\r", " ", $string); // CR carriage return: \r
		$string = str_replace("\n", " ", $string); // LF line feed: \n
		$string = str_replace("\"", " ", $string); // " quote: \"
		$string = str_replace("'", " ", $string); // ' quote: '
		$string = str_replace(chr(26), " ", $string); // Ctrl-Z: ASCII 26, chr(26)
		$string = str_replace(";", " ", $string); // Semicolon (SQL separator): ;
		return $string;
	}
	
	function writeLog($scriptName, $logData) {
		$date = date("d-m-Y H:i:s");
		$logString = "[" . $date . "] [" . $scriptName . "] " . $logData;
		$return = file_put_contents("/log.log", file_get_contents("/log.log") . "\n" . $logData);
		if($return === false)
			return false;
		else
			return true;
	}
	
?>