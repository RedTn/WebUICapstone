<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>PHP form select box</title>
<!-- define some style elements-->
<style>
label,a 
{
	font-family : Arial, Helvetica, sans-serif;
	font-size : 14px; 
}

</style>	
</head>

<body>
<form method = "LINK" Action="/mongo/index.php">
	<INPUT TYPE="submit" VALUE="Go Back">
</form>

<?php
	//COMMENT THIS OUT TO WORK ON NON MONGODB
include('mongo.php');
//*****************************

   function multiarray_print($dataout)
     {
	    $nS = count($dataout);
    	for($i=0; $i<$nS; $i++)
					{
						//$p = preg_split("/[\s,]+/", $dataout[$i], -1, PREG_SPLIT_NO_EMPTY);
						$p = explode(";", $dataout[$i]);
						for($n=0; $n<count($p)-1; $n++)
						{
							$s = explode(":", $p[$n]);
							
							echo("The value of $s[0] at $i is $s[1]<br/>\n");
							
						}
						echo("<br/><br/>");
	
						
					}
     }

if(isset($_POST['formSubmit'])) {
	
	if(!isset($_POST['ToothParam']))
	{
		if(!isset($_POST['SawDimensions']))
		{
			if(!isset($_POST['OperationData']))
			{
				echo("<p> You did not select any data to display!");
			}
			else 
			{
				$OD = array("OperationData");
				$ODm = $_POST['OperationData'];
				
				$SendData = array_merge($OD, $ODm);
				$nS = count($SendData);
				for($i=0; $i<$nS; $i++)
				{
					echo($SendData[$i] . " ");
				}
			}
		}	
		else if(!isset($_POST['OperationData']))
		{
			$SD = array("SawDimensions"); 
			$SDm = $_POST['SawDimensions'];
			
			$SendData = array_merge($SD, $SDm);
			$nS = count($SendData);
			for($i=0; $i<$nS; $i++)
			{
				echo($SendData[$i] . " ");
			}
		}
		
		else 
		{
			$SD = array("SawDimensions");
			$SDm = $_POST['SawDimensions'];
			$SDa = array_merge($SD, $SDm);
			
			$OD = array("OperationData");
			$ODm = $_POST['OperationData'];
			$ODa = array_merge($OD, $ODm);
			
			$SendData = array(array($SDa), array($ODa));
			$nS = count($SendData);
			for($i=0; $i<$nS; $i++)
			{
				echo($SendData[$i] . " ");
			}
		}
		
	}				
	
	else if(!isset($_POST['SawDimensions']) && !isset($_POST['OperationData']))
	{
		$TP = array("ToothParam");
		$TPm = $_POST['ToothParam'];
		
		$SendData = array_merge($TP, $TPm);
		$nS = count($SendData);
		for($i=0; $i<$nS; $i++)
		{
			echo($SendData[$i] . " ");
		}
	}
	
	else if(!isset($_POST['SawDimensions']))
	{
		$TP = array("ToothParam");
		$TPm = $_POST['ToothParam'];
		$TPa = array_merge($TP, $TPm);
		
		$OD = array("OperationData");
		$ODm = $_POST['OperationData'];
		$ODa = array_merge($OD, $ODm);
		
		$SendData = array(array($TPa), array($ODa));
		$nS = count($SendData);
		//var_dump($SendData);
	}
	
	else if(!isset($_POST['OperationData']))
	{
		$TP = array("ToothParam");
		$TPm = $_POST['ToothParam'];
		$TPa = array_merge($TP, $TPm);
		
		$SD = array("SawDimensions"); 
		$SDm = $_POST['SawDimensions'];
		$SDa = array_merge($SD, $SDm);
		
		$SendData = array(array($TPa), array($SDa));
		$nS = count($SendData);
		//var_dump($SendData);
	}
	else 
	{
		$TP = array("ToothParam");
		$TPm = $_POST['ToothParam'];
		$TPa = array_merge($TP, $TPm);
		
		$SD = array("SawDimensions"); 
		$SDm = $_POST['SawDimensions'];
		$SDa = array_merge($SD, $SDm);
		
		$OD = array("OperationData");
		$ODm = $_POST['OperationData'];
		$ODa = array_merge($OD, $ODm);
		
		$SendData = array(array($TPa), array($SDa), array($ODa));
		
		$nS = count($SendData);
		//var_dump($SendData);
		
		
	}
	$dboutputs = array();
	$dboutputs2 = array();
	//var_dump($SendData);
	
	foreach($SendData as $struct) {
		if(is_string($struct)) {
			$outstruct = $db->$struct;
			$cursor = $outstruct->find();
			if($cursor->count() > 0) {
				foreach($cursor as $doc) {
					$buffer = '';
					$skipheader = true;
					foreach($SendData as $header) {
						if($skipheader) {
							$skipheader = false;
						}
						else {
							$buffer .= $header . ": ";
							$buffer .= $doc[$header] . "; ";
						}
					}
					array_push($dboutputs, $buffer);
					$buffer = '';
				}
			}
			break;
		}
		else if(is_array($struct)) {
			foreach($struct as $inarray1) {
				$outstruct = $db->$inarray1[0];
				$cursor = $outstruct->find();
				if($cursor->count() > 0) {
					$dbhold = array();
					foreach($cursor as $doc) {
						$buffer = '';
						$skipheader = true;
						foreach($inarray1 as $header) {
							if($skipheader) {
								$skipheader = false;
							}
							else {
								$buffer .= $header . ": ";
								$buffer .= $doc[$header] . "; ";
							}
						}
						array_push($dbhold, $buffer);
						$buffer = '';
					}
					$dboutputs[$inarray1[0]] = $dbhold; 
					array_push($dboutputs2, $dbhold);
				}
			}
		}
		else {
			echo "Error, unknown type <br>";
		}
	}
	//var_dump($dboutputs);
	//var_dump($dboutputs2);
	
	//OUTPUT (only toothparam): array(3) { [0]=> string(53) "HookAngle: 1; TopAngle: 50.5; TangentialAngle: 60.5; " [1]=> string(54) "HookAngle: 98; TopAngle: 20.2; TangentialAngle: 20.3; " [2]=> string(53) "HookAngle: 1.5; TopAngle: 3.5; TangentialAngle: 2.4; " }
	//OUTPUT (selected Hook Angle, Top Angle, Tangential Angle, Diameter, Platethickness, grind side) : array(3) { ["ToothParam"]=> array(3) { [0]=> string(53) "HookAngle: 1; TopAngle: 50.5; TangentialAngle: 60.5; " [1]=> string(54) "HookAngle: 98; TopAngle: 20.2; TangentialAngle: 20.3; " [2]=> string(53) "HookAngle: 1.5; TopAngle: 3.5; TangentialAngle: 2.4; " } ["SawDimensions"]=> array(3) { [0]=> string(36) "Diameter: 1.1; PlateThickness: 1.2; " [1]=> string(36) "Diameter: 2.1; PlateThickness: 2.2; " [2]=> string(36) "Diameter: 3.1; PlateThickness: 3.2; " } ["OperationData"]=> array(4) { [0]=> string(15) "GrindSide: 11; " [1]=> string(15) "GrindSide: 21; " [2]=> string(15) "GrindSide: 31; " [3]=> string(15) "GrindSide: 41; " } }
	//OUTPUT (same as above, but with $dboutputs2): array(3) { [0]=> array(3) { [0]=> string(53) "HookAngle: 1; TopAngle: 50.5; TangentialAngle: 60.5; " [1]=> string(54) "HookAngle: 98; TopAngle: 20.2; TangentialAngle: 20.3; " [2]=> string(53) "HookAngle: 1.5; TopAngle: 3.5; TangentialAngle: 2.4; " } [1]=> array(3) { [0]=> string(36) "Diameter: 1.1; PlateThickness: 1.2; " [1]=> string(36) "Diameter: 2.1; PlateThickness: 2.2; " [2]=> string(36) "Diameter: 3.1; PlateThickness: 3.2; " } [2]=> array(4) { [0]=> string(15) "GrindSide: 11; " [1]=> string(15) "GrindSide: 21; " [2]=> string(15) "GrindSide: 31; " [3]=> string(15) "GrindSide: 41; " } }
	
	$dataout = $dboutputs;
		    	if(array_key_exists ("ToothParam", $dataout)== TRUE || array_key_exists ("SawDimensions", $dataout) == TRUE || array_key_exists ("OperationData", $dataout) == TRUE)
		    	{
				    	if($dataout["ToothParam"] != NULL)
				    	{
				    		multiarray_print($dataout["ToothParam"]);
				    	}
				    	
				    	if($dataout["SawDimensions"] != NULL)
				    	{
				    		multiarray_print($dataout["SawDimensions"]);
				    	}
				    	
				    	if($dataout["OperationData"] != NULL)
				    	{
				    		multiarray_print($dataout["OperationData"]);
				    	}
		    	}
		    	
		    	else
		    	{
		    		multiarray_print($dataout);
		    	}
}

