<?php
/*
 * Created on Feb 4, 2014
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include('mongo.php');
 
 $input = "ToothParam";
 $teeth = $db->$input;  //this is where you change to different Structures, you want Operationdata? , $input = "OperationData"; MAKE SURE you have data of it in the database
 $cursor = $teeth->find();  //find() can be replaced with many things, http://www.php.net/manual/en/mongocollection.find.php ,  functions are all on left
 foreach($cursor as $doc) {
 	//var_dump($doc);
 	$id = array_shift($doc);  //Pops the FIRST element off array, comment this out to see what array looks like without it
 	//echo $doc['HookAngle'];  
 	//$js_array = json_encode($doc);
	//echo "var javascript_array = ". $js_array . ";\n";
 	//var_dump($doc);		//each $doc is a multiarray
 	//print_r($doc);
 	var_dump($id);
 	$id.getTimestamp();
 	echo "\n*************************************************************************************************\n";
 }
?>
