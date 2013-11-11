<?php
/*
 * Created on Nov 11, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include ('mongo.php');
 if (isset($_GET['id'])) {
 	$people->remove(array(
 		"_id" => new MongoID($_GET['id'])
 	));
 	header('Location: /mongo');
 }
?>