?>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
	<label for='ToothParam[]'>To select multiple elements hold down the 'ctrl' key <br/><br/>Tooth Parameters<br/>Select data you would like displayed:</label><br>
	<select multiple="multiple" name="ToothParam[]">
		<option value="HookAngle">Hook Angle</option>
		<option value="TopAngle">Top Angle</option>
		<option value="TangentialAngle">Tangential Angle</option>
		<option value="BevelDirection">Bevel Direction</option>
		<option value="RadialAngle">Radial Angle</option>
		<option value="BevelTop">Bevel Top</option>
		<option value="BevelFace">Bevel Face</option>
		<option value="Feed_Rate">Feed Rate</option>
		<option value="CutDepth">Cut Depth</option>
		<option value="TopLength">Top Length</option>
		<option value="FaceLength">Face Length</option>
		<option value="SideLength">Side Length</option>
		<option value="Runway">Runway</option>
		<option value="PlungeDepth">Plunge Depth</option>
		<option value="PlungeOffset">Plunge Offset</option>
		<option value="Pitch">Pitch</option>
		<option value="ChipBreakDepth">Chip Break Depth</option>
		<option value="ChipBreakOffset">Chip Break Offset</option>
		<option value="ChamferLeft">Chamfer Left</option>
		<option value="ChamferRight">Chamfer Right</option>
		<option value="ChamferFlatWidth">Chamfer Flat Width</option>
		<option value="ChamferHeightOffset">Chamfer Height Offset</option>
	</select><br>
	<br/>
	<br/>
	<label for='SawDimensions[]'>Saw Dimensions<br/>Select data you would like displayed:</label><br>
	<select multiple="multiple" name="SawDimensions[]">
		<option value="Diameter">Diameter</option>
		<option value="PlateThickness">Plate Thickness</option>
		<option value="Kerf">The Kerf</option>
		<option value="NumberOfTeeth">Number of Teeth</option>
		<option value="TeethInPattern">Teeth Pattern</option>
		<option value="Pitch">the Pitch</option>
		<option value="MultiPitch">Multi Pitch</option>
		<option value="CurrentTooth">Current Tooth</option>
		
	</select><br>
	<br/>
	<br/>
	<label for='OperationData[]'>Operations Data<br/>Select data you would like displayed:</label><br>
	<select multiple="multiple" name="OperationData[]">
		<option value="GrindSide">Grind Side</option>
		<option value="MaterialType">Material Type</option>
		<option value="NumberOfPasses">Number of Passes</option>
		<option value="CurrentPass">Current Pass</option>
		
	</select><br>
	<input type="submit" name="formSubmit" value="Submit" >
</form>

</body>
</html>
