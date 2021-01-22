<!DOCTYPE html>
  <html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>A form response to insert or update a record</title>
  </head>
  <body>
  <?php
    $submit = $_POST['submit'];
    $insval = isset($_POST['insValue']) ? $_POST['insValue'] : '&lt;null&gt;';
    $updval = isset($_POST['updValue']) ? $_POST['updValue'] : '&lt;null&gt;';
    $recid = isset($_POST['recId']) ? $_POST['recId'] : '&lt;null&gt;';
  ?>
  <p>submit = <strong><?php echo $submit ?></strong></p>
  <p>insValue = <strong><?php echo $insval ?></strong></p>
  <p>updValue = <strong><?php echo $updval ?></strong></p>
  <p>recId = <strong><?php echo $recid ?></strong></p>
  <?php 
$mysqli = new mysqli("localhost", "Michael", "Admin", "testfr");
if (mysqli_connect_errno())
{
	printf("Connect failed: %s<br/>", mysqli_connect_error());
	//exit();
}
else
{
    if( $submit == "insert" && !empty($insval))
    {
		$sql = "INSERT INTO frtable (frfield) VALUES ('" . $insval . "')";
    }
    elseif ( $submit == "update" && !empty($updval) && is_numeric($recid))
    {
    	$sql = "UPDATE frtable SET frfield = '" . $updval . "' WHERE id = " . $recid;
    }
    else
    {
    	$sql = "";
    }
    
    if ($sql > " ")
    {
    	$res = mysqli_query($mysqli, $sql);
    	if ($res === TRUE) {
    		echo "A record has been " . ($submit == "insert" ? "inserted." : "updated.");
    	} else {
    		printf("Could not insert record: %s\n", mysqli_error($mysqli));
    	}
    }
    mysqli_close($mysqli);
    //redirect back to testfr.php to display content of its table
    header("Location: testfr.php");
    exit;
}
?>
  </body>
</html>
