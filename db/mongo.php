<?php
/*
 * Created on Nov 11, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 	$m = new Mongo();	//Default is localhost, port:27017
 	//$m = new Mongo("172.20.10.8:65018"); //Remote host, port 65018
 	$db = $m->logging;
 	$tooth = $db->toothparam;
?>
