<?
$req_permission = 5;
include"auth.php";
include"config.php";
include"functions.php";
?>
<html>
<head>
<?
head("../..", "../css");
?>
<title>User Management</title>
</head>
<body>

<?
echo "<p>Welcome $first_name $last_name</p>";
?>
<center>
<p>Users</p>
</center>
<?
include "navbar.php";
?>
<br/>
<table class="user_management" align="center">
  <!--headers-->
	<tr bgcolor="#009999">
    	<th width="250px">Username</th>
        <th width="250px">First Name</th>
        <th width="250ps">Last Name</th>
        <th width="250px">Email</th>
        <th width="150px">Permissions</th>
        <th width="100px">Banned</th>
        <th width="100px">Edit</th>
    </tr>
    <?
	//Query database
	$query_user_mg = "SELECT * FROM `users` LIMIT 0, 100 ";
	$results = mysql_query($query_user_mg);
	$row_count = 0;
	//alternating colors
	$row_color1 = "#FF5900";
	$row_color2 = "#FF0000";
	while($row= mysql_fetch_array($results)){
		//Switches color
		if($row_count % 2 == 0){
			$row_color = $row_color1;
		}else{
			$row_color = $row_color2;
		}
		
		$que_id = $row['id'];
		$que_user = $row['username'];
		$que_firstname = $row['firstname'];
		$que_lastname = $row['lastname'];
		$que_email = $row['email'];
		$que_permissions = $row['permissions'];
		$que_banned = $row['BANNED'];
		$group = group($que_permissions);
		echo"
		<tr bgcolor='$row_color'>
			<td> $que_user</td>
			<td> $que_firstname</td>
            		<td> $que_lastname</td>
            		<td> $que_email</td>
           		<td>" . group($que_permissions) . "</td>
            <td>";
            if($que_banned == 1){
            	echo "Banned</td>";
            }else{
            	echo "</td>";
            }
        echo "
			<td><a href='edit_user.php?id=$que_id'>Edit</a></td>
		</tr>";
		$row_count++;
	}
?>
</table>
</body>
</html> 
