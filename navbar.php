<center>
<table class="navbar" border="1">
<tr>
<?
$query = "SELECT  * FROM  `secure_navbar` WHERE  `lvl$permissions` =1 ORDER BY  `id` ASC LIMIT 0 , 30";
$results = mysql_query($query);
$returned = mysql_num_rows($results);
while($row=mysql_fetch_array($results)){
  
	$data = $row['data'];
	$url = $row['url'];
	$name = $row['name'];
	$useprefix = $row['useprefix'];
	$percent = 100 / $returned;
	echo "<td width='" . $percent . "%'><a href='";
	if($useprefix == 1){
		echo $prefix;
	}
	echo $url;
	echo "'>";
	echo $name;
	echo "</a></td>";
	}
?>



</tr>
</table>
</center>
