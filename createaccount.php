<?
//includes
include"auth.php";
include"functions.php";
//Get values
$username = $_GET['username'];
$password = $_GET['password'];
$bad_user = $_GET['bad_user'];
$bad_pass = $_GET['bad_pass'];
$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];
$mc_name = $_GET['mc_name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Create account</title>
<?
head("../..", "../css");
?>
</head>

<body>

<?
if($bad_pass == 1){
  echo "Bad password";
}else if($bad_user == 1){
	echo "Bad Username";
}
?>

<form action="create_account_save.php" name="form" id="form" method="get">
<table width="60" class="caccount" align="center">
<tr>
<td colspan="2">Create Account</td></tr>
    <tr>
	<td>Username</td>
	<td><input type="text" name="username" width="50" value="<? echo $username; ?>"/></td>
    </tr>
    <tr>
    	<td>password</td>
        <td><input type="text" name="password" width="50" /></td>
    </tr>
    <tr>
    	<td>email</td>
        <td><input type="test" name="email" width="50" value="<? echo $email; ?>"/></td>
    </tr>    
    <tr>
    	<td>first name</td>
        <td><input type="test" name="first_name" width="50" value="<? echo $first_name; ?>"/></td>
    </tr>    
    <tr>
    	<td>last name</td>
        <td><input type="test" name="last_name" width="50" value="<? echo $last_name; ?>"/></td>
    </tr>    
    <tr>
    	<td>Minecraft username</td>
        <td><input type="test" name="mc_name" width="50" value="<? echo $mc_name; ?>"/></td>
    </tr>
	<tr>
		<td>Refrence Key</td>
		<td><input type="text" name="ref_key" width="20" /></td>
	</tr>
    <tr>
    	<td colspan="2"><input type="submit" name="submit" value="Create account" /></td>
    </tr>

</table>
</form>
<p align="center">Note passwords are not encripted</p>
<p align="center">Already have an account?     <a href="login.php">Return to login</a></p>

</body>
</html>
