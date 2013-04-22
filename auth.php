<?

include"config.php";
include"mysql_connect.php";

//Required page permissions
$perm = $req_permission;

//Get Cookies
$userCookie = $_COOKIE[$cookie_name_user];
$cookey = $_COOKIE[$cookie_name_key];
$lastUsername = $_COOKIE[$cookie_name_last];


//Query if user has that permission
  $var1 = $perm-1;
	$hasperm ="SELECT * FROM users WHERE username='$userCookie' AND permissions>'$var1'";

//Get the results returned
	$userswith = mysql_query($hasperm);
	$found = mysql_num_rows($userswith);

//Redirect if user does not have permission

if($found != 1 &&$req_permission != ''){
	header("location:login.php");
	exit;

}else{

  //Get User info
  
  if($userCookie != NULL){
  
  	$query = "SELECT * FROM users WHERE `username`='$userCookie'";
	$result = mysql_query($query) or die("Couldn't execute query");
	$count = mysql_num_rows($result);  
	
	if($count == 1){
  
		while ($row= mysql_fetch_array($result)) {
			$permissions= $row["permissions"];
			$first_name= $row["firstname"];
			$last_name= $row["lastname"];
			$mc_name= $row["minecraftname"];
			$key= $row["key"];
			$banned = $row["BANNED"];
		  
		}
		//doubble check they have permission
		if($permissions > $var1){
		//Look if key matches
			if($key != $cookey&&$key != NULL){
		  		header("location:$failed_login_page");
		  		setcookie($cookie_name_user, $cookie_value_user, time()-18000, "/", "mcmodding.org");
				setcookie($cookie_name_key, $cookie_value_key, time()-18000, "/", "mcmodding.org");
		  		exit;
		  	}
		  
			//If user is banned redirect		  
		  	if($banned == 1){
		  		header("location:$banned_home");
		  		exit;
		  	}
		}else{
		  	//User did not have permission to view site
			header("location:login.php");
		}
		  
	  }else{
	  	//No data for the user
		  header("location:login.php");
		  exit;
	  }
	  //print username from cookie
	  $username = $userCookie;

	}elseif($lastUsername != NULL){
	
		$query = "SELECT * FROM users WHERE `username`='$lastUsername'";
		$result = mysql_query($query) or die("Couldn't execute query");
		$count = mysql_num_rows($result);  
		
		if($count == 1){
			while ($row= mysql_fetch_array($result)) {
				$username= $lastUsername;
				$permissions= 0;
				$first_name= $row["firstname"];
				$last_name= $row["lastname"];
				$mc_name= $row["minecraftname"];
				$banned = $row["BANNED"];
			}
			if($banned == 1){
			  	header("location:$banned_home");
			  	exit;
		  	}
		}
	}else{
	//User cookie not found, and page does not require permission to view
	$username = "Guest";
	$permissions = '0';

}
}
?>
