<?php
/*
 * Created on Nov 11, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 $file_result = "";
 
 if($_FILES["file"]["error"] > 0)
 {
 	$file_result .= "No File Uploaded or Invalid File";
 	$file_result .= "Error Code: " . $_FILES["file"]["error"] . "<br>";
 	echo $file_result;
 } else {
 	
 	$file_result .=
 	"Upload: " . $_FILES["file"]["name"] . "<br>" .
 	"Type: " . $_FILES["file"]["type"] . "<br>" .
 	"Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br>" .
 	"Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
 	
 	move_uploaded_file($_FILES["file"]["tmp_name"],
 	"logs/" . $_FILES["file"]["name"]);
 	
 	$file_result .= "File Upload Succuessful!";
 	echo $file_result;
 }
?>
<form method = "LINK" Action="/mongo/db/uploadfile_form.php">
	<INPUT TYPE="submit" VALUE="Back">
</form>