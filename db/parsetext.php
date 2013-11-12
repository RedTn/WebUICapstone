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

<?php
	echo "<h1>Text Files</h1>";
	foreach(glob("logs/*.txt") as $filename){
		echo "$filename<br>";
	}
?>
//test