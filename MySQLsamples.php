<html>
 <head>
  <style>
    table {font-family:Arial; font-size:14px; border-collapse: collapse; border:solid 2px #000000;}
    th, td {color:#0000ff; border:solid 1px #0000ff;}
  </style>
  <meta HTTP-EQUIV="Content-Type" Content="text/html; charset=Windows-1252">
  <title>PHP Test</title>
 </head>
 <body>
 <?php echo '<p>Hello MySQL on PHP</p>'; ?> 
 <hr size="1" color='#0080ff'>
 <?php
	function println($txt)
	{
		print($txt);
	}

	$mysqli = new mysqli("localhost", "Michael", "Admin", "world");
	if (mysqli_connect_errno())
	{
		printf("Connect failed: %s<br/>", mysqli_connect_error());
		exit();
	}
	else
	{
		printf("Host information: %s<br><br>", mysqli_get_host_info($mysqli));
		
		$sql = "SELECT * FROM country";
		$res = mysqli_query($mysqli, $sql);
		if ($res)
		{
			$number_of_rows = mysqli_num_rows($res);
			printf("Result set of table 'country' in 'world' has %d rows.<br/><br/>", $number_of_rows);
			$sql = "SELECT Country.Code, Country.Name AS Namec, City.Name AS Capitalcity, Country.Region FROM Country INNER JOIN City ON Country.Capital = City.ID ORDER BY Country.Region";
			$res = mysqli_query($mysqli, $sql);
			if ($res) {
				println("<table><tr><th>Code</th><th>Country</th><th>Capital</th><th>Region</th></tr>");
				while ($fld = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
					println("<tr><td>".$fld['Code']."</td><td>".$fld['Namec']."</td><td>".$fld['Capitalcity']."</td><td>".$fld['Region']."</td></tr>");
				}
				println("</table");
			}
			else {
				println("*** Did not retrieve any records!<br>".mysqli_error($mysqli));
			}
			mysqli_free_result($res);
		}
		else
		{
			printf("Could not retrieve records: %s<br/>", mysqli_error($mysqli));
		}
		
		mysqli_close($mysqli);
	}	

 ?>

</body>
</html>
