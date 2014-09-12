<?php
/*
 * Created on Feb 4, 2014
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include('mongo.php');		//CHANGE IF NEEDED
 function getDateTimeFromMongoId(MongoId $mongoId)
{
    $dateTime = new DateTime('@'.$mongoId->getTimestamp());
    $dateTime->setTimezone(new DateTimeZone(date_default_timezone_get()));
    return $dateTime;
}

 $input = "ToothParam";
 $teeth = $db->$input;  //this is where you change to different Structures, you want Operationdata? , $input = "OperationData"; MAKE SURE you have data of it in the database
 $cursor = $teeth->find();  //find() can be replaced with many things, http://www.php.net/manual/en/mongocollection.find.php ,  functions are all on left
 foreach($cursor as $doc) {
 	$id = array_shift($doc);  //Pops the FIRST element off array, comment this out to see what array looks like without it
 	$output = getDateTimeFromMongoId($id);
 	//var_dump($output);

	//$format = date_format($output, 'd-m-Y H:i:s');	//2 timestamp formats for you to try, completely adjustible
	$format = date_format($output, 'g:ia \o\n l jS F Y');
 	echo $format . "*********"; 
 	
 }
 
?>
