<?php  
if (isset($_POST['submit'])) {
	$file = $_FILES['file'];
	print_r($file);
	$fileName=$file['file']['name'];
	/*$fileTmp=$file['tmp_name'];
	$fileError=$file['error'];
	$fileSize=$file['size'];
	$fileType=$file['type'];

	$Ext=*/
}
?>