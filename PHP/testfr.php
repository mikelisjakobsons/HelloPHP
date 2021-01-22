<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php
$mysqli = new mysqli("localhost", "Michael", "Admin", "testfr");
if (mysqli_connect_errno())
{
	printf("Connect failed: %s<br/>", mysqli_connect_error());
	exit();
}
else
{
	printf("Host information: %s<br><br>", mysqli_get_host_info($mysqli));

	$sql = "SELECT * FROM frtable";
	$res = mysqli_query($mysqli, $sql);
	if ($res)
	{
		$number_of_rows = mysqli_num_rows($res);
		printf("Result set of table 'frtable' in database 'testfr' has %d rows.<br/><br/>", $number_of_rows);
		$sql = "SELECT id, frfield FROM frtable ORDER BY id";
		$res = mysqli_query($mysqli, $sql);
		if ($res) {
			print("<table border=\"2px\"><tr><th>ID</th><th>Fr field</th></tr>");
			while ($fld = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
				print("<tr><td>".$fld['id']."</td><td>".$fld['frfield']."</td></tr>");
			}
			print("</table>");
		}
		else {
			print("*** Did not retrieve any records!<br>".mysqli_error($mysqli));
		}
		mysqli_free_result($res);
		
		print("<br/><br/><b>Insert new record:</b><br/>");
		print("<form method=\"post\" action=\"insert_update_data.php\">");
		print("<p><label for=\"insValue\">Fr. String: </label><input type=\"text\" id=\"insValue\" name=\"insValue\"></p>");
		print("<button type=\"submit\" name=\"submit\" value=\"insert\">Insert Record</button>");
		print("</form>");
		print("<br/><br/><b>Update a record:</b><br/>");
		print("<form method=\"post\" action=\"insert_update_data.php\">");
		print("<p><label for=\"recId\">ID: </label><input type=\"text\" id=\"recId\" name=\"recId\"></p>");
		print("<p><label for=\"updValue\">Fr. String: </label><input type=\"text\" id=\"updValue\" name=\"updValue\"></p>");
		print("<button type=\"submit\" name=\"submit\" value=\"update\">Update Record</button>");
		print("</form>");
	}
	else
	{
		printf("Could not retrieve records: %s<br/>", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}
?>
</body>
				