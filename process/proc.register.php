<?php
	function generateSalt() {
		$length = 16;
		$randomString = base64_encode(mcrypt_create_iv(ceil(0.75*$length), MCRYPT_DEV_URANDOM));
		return $randomString;
	}
	function hashPassword($password, $salt) {
		return hash("sha256", $password . $salt);
	}
?>