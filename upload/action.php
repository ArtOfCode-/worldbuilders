<?php
require_once("/home/u875642593/public_html/process/proc.standard.php");

function checkit() {
$target_dir = "/files/" . usernameIs() . "/";
$file_exploded = explode(".", basename($_FILES["uploadedFile"]["name"]));
$target_file = $_SERVER["DOCUMENT_ROOT"] . $target_dir . date(HisdmY) . "." . $file_exploded[count($file_exploded) - 1];
$targetfile_safe = usernameIs() . "/" . date(HisdmY) . "." . $file_exploded[count($file_exploded) - 1];
$imageFileType = $file_exploded[count($file_exploded) - 1];

if(!isset($_FILES["uploadedFile"])) {
	// ECODE 0: No file
	header("Location: upload.php?upload=fail&ecode=0");
	return false;
}
if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "bmp") {
	// ECODE 1: Wrong filetype
	header("Location: upload.php?upload=fail&ecode=1");
	return false;
}

$check = getimagesize($_FILES["uploadedFile"]["tmp_name"]);
if($check == false) {
	// ECODE 1: Wrong filetype
    header("Location: upload.php?upload=fail&ecode=1");
	writeLog("upload/action.php:checkit", "User uploaded obfuscated non-image: " . usernameIs() . " to " . $target_file);
	return false;
}

if(move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $target_file)) {
	header("Location: /edit/meta?upload=success&filename=" . $targetfile_safe);
	return true;
}
else {
	// ECODE 2: Upload failed
	header("Location: upload.php?upload=fail&ecode=2");
	writeLog("upload/action.php:checkit", "File accepted but upload failed. Server error? Check file.");
	writeLog("upload/action.php:checkit", "User: " . usernameIs() . ", file: " . $target_file);
	return false;
}
}

checkit();
?>