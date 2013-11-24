<?php
/*
 * Created on Nov 23, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 	$dataout = array(0 => "HookAngle: 1; TopAngle: 50.5; TangentialAngle: 60.5; ", 1 => "HookAngle: 98; TopAngle: 20.2; TangentialAngle: 20.3; ", 2 => "HookAngle: 1.5; TopAngle: 3.5; TangentialAngle: 2.4; ");
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
     
     function multiarray_print($generalarray, $structure1, $structure2)
     {
	     for($i=0; $i<count($generalarray); $i++)
	     {
	     	
	     	for($n=0; $n<count($generalarray[$i]); $n++)
	     	{
	     		
	     	}
	     }
     }
    if(isset($_POST['formSubmit'])) 
    {
    	//$s=array(0);
    	$nS = count($dataout);
    	for($i=0; $i<$nS; $i++)
					{
						//$p = preg_split("/[\s,]+/", $dataout[$i], -1, PREG_SPLIT_NO_EMPTY);
						$p = explode(";", $dataout[$i]);
						//print_r($p);
						//print_r($p[0]);
						for($n=0; $n<count($p)-1; $n++)
						{
							$s = explode(":", $p[$n]);
							
							echo("The value of $s[0] at $i is $s[1]<br/>\n");
							
						}
						echo("<br/><br/>");
	
						
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