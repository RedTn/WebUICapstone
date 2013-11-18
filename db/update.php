<?php
/*
 * Created on Nov 11, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include('mongo.php');
 
 if(isset($_GET['id'])) {
 	$toothsel = $tooth->findOne(array( '_id' => new MongoId($_GET['id'])));
 } else if (isset($_POST['HookAngle'])) {
 	$tooth->update(
 		array( '_id' => new MongoID($_POST['id'])),
 		array( "HookAngle" => $_POST['HookAngle'],
 				"TopAngle" => $_POST['TopAngle']
 				)
 	);
 	header("Location: /mongo/db/toothparam.php");
 }
?>

<form method = "POST" action="update.php">
	<input type="hidden" name="id" value="<?php echo $toothsel['_id'] ?>" />
	<p> HookAngle: <input type="text" name="HookAngle" value="<?php echo $toothsel['HookAngle'] ?>" /></p>
	<p> TopAngle: <input type="text" name="TopAngle" value="<?php echo $toothsel['TopAngle'] ?>" /></p>
	<p><button>Update </button></p>
</form>