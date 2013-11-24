<?php
/*
 * Created on Nov 23, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 	$data = array(0 => "HookAngle: 1; TopAngle: 50.5; TangentialAngle: 60.5; ", 1 => "HookAngle: 98; TopAngle: 20.2; TangentialAngle: 20.3; ", 2 => "HookAngle: 1.5; TopAngle: 3.5; TangentialAngle: 2.4; ");
 	$mdata = array("ToothParam"=>array("HookAngle: 1; TopAngle: 50.5; TangentialAngle: 60.5; "), "SawDimensions"=>array(0 => "Diameter: 1.1; PlateThickness: 1.2; ", 1 => "Diameter: 2.1; PlateThickness: 2.2; ", 2 => "Diameter: 3.1; PlateThickness: 3.2; "), "OperationsData" => array(0 => "GrindSide: 11; ", 1 => "GrindSide: 21; ", "GrindSide: 31; ", "GrindSide: 41; "));
 	/*
 	function recursive_array_search($needle,$haystack) { 
    foreach($haystack as $key=>$value) { 
        $current_key=$key; 
        if (is_array($value)) $val = recursive_array_search($needle,$value); 
        if($needle===$value OR ($val != false and $val != NULL)) { 
            if($val==NULL) return array($current_key); 
            return array_merge(array($current_key), $val); 
        } 
    } 
    return false;
     */
     //global variable $Tnum
     //global variable $Dnum
     //global variable $Snum
     // will have 2 functions 1 for single struct sleect, and 1 for multi struct select
     
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
    if(isset($_POST['formSubmit'])) 
    {
    	$dataout = $mdata;
    	if(array_key_exists ("ToothParam", $dataout)== TRUE || array_key_exists ("SawDimensions", $dataout) == TRUE || array_key_exists ("OperationsData", $dataout) == TRUE)
    	{
		    	if($dataout["ToothParam"] != NULL)
		    	{
		    		multiarray_print($dataout["ToothParam"]);
		    	}
		    	
		    	if($dataout["SawDimensions"] != NULL)
		    	{
		    		multiarray_print($dataout["SawDimensions"]);
		    	}
		    	
		    	if($dataout["OperationsData"] != NULL)
		    	{
		    		multiarray_print($dataout["OperationsData"]);
		    	}
    	}
    	
    	else
    	{
    		multiarray_print($dataout);
    	}

    }

?>
<html>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
<input type="submit" name="formSubmit" value="Submit" >
<br/>
<br/>
</form>
</html>