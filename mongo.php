<?php
/*
 * Created on Nov 11, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 	$m = new Mongo();	//Default is localhost, port:27017
 	$db = $m->learningmongo;
 	$people = $db->people;
?>
