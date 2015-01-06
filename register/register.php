<?php
	require_once("/home/u875642593/public_html/process/proc.standard.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Worldbuilders | Register</title>
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
				<h3>Register</h3>
				<?php
					if(isset($_GET["ecode"])) {
						switch($_GET["ecode"]) {
							case "0":
								echo("<span class='error message'>Please fill in all the fields.</span>");
								break;
							case "1":
								echo("<span class='error message'>Username is already in use.</span>");
								break;
							case "2":
								echo("<span class='error message'>Email is already in use.</span>");
								break;
							case "3":
								echo("<span class='error message'>Passwords do not match.</span>");
								break;
							case "4":
								echo("<span class='error message'>Login details are valid but could not be added to the database. Please contact the site owner.</span>");
								break;
						}
					}
					if($_GET["return"] == "true") {
						echo("<span class='success message'>Your account was created successfully.</span>");
					}
				?>
				To register, fill in your details below and click Register.<br/>
				<span class="warning message">Please use a strong password while the site is in development, as the 'change password' feature will come later on.</span>
				<form name="register" action="action.php" method="POST">
					<table border="0">
						<tr>
							<td><label for="username">Username: </label></td>
							<td><input type="text" name="username" /></td>
						</tr>
						<tr>
							<td><label for="password">Password: </label></td>
							<td><input type="password" name="password" /></td>
						</tr>
						<tr>
							<td><label for="pass-repeat">Repeat Password: </label></td>
							<td><input type="password" name="pass-repeat" /></td>
						</tr>
						<tr>
							<td><label for="email">Email: </label></td>
							<td><input type="email" name="email"></td>
						</tr>
					</table>
					<input type="submit" name="submit" value="Register" />
				</form>
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