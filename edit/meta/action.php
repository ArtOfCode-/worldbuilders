<?php
	$file_content = "Filename=" . $_POST["filename"] . ";\n"
				  . "MapName=" . $_POST["map-name"] . ";\n"
				  . "MapDesc=" . $_POST["map-desc"] . ";\n";
	$splitSlashes = explode("/", $_POST["filename"]);
	$filename = "/home/u875642593/public_html/files/" . $splitSlashes[2] . "/" . $_POST["map-name"] . ".txt";
	$save = file_put_contents($filename, $file_content);
	if($save) {
		echo "SAVE::200 OK";
	}
	else {
		echo "SAVE::700 FAIL";
	}
?>