<html>
<style type="text/css">
body,td,th {
	color: #F00;
}
</style>

<head>
<title>logout</title>
<LINK href="images/site.css" type=text/css rel=stylesheet>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" valign="top">
 <tr>
  <td valign="top">

<table width="100%" height="597" border="0" cellpadding="0" cellspacing="0">
 <tr>
  <td colspan="6" bgcolor="#FDFDFD" align="right"><div align="left"><img src="images/top_bg.gif" width="800" height="66"></div></td>
 </tr>
 <tr>
  <td width="800" height="1" colspan="6" bgcolor="#FFFFFF"><img src="images/spacer.gif" width="800" height="1"></td>
 </tr>
 <tr>
  <td width="99%" height="25" bgcolor="#515551"><img src="images/spacer.gif" width="180" height="25"></td>
  <td><a href="index.html" align="right"><img src="images/home.jpg" width="124" height="25" border="0"></a></td>
  <td><a href="static date.php" align="right"><img src="images/static date.jpg" width="124" height="25" border="0"></a></td>
  <td><a href="dynamic date.php" align="right">
  <img src="images/dynamic data.jpg" width="124" height="25" border="0"></a></td>
  <td><a href="logout.php" align="right"><img src="images/logout.jpg" width="124" height="25" border="0"></a></td>
  <td><a href="login_form.php" align="right"><img src="images/login.jpg" width="124" height="25" border="0"></a></td>
 </tr>
 <tr>
  <td width="180" height="3" bgcolor="#515551"><img src="images/spacer.gif" width="180" height="3"></td>
  <td width="124" height="3" bgcolor="#A6A6A6"><img src="images/spacer.gif" width="124" height="3"></td>
  <td width="124" height="3" bgcolor="#A6A6A6"><img src="images/spacer.gif" width="124" height="3"></td>
  <td width="124" height="3" bgcolor="#A6A6A6"><img src="images/spacer.gif" width="124" height="3"></td>
  <td width="124" height="3" bgcolor="#FF0000"><img src="images/spacer.gif" width="124" height="3"></td>
  <td width="124" height="3" bgcolor="#A6A6A6"><img src="images/spacer.gif" width="124" height="3"></td>
 </tr>
 <tr>
  <td height="373" valign="top" align="left" background="images/left_bg1.jpg">


<table width="100%" height="100%" border="0" cellpadding="20" cellspacing="0" valign="top">
 <tr>
  <td valign="top">
   <?php

// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();

// Unset all of the session variables.
$_SESSION = array();
$_POST = array();
//$_SESSION['session'] = "FALSE";
//echo($_POST['session']);

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
/*
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
*/
// Finally, destroy the session.
//session_destroy();

if( !isset($_SESSION['myusername']) )

{
	//print_r($_SESSION['session']);
?>
<div align="center">
  <p><strong>You Have Logged out Successfully!</strong></p>
</div>
<?php
}
?>
   
   </td>
 </tr>
</table>
  </td>
  <td bgcolor="#FFFFFF" align="right"><img src="images/rounded_gr_center.jpg" width="124" height="373"></td>
  <td colspan="2" align="right"><img src="images/gerbera.jpg" width="248" height="373"></td>
  <td colspan="2" align="right"><img src="images/gerbera2.jpg" width="248" height="373"></td>
 </tr>
 <tr>
  <td width="800" height="3" colspan="6" bgcolor="#515551"><img src="images/spacer.gif" width="800" height="3"></td>
 </tr>
 <tr>
  <td width="800" height="1" colspan="6" bgcolor="#FFFFFF"><img src="images/spacer.gif" width="800" height="1"></td>
 </tr>
 <tr>
  <td width="800" height="8" colspan="6" bgcolor="#A6A6A6"><img src="images/spacer.gif" width="800" height="8"></td>
 </tr>
 <tr>
  <td colspan="6" bgcolor="#FDFDFD" align="right"><img src="images/address.jpg" width="800" height="68"></td>
 </tr>
 <tr>
  <td width="180" height="49" bgcolor="#FFFFFF" align="right">
  <img src="images/spacer.gif" width="180" height="49"></td>
  <td colspan="5" align="right"><img src="images/rounded_gr_bottom.jpg" width="620" height="49"></td>
 </tr>
</table>

</td>
 </tr>
</table>


</body>
</html>

