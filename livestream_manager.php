<?
include"auth.php";
include"functions.php";
?>
<html>
<head>
<?
head("../..", "../css");
?>
</head>
<body>

<?
include"navbar.php";
$submit = $_GET['submit'];
if($submit != "Save"){

$sql = "SELECT * FROM `stream` WHERE `id` = 1 LIMIT 0, 30 ";
$results = mysql_query($sql);

while( $row = mysql_fetch_array($results)){
  $streamers =$row['streams'];
	$stream1 = $row['stream1'];
	$stream2 = $row['stream2'];
	$stream3 = $row['stream3'];
}
echo"	
<form name='editstream' action='livestream_manager.php'  id='editstream' method='get'>
	
	<table align='center' class='edit_user' width='500'>
		<tr>
			<td><p>Number of streamers</p></td>
			<td>
				<select form='editstream' name='streamers' autofocus='$streamers'>
					<option value='1'>One stream</option>
		                	<option value='2'>Two streams</option>
        		        	<option value='3'>Three Streams</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><p>Stream one</p></td>
			<td><input type='text' name='stream1' width='200' value='$stream1' /></td>
		</tr>
		<tr>
			<td><p>Stream two</p></td>
			<td><input type='text' name='stream2' width='200' value='$stream2' /></td>
		</tr>
		<tr>
			<td><p>Stream Three</p></td>
			<td><input type='text' name='stream3' width='200' value='$stream3' /></td>
		</tr>
		<tr>
			<td colspan='2'><input type='submit' name='submit' value='Save' /></td>
		</tr>
	</table>
</form>
";

}else{

$streamers = $_GET['streamers'];
$stream1 = $_GET['stream1'];
$stream2 = $_GET['stream2'];
$stream3 = $_GET['stream3'];


$sql = "UPDATE `stream` SET `stream1`='$stream1',`stream2`='$stream2',`stream3`='$stream3',`streams`='$streamers' WHERE 1";
$results = mysql_query($sql);
echo"Saved changes";
}
?>
</body>
</html>
