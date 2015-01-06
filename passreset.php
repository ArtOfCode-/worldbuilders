<?php
	require_once("/home/u875642593/public_html/process/proc.standard.php");
	require_once("/home/u875642593/public_html/process/proc.register.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Worldbuilders | Reset Password</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="/js/jquery.corner.js"></script>
	<script src="/js/utils.js"></script>
	<script src="/js/worldbuilding.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/css/worldbuilding.css" />
	<link rel="favicon" type="image/png" href="/images/icon.png" />
	<meta name="title" content="Worldbuilding" />
	<meta name="description" content="Collaborative map and world editing" />
	<meta name="keywords" content="worldbuilding, map, world" />
</head>
<body>
	<div class="container">
		<div class="nav">
			<h1 class="title">
				Worldbuilders
			</h1>
			<a href="/" title="Home">Home</a>
			<a href="/contact" title="Contact Us">Contact Us</a>
			<a href="/upload" title="Upload New Map">Upload a Map</a>
			<a href="/edit" title="Edit Existing Map">Edit a Map</a>
			<?php
				if(isLoggedIn()) {
					?>
					<a href="/account" title="My Account">My Account (<?php echo usernameIs() ?>)</a>
					<?php
				}
			?>
		</div>
		<div class="content">
			<div class="main-content">
				<h3>Reset Password - James</h3>
				I'm sorry - I really screwed this up. However, you can now reset your password and it should be all done with.
				<form name="resetpass" action="passreset.php" method="POST">
					New password: <input type="password" name="password" /><br/>
					Confirm: <input type="password" name="confirm" /><br/>
					<input type="submit" value="Change" />
				</form>
				<?php
					if(isset($_POST["password"]) && isset($_POST["confirm"])) {
						$password = $_POST["password"];
						$confirm = $_POST["confirm"];
						if($password == $confirm) {
							$salt = generateSalt();
							$passhash = hashPassword($password, $salt);
							queryDatabase("UPDATE TABLE users SET passhash='".$passhash."', usersalt='".$salt."' WHERE username='James'");
							echo "<span class='success message'>Password reset successful</span>";
						}
						else {
							echo "<span class='error message'>Passwords do not match</span>";
						}
					}
				?>
			</div>
			<div class="sidebar">
				<?php
					if(isLoggedIn()) { ?>
						<h3>Get Started</h3>
						<a href="/edit">My Maps</a>
						<a href="/collaboration">Collaborate</a>
					<?php
					}
					else { ?>
						<h3>Tasks</h3>
						<a href="/register">Register</a>
						<a href="/login">Login</a>
					<?php
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>