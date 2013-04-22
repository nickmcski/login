<?
$req_permission = '';
include"auth.php";
include"functions.php";
?>
<html>
<head>
<link type="text/css" href="../css/table.css" rel="Stylesheet" />
<link type="test/css" href="../css/common.css" rel="stylesheet" />
<link type="test/css" href="../css/navbar.css" rel="stylesheet" />
</head>
<body>
<?
include"navbar.php";
$width = '620';
$videoheight = '378';
$chatheight = '500';
?>
<br/>
<br/>
<center>
<?
include"mysql_connect.php";
$query = "SELECT * FROM stream WHERE `id`='1'"; 
$result = mysql_query($query) or die("Couldn't execute query");

while ($row= mysql_fetch_array($result)) {
  	$streamers= $row["streams"];
		$stream1= $row["stream1"];
		$stream2= $row["stream2"];
		$stream3= $row["stream3"];
		$x = '1';
		
		$tablewidth = $streamers * $width;
		
		echo "<table id='stream' class='nicetable' width='$tablewidth'>";
		echo "<tr class='header'>";
		//////////////////Streamer Name//////////////////
		while($x <= $streamers){
			$name = streamname($x, $stream1, $stream2, $stream3);
			echo"<th>$name</th>";
			$x++;
		}
		
		echo "</tr><tr class='banrow'>";
		$x = '1';
		//////////////////Video//////////////////
		while($x <= $streamers){
			$name = streamname($x, $stream1, $stream2, $stream3);
			//start Stream row
			
			echo "<td> \n";
			video($name,$videoheight,$width);
			echo "</td> \n";
		$x++;
		}
		echo "</tr> \n <tr class='banrow'> \n";
		$x = '1';
		//////////////////Chat//////////////////
		while($x <= $streamers){
			$name = streamname($x, $stream1, $stream2, $stream3);
			//start Chat row
			echo"<td><center>";
			echo"<iframe frameborder='0' scrolling='no' id='chat_embed' src='http://twitch.tv/chat/embed?channel=$name&popout_chat=true' height='$chatheight' width='$width'></iframe>";
			echo"</center></td>";
			$x++;
		}
		echo "</tr>";

}



?>


</tr>
</table>
<br />


</center>
</body>
</html>
