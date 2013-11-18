<font face="verdana,arial" size=-1>
<center><table cellpadding='2' cellspacing='0' border='0' id='ap_table'>
<tr><td bgcolor="blue"><table cellpadding='0' cellspacing='0' border='0' width='100%'><tr><td bgcolor="blue" align=center style="padding:2;padding-bottom:4"><b><font size=-1 color="white" face="verdana,arial"><b>Logger Access</b><br><b>Enter your Username and Password</b></font></th></tr>
<tr><td bgcolor="white" style="padding:5"><br>
<form method="post" name="login">
<html>
<input type="hidden" name="action" value="login">
<input type="hidden" name="hide" value="">
<center><table>
<tr><td><font face="verdana,arial" size=-1>Username:</font></td><td><input type="text" name="login"></td></tr>
<tr><td><font face="verdana,arial" size=-1>Password:</font></td><td><input type="password" name="password"></td></tr>
<tr><td><font face="verdana,arial" size=-1>&nbsp;</font></td><td><font face="verdana,arial" size=-1><input type="button" onclick="check(this.form)" value="Login"></font></td></tr>
<tr><td colspan=2><font face="verdana,arial" size=-1>&nbsp;</font></td></tr>

</table></center>
</form>
<script language="javascript">
function check(form)/*function to check userid & password*/
{
/*the following code checkes whether the entered userid and password are matching*/
if(form.login.value == "user" && form.password.value == "pass")
{
window.open('index.php')/*opens the target page while Id & password matches*/
}
else
{
alert("Error Password or Username")/*displays error message*/
}
}
</script>
</td></tr></table></td></tr></table>
</html>