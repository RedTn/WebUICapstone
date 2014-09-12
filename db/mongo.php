<?php
/*
 * Created on Nov 11, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
?>

<!--<form method = "LINK" Action="/mongo/index.php">
	<INPUT TYPE="submit" VALUE="Go Back">
</form>

<form action="" method="POST">
    <input type="textbox" id="display" name="user"/>
    <input type="textbox" id="display" name="pass"/>
    <input type="submit" value="Login" name="Login"/>
    -->
<?php
	/*
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	setcookie($user, $pass, time()+3600);
	*/
	//$m = new MongoClient("mongodb://wwadmin:capstone@localhost");	//Default is localhost, port:27017
 	$m = new MongoClient("mongodb://user:capstone@localhost");	//Default is localhost, port:27017
 	//$m = new MongoClient();
 	//$m = new Mongo("172.20.10.8:65018"); //Remote host, port 65018
 	$db = $m->logging;
 	$tooth = $db->toothparam;
?>