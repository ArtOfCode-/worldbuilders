<?php
	require_once("/home/u875642593/public_html/process/proc.standard.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Worldbuilders | Contact Us</title>
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
				<h3>Contact Us</h3>
				<p>This site was made by ArtOfCode, from <a href="http://worldbuilding.stackexchange.com/questions/4726/site-for-online-custom-map-with-tags-or-labels">a suggestion</a> put forward on <a href="http://worldbuilding.stackexchange.com/">Worldbuilding Stack Exchange</a>.</p>
				<p>To get in touch with us, send us an email: <a href="mailto:admin@worldbuilders.hol.es">admin@worldbuilders.hol.es</a></p>
				<p>Alternatively, you can use this form:</p>
				<?php
					if($_POST["message"] == "" && $_POST["name"] == "" && $_POST["email"] == "") { ?>
						<form name="email-form" action="contact.php" method="POST">
							Your name: <input type="text" name="name" placeholder="Joe Bloggs" /><br/>
							Your email: <input type="email" name="email" placeholder="joe@bloggs.com" /><br/>
							Your message:<br/>
							<textarea rows="10" cols="70" name="message"></textarea><br/><br/>
							<input type="submit" value="Send Message" />
						</form>
					<?php
					}
					else if($_POST["message"] == "" || $_POST["name"] == "" || $_POST["email"] == "") { ?>
						<span class="error message">Please fill in all the fields.</span>
						<form name="email-form" action="contact.php" method="POST">
							Your name: <input type="text" name="name" placeholder="Joe Bloggs" /><br/>
							Your email: <input type="email" name="email" placeholder="joe@bloggs.com" /><br/>
							Your message:<br/>
							<textarea rows="10" cols="70" name="message"></textarea><br/><br/>
							<input type="submit" value="Send Message" />
						</form>
					<?php
					}
					else {
						$to = "admin@worldbuilders.hol.es; owen.jenkins2903@gmail.com;";
						$from = $_POST["name"];
						$email = $_POST["email"];
						$message = $_POST["message"];
						$content = "<p>NEW MESSAGE:</p><p>From: " . $from . ", email: " . $email . "</p><p><strong>Message:</strong></p><p>" . $message . "</p>";
						mail($to, "New Message - Worldbuilders", $content, "Content-Type: text/html\r\n");
						echo("<span class='success message'>Your message has been sent.</span>");
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