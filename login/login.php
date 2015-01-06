<?php
	require_once("/home/u875642593/public_html/process/proc.standard.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Worldbuilders | Login</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="/js/jquery.corner.js"></script>
	<script src="/js/utils.js"></script>
	<script src="/js/worldbuilding.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/css/worldbuilding.css" />
	<link rel="favicon" type="image/ico" href="/images/icon.ico" />
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
				<h3>Login</h3>
				<?php
					if(!$_GET["login"]) { ?>
						To login, fill in your details below and click Login.<br/>
						<form name="login" action="action.php" method="POST">
							<label for="username">Username: </label><input type="text" name="username" /><br/>
							<label for="password">Password: </label><input type="password" name="password" /><br/>
							<input type="submit" name="submit" value="Login" />
						</form>
					<?php
					}
					else if($_GET["login"] == "ffs") { ?>
						<span class="success message">You have been logged in and will be redirected soon.</span>
						Not being redirected? Click <a href="/">here.</a>
						<script>
							setTimeout(function() {
								location.href="/";
							}, 5000);
						</script>
					<?php
					}
					else { ?>
						<span class="error message">Your details were incorrect. Please try again.</span>
						<form name="login" action="action.php" method="POST">
							<label for="username">Username: </label><input type="text" name="username" /><br/>
							<label for="password">Password: </label><input type="password" name="password" /><br/>
							<input type="submit" name="submit" value="Login" />
						</form>
					<?php
					}
				?>
			</div>
			<div class="sidebar">
				<?php
					if(isLoggedIn()) { ?>
						<h3>Get Started</h3>
						<a href="/edit">My Maps</a>
						<a href="/collaboration">Collaborate</a>
						<a href="/login/logout">Log Out</a>
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