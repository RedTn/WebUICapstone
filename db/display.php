<?php
/*
 * Created on Nov 20, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include('mongo.php');
 $cursor = $tooth->find();
?>
<form method = "LINK" Action="/mongo/index.php">
	<INPUT TYPE="submit" VALUE="Go Back">
</form>
<?php
	foreach($cursor as $key => $value) {
		echo $value . "<br>";
	}
?>