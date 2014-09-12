<html>
<style type="text/css">
body,td,th {
	color: #F00;
	font-size: 24px;
}
body {
	background-color: #FFF;
}
</style>
<body>

<img src="images/top_bg.gif" alt="logo strip" width="800" height="66" />
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<?php
/* I took these from a reference site, might make it easier for you to integrate into mongo
$host="localhost"; // Host name 
$username=""; // Mysql username 
$password=""; // Mysql password 
$db_name="test"; // Database name 
$tbl_name="members"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
*/
// username and password sent from form 
include('mongo.php');
$db = $m->userdb;
$db = $m->userdb;
$user = $db->users;

$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword'];
?><br><?php //echo($mypassword);
$mypassword = crypt($mypassword, '$altie$Are8Ing');
?><br><?php //echo($mypassword);
$insert = array($myusername, $mypassword);
$cursor = $user->findone($insert);
if(empty($cursor)) {
	//FAIL
	//echo "Fail";						
}
else {
	//PASS
	//echo "Pass";
}
$testuser = 'user1';
$testpass = crypt('pass1', '$altie$Are8Ing');
?><br><br><?php
//echo($testpass);
/* 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
*/ 
?> <br><br><br><?php
if($myusername == $testuser)
{
	if($mypassword == $testpass) 
	{
		
		session_start();
		$_SESSION['myusername'] = $testuser;
		$_SESSION['mypassword'] = $testpass;
		$_SESSION['session'] = "TRUE";
		//session_register("myusername");
		//session_register("mypassword"); 
		header("location:index.html");
		die();
	}
	else 
	{
		
		?><div align="center">
    <table width="547" height="89" border="0" cellpadding="0">
      <tr>
        <td width="222" height="56">&nbsp;</td>
        <td width="309" align="center" bgcolor="#FFFFFF"><strong>Wrong Password!</strong></td>
      </tr>
    </table>
</div>
<form method = "LINK" Action="/mongo/web_site/login_form.php">
	<input name="return" type="submit" value="Return">
</form>
<?php //header("location:login_form.php");


	}

}

// Register $myusername, $mypassword and redirect to file "login_success.php"
//session_register("myusername");
//session_register("mypassword"); 


else 
{
	//echo("Wrong Username or Password");
	?>
  <div align="center">
    <table width="617" border="0" cellpadding="0">
      <tr>
        <td width="226" height="56">&nbsp;</td>
        <td width="385" align="center" bgcolor="#FFFFFF"><strong>Wrong Username or Password!</strong></td>
      </tr>
    </table>
</div>
<form method = "LINK" Action="/mongo/web_site/login_form.php">
	<input name="return" type="submit" value="Return">
</form>

<tr>
  <?php

	//header("location:login_form.php");
}
?>
</body>
</html>