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

<form action="" method="POST">
    <input type="text" id="display" name="txt"/>
    <input type="submit" name="submit"/>
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

<p></p>
<?php
 if( isset($_POST['txt'])) {
 		$curfile = "logs/" . $_POST['txt'];
 		//echo $curfile;
 		if(@fopen($curfile, "r")) {
 		$text = file_get_contents($curfile);
 		$textArray = explode("\n", $text);
 		if(isset($textArray)) {
 		   foreach($textArray as $value) {
 		   		echo "$value <br>";
 		   }
 		}
 		}
 		else {
 			echo "Filename: " . $_POST['txt'] . " not found.";
 		}
 	}
 	?>

<script src="/jquery.js"></script>
<script type="text/javascript">
$('input[name="dest_type"]').on('change', function() {
   
    $('input[type="text"]').val($(this).val());

});
</script>
