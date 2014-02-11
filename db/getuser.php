<?php
/*
 * Created on Feb 6, 2014
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
   ////////////////////////////////////////////////
   //Necessary for anything requiring user database
   $m = new Mongo();
   $db = $m->userdb;
   $db->drop();  //********COMMENT THIS OUT FOR REAL CODE, THIS IS JUST TO CLEAN UP FROM SANDBOX TESTING
   $db = $m->userdb;
   $user = $db->users;
   ///////////////////////////////////////////////
   
   //Inserting users into database
   $username1 = "user1";
   $password1 = "pass1";  //Change password into encrypted password
   
   $username2 = "user2";
   $password2 = "pass2";
   
   $username3 = "user3";
   $password3 = "pass3";
   
  $reponse = $user->insert( array(
 			"Username" => $username1,
 			"Password"  => $password1
 		));
 		
 print_r($reponse);  //1 means pass, 0 means fail
 ?>
 	<br>
 	<?php
 	
 	$reponse = $user->insert( array(
 			"Username" => $username2,
 			"Password"  => $password2
 		));
 		
 		 print_r($reponse);
 		?>
 	<br>
 	<?php
 	$reponse = $user->insert( array(
 			"Username" => $username3,
 			"Password"  => $password3
 		));	
 	
 	 print_r($reponse);
 	 ?>
 	<br>
 	<?php
 	echo "Insert done"; ?><br>
 	<?php
 	
 	//Checking for username & pass
 	
 	 $pass = array('Username' => "user2", 'Password' => "pass2");
 	 $fail = array('Username' => "user1", 'Password' => "pass3");
 	
 	$cursor = $user->findone($pass);
 	echo "Result of pass query";
 	?>
 	<br>
 	<?php
 	var_dump($cursor);
 	if(empty($cursor)) {
 		echo "EMPTYYYYYYYYYYYYYY";
 	}
 	?>
 	<br>
 	<?php
    $cursor = $user->findone($fail);
    
    echo "Result of fail query";
    ?>
 	<br>
 	<?php
    var_dump($cursor);		//prints "NULL"
    ?>
 	<br>
 	<?php
    if(empty($cursor)) {
 		echo "EMPTYYYYYYYYYYYYYY";
 	}
?>
