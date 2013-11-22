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
										$OD = $_POST['OperationData'];
										$SendData = $OD;
										$nS = count($SendData);
										for($i=0; $i<$nS; $i++)
										{
											echo($SendData[$i] . " ");
										}
									}
						}	
						else if(!isset($_POST['OperationData']))
						{
									$SD = $_POST['SawDimensions'];
									$SendData = $SD;
									$nS = count($SendData);
									for($i=0; $i<$nS; $i++)
									{
										echo($SendData[$i] . " ");
									}
						}
						
						else 
						{
									$SD = $_POST['SawDimensions'];
									$OD = $_POST['OperationData'];
									$SendData = array_merge($SD, $OD);
									$nS = count($SendData);
									for($i=0; $i<$nS; $i++)
									{
										echo($SendData[$i] . " ");
									}
						}
						
		}				
						
		else if(!isset($_POST['SawDimensions']) && !isset($_POST['OperationData']))
		{
					$TP = $_POST['ToothParam'];
					$SendData = $TP;
					$nS = count($SendData);
					for($i=0; $i<$nS; $i++)
					{
						echo($SendData[$i] . " ");
					}
		}
		
		else if(!isset($_POST['SawDimensions']))
		{
					$TP = $_POST['ToothParam'];
					$OD = $_POST['OperationData'];
					$SendData = array_merge($TP, $OD);
					$nS = count($SendData);
					for($i=0; $i<$nS; $i++)
					{
						echo($SendData[$i] . " ");
					}
		}
		
		else if(!isset($_POST['OperationData']))
		{
					$TP = $_POST['ToothParam'];
					$SD = $_POST['SawDimensions'];
					$SendData = array_merge($TP, $SD);
					$nS = count($SendData);
					for($i=0; $i<$nS; $i++)
					{
						echo($SendData[$i] . " ");
					}
		}
		else 
		{
					$TP = $_POST['ToothParam'];
					$SD = $_POST['SawDimensions'];
					$OD = $_POST['OperationData'];
					$SendDatam = array_merge($TP, $SD);
					$SendData = array_merge($SendDatam, $OD);
					$nS = count($SendData);
					for($i=0; $i<$nS; $i++)
					{
						echo($SendData[$i] . " ");
					}
		
		//array_push($SendData, $OD);
		//array_push($SendData, $SD);
		//array_push();
		}
		$dboutputs = array();
	
		//$tooth = "toothparam";
		$cursor = $tooth->find();
		if($cursor->count() > 0) {
			foreach($cursor as $doc) {
				$buffer = '';
				foreach($SendData as $header) {
					$buffer .= $header . ": ";
					$buffer .= $doc[$header] . "; ";
				}
				array_push($dboutputs, $buffer);
				$buffer = '';
			}
			var_dump($dboutputs);
			//OUTPUT: array(3) { [0]=> string(53) "HookAngle: 1; TopAngle: 50.5; TangentialAngle: 60.5; " [1]=> string(54) "HookAngle: 98; TopAngle: 20.2; TangentialAngle: 20.3; " [2]=> string(53) "HookAngle: 1.5; TopAngle: 3.5; TangentialAngle: 2.4; " }
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