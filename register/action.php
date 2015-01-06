<?php
	require_once("/home/u875642593/public_html/process/proc.standard.php");
	require_once("/home/u875642593/public_html/process/proc.register.php");
	
	function checkDetails() {
	$connection = getDBConnection();
	$username = cleanString($_POST["username"]);
	$password = cleanString($_POST["password"]);
	$repeat = cleanString($_POST["pass-repeat"]);
	$email = cleanString($_POST["email"]);
	if($username != "" && $password != "" && $repeat != "" && $email != "") {
		$results = queryDatabase("SELECT * FROM users");
		while($row = $results->fetch_assoc()) {
			if($row["username"] == $username) {
				return header("Location: register.php?return=false&ecode=1");
			}
			if($row["email"] == $email) {
				return header("Location: register.php?return=false&ecode=2");
			}
		}
		if($password !== $repeat) {
			header("Location: register.php?return=false&ecode=3");
		}
		else {
			$userSalt = generateSalt();
			$fullHash = hashPassword($password, $userSalt);
		
			queryDatabase("INSERT INTO `users`(`username`, `email`, `passhash`, `usersalt`, `userlevel`) VALUES ('" . $username . "', '" . $email . "', '" . $fullHash . "', '" . $userSalt . "', 1)");
			$check = queryDatabase("SELECT * FROM users WHERE username='" . $username . "'");
			$row = $check->fetch_assoc();
			if($row) {
				if(mkdir($_SERVER["DOCUMENT_ROOT"] . "/files/" . $username)) {
					header("Location: register.php?return=true");
				}
				else {
					header("Location: register.php?return=false&ecode=4");
				}
			}
			else {
				header("Location: register.php?return=false&ecode=4");
			}
		}
	}
	else {
		header("Location: register.php?return=false&ecode=0");
	}
	}
	
	checkDetails();
?>