<?
$req_permission = 5;
include"auth.php";
include"functions.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit User</title>
<?
head("../..", "../css");
?>
</head>

<body>
<?


$id = $_GET['id'];
$user_query = "SELECT * FROM `users` WHERE `id` = $id LIMIT 0, 30 ";
$user_info = mysql_query($user_query);
$returned = mysql_num_rows($user_info);

if($returned == 1){
  while( $row = mysql_fetch_array($user_info)){
		$que_user = $row['username'];
		$que_firstname = $row['firstname'];
		$que_lastname = $row['lastname'];
		$que_email = $row['email'];
		$que_permissions = $row['permissions'];
		$que_banned = $row['BANNED'];
	}
	
	?>
	<form name="edituser" action="save_user.php"  id="edituser" method="get">
	<center>
	<table align="center" class="edit_user" width="500">
		<tr>
			<td colspan="2">Eding user <? echo "$que_user"; ?></td>
		</tr>
		<tr bgcolor="#FF5900">
			<th>Username</th>
			<th><input type="text" name="username" width="200" value="<? echo "$que_user";?>" /></th>
		</tr>
		<tr bgcolor="#FF0000">
			<td>First name</td>
			<td><input type="text" name="firstname" width="200" value="<? echo $que_firstname; ?>" /></td>
		</tr>
		<tr bgcolor="#FF5900">
			<td>Last name</td>
			<td><input type="text" name="lastname" width="200" value="<? echo $que_lastname; ?>" /></td>	
		</tr>
		<tr bgcolor="#FF0000">
			<td>Email</td>
			<td><input type="text" name="email" width="200" value="<? echo $que_email; ?>" /></td>	
		</tr>
		<tr bgcolor="#FF5900">
			<td>permissions</td>
			<td><input type="text" name="permissions" width="200" value="<? echo $que_permissions; ?>" /></td>
		</tr>
		<tr bgcolor="#FF0000">
			<td>Banned</td>
			<td><input type="checkbox" name="banned" value="1" <? if($que_banned == 1){ echo " checked"; } ?> />	</td>
		</tr>
		<tr bgcolor="#FF5900">
			<td colspan="2"><input type="submit" name="submit" value="Edit User" />
			<input type="hidden" name="id" value="<? echo $id; ?>" /></td>
		</tr>
		</table>
		</center>
		</form>
	<?
}else{
	echo "User with id of $id is not found";
}

?>
</body>
</html>
