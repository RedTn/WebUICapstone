<?php
session_start();
if( !isset($_SESSION['myusername']) )
{
	header("location:index.html");
	die();
}
else
{
?>
<html>
<head>
<title>Static Data</title>

</style>	
<LINK href="images/site.css" type=text/css rel=stylesheet>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" valign="top">
 <tr>
  <td valign="top">

<table width="100%" height="597" border="0" cellpadding="0" cellspacing="0">
 <tr>
  <td colspan="6" bgcolor="#FDFDFD" align="right"><div align="left"><img src="images/top_bg.gif" width="800" height="66"></div></td>
 </tr>
 <tr>
  <td width="800" height="1" colspan="6" bgcolor="#FFFFFF"><img src="images/spacer.gif" width="800" height="1"></td>
 </tr>
 <tr>
  <td width="99%" height="25" bgcolor="#515551"><img src="images/spacer.gif" width="180" height="25"></td>
  <td><a href="index.html" align="right"><img src="images/home.jpg" width="124" height="25" border="0"></a></td>
  <td><a href="static date.php" align="right"><img src="images/static date.jpg" width="124" height="25" border="0"></a></td>
  <td><a href="dynamic date.php" align="right">
  <img src="images/dynamic data.jpg" width="124" height="25" border="0" alt=""></a></td>
  <td><a href="logout.php" align="right"><img src="images/logout.jpg" width="124" height="25" border="0"></a></td>
  <td><a href="login_form.php" align="right"><img src="images/login.jpg" width="124" height="25" border="0"></a></td>
 </tr>
 <tr>
  <td width="180" height="3" bgcolor="#515551"><img src="images/spacer.gif" width="180" height="3"></td>
  <td width="124" height="3" bgcolor="#A6A6A6"><img src="images/spacer.gif" width="124" height="3"></td>
  <td width="124" height="3" bgcolor="#FF0000"><img src="images/spacer.gif" width="124" height="3"></td>
  <td width="124" height="3" bgcolor="#A6A6A6"><img src="images/spacer.gif" width="124" height="3"></td>
  <td width="124" height="3" bgcolor="#A6A6A6"><img src="images/spacer.gif" width="124" height="3"></td>
  <td width="124" height="3" bgcolor="#A6A6A6"><img src="images/spacer.gif" width="124" height="3"></td>
 </tr>
 <tr>
  <td height="373" valign="top" align="left" background="images/left_bg1.jpg">
   <table width="100%" height="100%" border="0" cellpadding="20" cellspacing="0" valign="top">
    <tr>
     <td valign="top">
   <p>&nbsp;     </p>
   <form name="form" id="form">
     <p><strong>Select the Data to be Displayed</strong></p>
     <p>&nbsp;</p>
   </form>
   <?php
	//COMMENT THIS OUT TO WORK ON NON MONGODB
include('mongo.php');

//$SendData;
//include('dynamic-dislpay.php');
//*****************************
/*
   function divide_and_c($PrintNew)
   	{
		$returnstring = 'n';
		//echo("$PrintNew in function start <br />");
								preg_match_all( '/[A-Z]/', $PrintNew, $matches);
								//$h = count($matches[0]);
								//print_r($matches[0]);
								//echo("$h");
								if(count($matches[0])<2)
								{									
									return $PrintNew;
									//echo("matches are less than 2 <br />");
								}
								else
								{
									$intername = preg_split('/(?=[A-Z])/', ucfirst($PrintNew));
									
									//echo("$intername[0],$intername[1]");
									//echo("matches are big 2");
									$returnstring = implode(" ", $intername);
									//echo("$returnstring");
									return $returnstring;
								}
								
								
		
	}
?><table class="ieh-fl"><?php 
   function multiarray_print($dataout)
     {
		 ?><tr><?php
	    $nS = count($dataout);
		$PrintOld = NULL;
		$PrintNew = NULL;
		$PrintNum = NULL;
		$ArrName[0]= NULL;
		$ArrNum[0]= NULL;
		$ArrTime[0] = NULL;
		
		

  				
			
                
    	for($i=0; $i<$nS; $i++)
					{
						
						
						array_push($ArrNum, $i);
						//$p = preg_split("/[\s,]+/", $dataout[$i], -1, PREG_SPLIT_NO_EMPTY);
						$p = explode(";", $dataout[$i]);
						$PrintNew = $PrintOld;
						for($n=0; $n<count($p)-1; $n++)
						{
							$s = explode(":", $p[$n]);
							$PrintNew = divide_and_c($s[0]);
							//echo("$PrintNew in main code <br />");
							
							if(!in_array($PrintNew, $ArrName) )
							{
							
								//echo("Were inside the checking function <br />");
								//$PrintNew = $s[0];
								$PrintNum = $s[1];

									array_push($ArrName, $PrintNew);
									/*for($l=0; $l<count($ArrName); $l++)
									{
										echo("the current values of array is $ArrName[$l] <br />");
									}
									
									array_push($ArrNum, $PrintNum);
								
							}
							else 
							{
								$PrintNum = $s[1];
								array_push($ArrNum, $PrintNum);
							}
							 
							//echo("The value of $s[0] at $i is $s[1]<br/>\n");
							
						}
						
						
							
					
					}
					
					?> 

		<div style="height:300px;overflow:auto;">
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
				<style>
                    table,th,td
                    {
                    border:1px solid black;
                    }
                </style>
				<tr>
					<th style="width:10px">Time</th>
				
				
				<?php
							
					$sizeName=count($ArrName);
					for($f=1; $f<$sizeName; $f++)
					{
							?><th style="width:10px"><?php echo("$ArrName[$f]") ?></th><?php
							
							
					}
					?>
                    </tr>
                    <tr><?php
					$maxcolumn = count($ArrName);
					$q = 0;
					for($c = 1; $c<count($ArrNum); $c++)
					{
						If($q==$maxcolumn)
						{
							?></tr><tr><?php
							$q=0;
						}
						$q++;
						
						?><td><?php echo("$ArrNum[$c]") ?></td> <?php
					}
					?></tr>
                   
					</table>
                    </div> 
                    </tr>
					<br><br><br><?php
     }
?></table><?php

*/
function multiarray_print($dataout)
{
	session_start();
	//<a href='dynamic-dislpay.php?dataout= $dataout'>click</a>
	$_SESSION['dataout'] = $dataout;
	//$serialized =htmlspecialchars(serialize($dataout));
	//echo "<input type=\"hidden\" name=\"DataOut\" value=\"$serialized\"/>";
header('Location: static-dislpay.php');

}

if(isset($_POST['formSubmit']))
{
	$SendData = array();
	// to expand the amount of structures of choice, add them in the "OR" statement, and add another "if" statement for that strcutre following the exmple of other strucures
	if(isset($_POST['ManualControls']) || isset($_POST['CurrentState']))
	{
		if(isset($_POST['ManualControls']))
		{
			$MC = array("ManualControls");
			$MCm = $_POST['ManualControls'];
			$MCa = array_merge($MC, $MCm);
			array_push($SendData, array($MCa));
		
		}
		
		
		if(isset($_POST['CurrentState']))
		{
			$CS = array("CurrentState");
			$CSm = $_POST['CurrentState'];
			$CSa = array_merge($CS, $CSm);
			array_push($SendData, array($CSa));
			
		}
		
	
	}
	else 
	{
		echo("<p> You did not select any data to display!");	
	}
//}
/*

if(isset($_POST['formSubmit'])) 
{
	
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
				
			//	for($i=0; $i<$nS; $i++)
			//	{
			//		echo($SendData[$i] . " ");
			//	}
				
			}
		}	
		else if(!isset($_POST['OperationData']))
		{
			$SD = array("SawDimensions"); 
			$SDm = $_POST['SawDimensions'];
			
			$SendData = array_merge($SD, $SDm);
			$nS = count($SendData);
			
		//	for($i=0; $i<$nS; $i++)
		//	{
		//		echo($SendData[$i] . " ");
		//	}
			
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
			
			//for($i=0; $i<$nS; $i++)
			//{
			//	echo($SendData[$i] . " ");
			//}
			
		}
		
	}				
	
	else if(!isset($_POST['SawDimensions']) && !isset($_POST['OperationData']))
	{
		$TP = array("ToothParam");
		$TPm = $_POST['ToothParam'];
		
		$SendData = array_merge($TP, $TPm);
		$nS = count($SendData);
		
		//for($i=0; $i<$nS; $i++)
		//{
		//	echo($SendData[$i] . " ");
		//}
		
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
*/	
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
	
	//test comment, collabs only
	$dataout = $dboutputs;
	//$datatransfer = $dataout;
	multiarray_print($dataout);
	/*
	    	if(array_key_exists ("ToothParam", $dataout)== TRUE || array_key_exists ("SawDimensions", $dataout) == TRUE || array_key_exists ("OperationData", $dataout) == TRUE)
		    	{
				    	if($dataout["ToothParam"] != NULL )
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
			
*/				
}

?>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
	<label for='ManualControls[]'>To select multiple elements hold down the 'ctrl' key <br/><br/><b>Manual Control Report Elements</b><br/>Select data you would like displayed:</label><br>
	<select multiple="multiple" name="ManualControls[]" width="600" style="width: 600px">
		<option value="Command">User Commnads</option>
		
	</select><br>
	<br/>
	<br/>
	<label for='CurrentState[]'><b>Current State report elements</b><br/>Select data you would like displayed:</label><br>
	<select multiple="multiple" name="CurrentState[]" width="600" style="width: 600px">
		<option value="State">Current State List</option>

		
	</select><br>
	<br/>
	<br/>
	<br>
	<input type="submit" name="formSubmit" value="Submit" >
</form>

     </td>
    </tr>
   </table>

  </td>
  <td width="124" height="373" bgcolor="#FFFFFF" align="right">
   <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" valign="top">
    <tr>
    <td width="124" height="29" bgcolor="#FFFFFF"><img src="images/spacer.gif" width="124" height="29"></td>
    </tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td><img src="images/red_gr_center.gif" width="124" height="194"></td>
</tr>
  </table>

</td>
  <td colspan="2" align="right"><img src="images/gerbera.jpg" width="248" height="373"></td>
  <td colspan="2" align="right"><img src="images/gerbera2.jpg" width="248" height="373"></td>
 </tr>
 <tr>
  <td width="800" height="3" colspan="6" bgcolor="#515551"><img src="images/spacer.gif" width="800" height="3"></td>
 </tr>
 <tr>
  <td width="800" height="1" colspan="6" bgcolor="#FFFFFF"><img src="images/spacer.gif" width="800" height="1"></td>
 </tr>
 <tr>
  <td width="800" height="8" colspan="6" bgcolor="#A6A6A6"><img src="images/spacer.gif" width="800" height="8"></td>
 </tr>
 <tr>
  <td colspan="6" bgcolor="#FDFDFD" align="right"><img src="images/address.jpg" width="800" height="68" alt=""></td>
 </tr>
 <tr>
  <td width="180" height="49" bgcolor="#FFFFFF" align="right">
  <img src="images/spacer.gif" width="180" height="49" alt=""></td>
  <td colspan="5" align="right"><img src="images/rounded_gr_bottom.jpg" width="620" height="49" alt=""></td>
 </tr>
</table>

</td>
 </tr>
</table>
</body>
</html>

<?php
}
?>