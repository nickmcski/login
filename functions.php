<?
//Get config values
include"config.php";

//This functions is designed to return userpermission group insted of number
function group($permission_lvl){
  //get all names
  global $lvl_1_name, $lvl_2_name, $lvl_3_name, $lvl_4_name, $lvl_5_name;
		if($permission_lvl == 1){
			return($lvl_1_name);
		}
		if($permission_lvl == 2){
			return($lvl_2_name);
		}		
		if($permission_lvl == 3){
			return($lvl_3_name);
		}
		if($permission_lvl == 4){
			return($lvl_4_name);
		}
		if($permission_lvl == 5){
			return($lvl_5_name);
		}
}
//this is designed to condence code and provide a standerd across all pages
function head($favicopath, $csspath)
{
echo "<meta name=\"description\" content=\"mcmodding.org offical website\">";
echo "<meta name=\"keywords\" content=\"PHP,HTML,CSS,LOGIN,Login,mcmodding,mcmodding.org,script,secure,\">";
echo "<meta name=\"author\" content=\"Nicholas McCurry\">";
echo "<link type='test/css' rel='stylesheet' href='$csspath/common.css' />\n";
echo "<link type='test/css' rel='stylesheet' href='$csspath/navbar.css' />\n";
echo "<link type='image/png' rel='icon' href='$favicopath/favico.png' />\n";
}
//used in a loop in live.php , will return the stream bassed on what ideration its on
function streamname($x, $stream1, $stream2, $stream3){
	if($x == '1'){
		return($stream1);
	}
	if($x == '2'){
		return($stream2);
	}
	if($x == '3'){
		return($stream3);
	}
}
//See if username is registerd
function checkusername($username){
	$sql="SELECT * FROM users WHERE username='$username'";
	$result = mysql_query($sql);
	$users_returned = mysql_num_rows($result);
	
	if($users_returned > 0 OR $username == ''){
		return(TRUE);
	}else{ 
		return(FALSE); 
	}
}
//Check refrence key
function refkey($ref_key){
	$sql = "SELECT * FROM `keys` WHERE `name` = '$ref_key' LIMIT 0, 30 ";
	$results = mysql_query($sql) or die("Could not look for key");
	$found = mysql_num_rows($results);
	$row=mysql_fetch_array($results);
	
	$uses = $row['uses'];
	$permission_lvl = $row['permission_group'];
	
	if($found == 1){
		if($uses >= 1){
			$uses--;
			$sql = "UPDATE `mcmoddin_common`.`keys` SET `uses` = '$uses' WHERE `keys`.`name` = '$ref_key'";
			$result = mysql_query($sql)or die("Could not update uses");
			return($permission_lvl);
		}
	}else{
		return;
	}
}
//Return twitch.tv video embed
function video($stream, $videoheight, $width){
	echo"<object type='application/x-shockwave-flash' height='$videoheight' width='$width' id='live_embed_player_flash' data='http://www.twitch.tv/widgets/live_embed_player.swf?channel=$stream' bgcolor='#000000'>
			<param name='allowFullScreen' value='true' />
			<param name='allowScriptAccess' value='always' />
			<param name='allowNetworking' value='all' />
			<param name='movie' value='http://www.twitch.tv/widgets/live_embed_player.swf' />
			<param name='flashvars' value='hostname=www.twitch.tv&channel=$stream&auto_play=true&start_volume=25' /></object>";
}
//return logo
function logo($path){
	echo"
	<div id='logo'>
	<a href='http://test.mcmodding.org'>
	<img src='" . $path . "logo.png' width='200' alt='Logo'>
	</a>
	</div>";
}
//used to generate items on index.php
function content($title, $body){
	echo"<div id='Header'>" . $title . "</div><div id='Header_under'></div>\n<div align='left' id='content' style='height:auto'>" . $body . "</div><div id='content_under'></div>\n";
}
?>
