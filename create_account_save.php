<?
include"config.php";
include"mysql_connect.php";
include"functions.php";
//Get Variables from other page
$username = $_GET['username'];
$password = $_GET['password'];
$email = $_GET['email'];
$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];
$mc_name = $_GET['mc_name'];
$ref_key = $_GET['ref_key'];
//check username
if(checkusername($username)){
  $bad_user = 1;
}else{
	$bad_user = 0;
}
//check password

if($password == ''){
	$bad_pass = 1;
}else{
	$bad_pass = 0;
}

$ref_name_good = refkey($ref_key);
if(gettype($ref_name_good) == string){
	$permission = $ref_name_good;
}else{
	$message = "Invalid Refrence key";
	$permission = $default_permission;
}
	


if($bad_pass == 1|| $bad_user == 1){
	header("location:createaccount.php?username=$username&email=$email&bad_user=$bad_user&bad_pass=$bad_pass");
}else{
$query = "INSERT INTO `users` (
`username`,
`password`,
`lastname`,
`firstname`,
`email`,
`permissions`,
`minecraftname`)
VALUES
(
'$username',
'$password',
'$last_name',
'$first_name',
'$email',
'$permission',
'$mc_name')"; 

$results = mysql_query($query);



$sucess = 1;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../css/common.css" />
<link type="image/png" rel="shortcut icon" href="../../favico.png" />
<title>Create account</title>
</head>

<body>
<p>Sucuessfully created an account!</p>
<?
if($permission !=1){
	echo"You have lvl $permission permissions";
}
?>
<br />
<a href="login.php">Return to login</a>

</body>
</html>
