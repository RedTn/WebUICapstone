<?php
/*
 * Created on Nov 11, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include('mongo.php');
 	
 	if( isset($_POST['HookAngle'])) {
 		$tooth->insert( array(
 			"HookAngle" => $_POST['HookAngle'],
 			"TopAngle"  => $_POST['TopAngle']
 		));
 	}
 	
 	$cursor = $tooth->find();
?>

<form method = "LINK" Action="/mongo/index.php">
	<INPUT TYPE="submit" VALUE="Go Back">
</form>

<form method = "POST">
	<p> HookAngle: <input type="number" step="any" name="HookAngle" /></p>
	<p> TopAngle: <input type="number" step="any" name="TopAngle" /></p>
	<p><button>Add </button></p>
</form>

<!--TO BE PUT IN
<script type='text/javascript'>
<?php
foreach ($cursor as $doc) {
    $js_array = json_encode($doc);
echo "var javascript_array = ". $js_array . ";\n";
}
?>
</script>
-->

<?php if ($cursor->count() > 0): ?>
<ul>
	<?php foreach($cursor as $doc): ?>
	<li>
		<h2><?php echo $doc['HookAngle'] ?> ( <?php echo $doc['TopAngle'] ?>)</h2>
		<p>
			<a href="update.php?id=<?php echo $doc['_id']; ?>"> UPDATE </a> <br>
			<a href="delete.php?id=<?php echo $doc['_id']; ?>"> DELETE </a> 
		</p>
		</li>
	<?php endforeach; ?>
</ul>
<?php else: ?>
<p> No tooth </p>
<?php endif; ?>