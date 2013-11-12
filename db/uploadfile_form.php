<?php
/*
 * Created on Nov 11, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<form method = "LINK" Action="/mongo/index.php">
	<INPUT TYPE="submit" VALUE="Go Back">
</form>

<form enctype= "multipart/form-data" action="uploadfile.php" method = "post">

Browse for File to Upload: <br>

<input name="file" type="file" id="file" size="80"> <br>

<input type="submit" id="u_button" name="u_button" value="Upload the File">
</form>