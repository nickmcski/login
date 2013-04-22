<html>
<head>
<link type="text/css" rel="stylesheet" href="../css/common.css" />
</head>
<body>
<center>
<p style="font-size: 30px; color: rgb(255,255,255)">Login failed!</p>
<?
include "auth.php";
echo "You do not have the correct password</br>";
if($restricted_account == 0){
  echo "You can reset your password <a href='reset.php'>here</a></br>";
}else{
	echo "This is restricted account, you need to contact <a href='mailto:admin@mcmodding.org'>admin@mcodding.org</a> to reset your password</br>";
}
$x = 0;
$space = 20;

while($x < $space){
	echo "<br/>";
	$x++;
}
?>
<h>LOGIN FAILED</h></br>
<p><a href="login.php">Return to login</a></p>


</center>
</body>
</html>
