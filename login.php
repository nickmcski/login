<?
include"auth.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link type="text/css" rel="stylesheet" href="../css/common.css" />
<link type="text/css" rel="stylesheet" href="../css/navbar.css" />
<link type="image/png" rel="icon" href="../../favico.png" />
</head>

<body>

<center>
<p>Login to mcmodding.org</p>
<? include"navbar.php"; ?>

<form id="login" action="login_check.php" name="login" >
<table class="login" width="100%">
<tr><td colspan="2" align="center"><font size="+1">Login</font></td></tr>
  <tr>
    	<td align="center">Username</td>
	<td align="center"><input name="username" type="text" value="<? echo $username;?>"/></td>
    </tr>
    <tr>
    	<td align="center">Password</td>
        <td align="center"><input name="password" type="password" /></td>
    </tr>    
    <tr>
    	<td colspan="2" align="center"><input type="submit" name="submit" value="Login"/></td>
    </tr>
    <tr>
    	<td colspan="2" align="center"><a href="createaccount.php">Create account</a></td>
    </tr>


</table>
</form>
</center>
</body>
</html>
