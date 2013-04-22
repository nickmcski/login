<?
$req_permission = 5;
include"auth.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link type="text/css" rel="stylesheet" href="../css/common.css" />
</head>
<body>
<?
include"mysql_connect.php";

$mod_username = $_GET['username'];
$mod_firstname = $_GET['firstname'];
$mod_lastname = $_GET['lastname'];
$mod_email = $_GET['email'];
$mod_permissions = $_GET['permissions'];
$mod_banned = $_GET['banned'];
$id = $_GET['id'];
echo $mod_banned;
if($mod_banned == ''){
  $mod_banned = 0;
}

$sql = "UPDATE `mcmoddin_common`.`users` SET `username` = '$mod_username', `firstname` = '$mod_firstname', `lastname` = '$mod_lastname', `email` = '$mod_email', `permissions` = '$mod_permissions', `BANNED` = '$mod_banned' WHERE `users`.`id` = $id;";


$results = mysql_query($sql) or die( "Error! Could not modify user: " . mysql_error() . "Debuging info $sql");
?>

<p> Edited sucuessfully!</p>
<p><a href="user_management.php">Manage users</a></p>
</body>
</html>
