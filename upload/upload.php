<?php
	require_once("/home/u875642593/public_html/process/proc.standard.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Worldbuilders | Upload a Map</title>
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
				<h3>Upload a Map</h3>
				<?php
					if(!isLoggedIn()) {
						echo "<span class='error message'>You must be logged in to upload maps. Please <a href='/login'>login</a> or <a href='/register'>register</a> to continue.</span>";
					}
					else { 
						if($_GET["upload"] == "fail") {
							switch($_GET["ecode"]) {
								case "0":
									echo "<span class='error message'>No file was received for upload. Please select a file and try again.</span>";
									break;
								case "1":
									echo "<span class='error message'>The file you selected was not an accepted file type. Please select an image and try again.</span>";
									break;
								case "2":
									echo "<span class='error message'>Your file was OK, but the upload process failed. Please try again. If the problem persists, <a href='/contact'>contact us</a> and explain the issue.</span>";
									break;
							}
						}
						?>
						<p>Use the form below to upload a map. Once uploaded, you will be taken to the edit page, where you can edit and tag your map.</p>
						<p>This uploader will accept JPEG, PNG, or BMP files. <a href="/info/upload-filetypes">Why?</a></p>
						<form name="upload" method="POST" action="action.php" enctype="multipart/form-data">
							Select your file: <input type="file" name="uploadedFile" accept=".jpg, .jpeg, .png, .bmp" /><br/>
							<input type="submit" name="submit" value="Upload" />
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