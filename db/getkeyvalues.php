<form method = "LINK" Action="/mongo/index.php">
	<INPUT TYPE="submit" VALUE="Go Back">
</form>

<?php
/*
 * Created on Jan 12, 2014
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
  include('mongo.php');
 $db = $m->varietyResults;
?>

<form action="" method="POST">
	Enter name of structure:
    <input type="textbox" id="display" name="structname"/>
    <input type="submit" value="Submit" name="namebut"/>
</form>

<?php
 	
 if(isset($_POST['namebut']))
{
	$name = $_POST['structname'];
	$struct = $db->$name;
	$query = array("value" => false);
	$cursor = $struct->find();
	foreach ($cursor as $doc) {
    $js_array = json_encode($doc);
	echo "var javascript_array = ". $js_array . ";\n";
	}
}
?>