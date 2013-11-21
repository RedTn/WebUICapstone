<?php
/*
 * Created on Nov 11, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include('mongo.php');

$dbarray = array();

if (isset($_POST['clear'])) 
{ 
	ob_end_clean();
}  
if(isset($_POST['dropbut']))
{
	$dropname = $_POST['dropname'];
	$reponse = $db->$dropname->drop();
	print_r($reponse);
}
?>
<form method = "LINK" Action="/mongo/index.php">
	<INPUT TYPE="submit" VALUE="Go Back">
</form>

<form action="" method="POST">
<input type="submit" name="clear" value="Clear Page"/> <br>
</form>

<form action="" method="POST">
    <input type="text" id="display" name="txt"/>
    <input type="submit" name="submit"/>
</form>

<form action="" method="POST">
    <input type="textbox" id="display" name="dropname"/>
    <input type="submit" value="Drop database" name="dropbut"/>
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
		$collection = explode("//", $text);
		$headerArray = explode("||", $collection[1]);
		$textArray = explode("\n", $headerArray[1]);
		$headers = explode(",",$headerArray[0]);
		$curhead = current($headers);
		if(isset($textArray)) {
			foreach($textArray as $value) {
				//echo "$value <br>";
				$parsedvalues = explode(",", $value);
				if(isset($parsedvalues)) {
					foreach($parsedvalues as $value2) {
						$dbbuffer[$curhead] = $value2;
						$curhead = next($headers);
					}
					$curhead = reset($headers);
					array_push($dbarray,$dbbuffer);
					unset($dbbuffer);
				}
			}
			$thisdb = $db->$collection[0];
			$thisdb->batchInsert($dbarray);
			var_dump($dbarray);
		}
	}
	else {
		echo "Filename: " . $_POST['txt'] . " not found.";
	}
}

?>

<script src="/mongo/jquery.js"></script>
<script type="text/javascript">
$('input[name="dest_type"]').on('change', function() {
   
    $('input[type="text"]').val($(this).val());

});
</script>
