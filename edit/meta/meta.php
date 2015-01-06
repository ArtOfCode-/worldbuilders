<?php
	require_once("/home/u875642593/public_html/process/proc.standard.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Worldbuilders | Edit Metadata</title>
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
				<h3>Edit Metadata</h3>
				<?php
					if($_GET["upload"] == "success") {
						echo "<span class='success message'>Your image has been successfully uploaded.</span>";
					}
				?>
				<span class="warning message">This page is <b>not yet fully functional</b>. If you press Save it will tell you that it has successfully saved; this is not the case. The script will always show a success at the moment.</span>
				Here you can edit your image's metadata. Give your map a name and description.
				<form name="edit-meta" method="POST" id="edit-meta">
					Your map's name: <input type="text" name="map-name" id="map-name" /><br/>
					Map description: <br/>
					<textarea rows="5" cols="60" name="map-desc" id="map-desc"></textarea><br/><br/>
					<input type="submit" name="submit" value="Save" /><span id="loader"><img src="/images/ajax-loader.gif" height="20" width="20" /></span>
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
	<script>
		var $_GET;
		(window.onpopstate = function () {
			var match,
			pl     = /\+/g,  // Regex for replacing addition symbol with a space
			search = /([^&=]+)=?([^&]*)/g,
			decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
			query  = window.location.search.substring(1);

			$_GET = {};
			while (match = search.exec(query))
				$_GET[decode(match[1])] = decode(match[2]);
		})();
		
		$("#loader").hide();
	</script>
	<script>
		$("#edit-meta").on("submit", function(e) {
			e.preventDefault();
			
			$("#loader").show();
			
			var map_filename = "/files/" + $_GET["filename"];
			$.ajax({
				type: "POST",
				url: "action.php",
				data: {
					filename: map_filename,
					"map-name": $("#map-name").val(),
					"map-desc": $("#map-desc").val()
				}
			})
			.done(function(data) {
				if(data == "SAVE::200 OK") {
					$("#edit-meta").after("<span class='success message' id='return'>Your changes were saved successfully.</span>");
				}
				else if(data == "SAVE::700 FAIL") {
					$("#edit-meta").after("<span class='error message' id='return'>Your changes were not saved. Please try again. If the problem persists, try again later or <a href='/contact'>contact us</a>.</span>");
				}
				$("#loader").hide();
				$("#return").fadeOut(3000);
			})
			.fail(function(jqXHR, textStatus) {
				$("#edit-meta").after("<span class='error message' id='return'>Your changes could not be saved due to a server error. The server returned: " + textStatus);
				$("#loader").hide();
				$("#return").fadeOut(3000);
			});
		});
	</script>
</body>
</html>