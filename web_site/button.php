

 <?php 
 $m = new Mongo();
   $db = $m->userdb;
  $db->drop();  //********COMMENT THIS OUT FOR REAL CODE, THIS IS JUST TO CLEAN UP FROM SANDBOX TESTING
   $db = $m->userdb;
   $user = $db->users;
   ///////////////////////////////////////////////
   
   //Inserting users into database
   $username1 = "user1";
   $password1 = crypt('pass1', '$altie$Are8Ing');  //Change password into encrypted password
   
   $username2 = "user2";
   $password2 = crypt('pass2', '$altie$Are8Ing');
   
   $username3 = "user3";
   $password3 = crypt('pass2', '$altie$Are8Ing');
   
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

 	