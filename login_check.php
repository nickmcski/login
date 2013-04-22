<?
include"config.php";
include"mysql_connect.php";

$un= $_GET["username"];
$pw= $_GET["password"];

$query="SELECT * FROM users WHERE username='$un' and password='$pw'";
$result=mysql_query($query);

$count=mysql_num_rows($result);

if($count == 1){
  //makes values for cookies
	$cookie_value_user= $un;
	$cookie_value_key= rand(1, 500);
	//Sets cookies
	setcookie($cookie_name_last, $cookie_value_user, time() + (20 * 365 * 24 * 60 * 60) , "/", "mcmodding.org");
	setcookie($cookie_name_user, $cookie_value_user, time()+18000, "/", "mcmodding.org");
	setcookie($cookie_name_key, $cookie_value_key, time()+18000, "/", "mcmodding.org");

	while ($row= mysql_fetch_array($result)) {

		$permissions= $row["permissions"];
		$banned= $row["BANNED"];
	}

	if($banned == 0){
	  if($permissions == 5){
		  header("location:$lvl_5_home");
	  }else if($permissions == 4){
		  header("location:$lvl_4_home");
	  }else if($permissions == 3){
		  header("location:$lvl_3_home");
	  }else if($permissions == 2){
		  header("location:$lvl_2_home");
	  }else if($permissions == 1){
		  header("location:$lvl_1_home");
	  }else{
		  header("location:$error");
	  }
	}else{
		header("location:$banned_home");
	}


	//Add MySQL Set Key
	$setkeyquery = "UPDATE  `users` SET  `key` =  '$cookie_value_key' WHERE  `username` ='$un' LIMIT 1 ";
	mysql_query($setkeyquery) or die( "Error! Could not update key: " . mysql_error() );
	
}else{
	header("location:$failed_login_page?username=$un");
}
