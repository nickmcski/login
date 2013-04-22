<?
  include"config.php";
	setcookie($cookie_name_user, $cookie_value_user, time()-18000, "/", "mcmodding.org");
	setcookie($cookie_name_key, $cookie_value_key, time()-18000, "/", "mcmodding.org");
	include"auth.php";

	include"navbar.php";
?>
<html>
<head>
<link type="test/css" rel="stylesheet" href="../css/common.css" />
<link type="text/css" rel="stylesheet" href="../css/navbar.css" />
<link type="image/png" rel="icon" href="../../favico.png" />

</head>
<body>
<center>
<font size="7">
<p>You have been logged out</p>
</font>
</center>

</body>
</html>
