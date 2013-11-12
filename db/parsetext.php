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

<form>
    <input type="text" id="display">
</form>

<?php
	$blank = '';
	echo "<h1>Text Files</h1>";
	foreach(glob("logs/*.txt") as $filename){
		$file = str_replace('logs/', '', $filename);
		?>
		<INPUT TYPE="radio" id="test3" name="dest_type" VALUE="<?php echo $file ?>" onclick="modify_value()"/>
		<?php echo "$filename<br>";
	}

?>

<script src="/jquery.js"></script>
<script type="text/javascript">
$('input[name="dest_type"]').on('change', function() {
   
    $('input[type="text"]').val($(this).val());

});
</script>
