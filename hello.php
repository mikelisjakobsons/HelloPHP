<html>
 <head>
  <style>
  TD {color:#008000;}
  </style>
  <meta HTTP-EQUIV="Content-Type" Content="text/html; charset=Windows-1252">
  <title>PHP Test</title>
 </head>
 <body>
<?php echo '<p>Hello World</p>'; ?> 
<p style="font-size:12px;">
  MySQL resides in directory &quot; C:\Program Files\MySQL\MySQL Server 5.7\bin &quot;<br>
  <br>
  <b>To start and stop MySQL Server:</b><br/>
  Open Command Prompt as ADMINISTRATOR; otherwise get system error 5 - access denied.<br/>
  To Start MySQL Server, prompt is:<br/>
  &nbsp; &nbsp; &nbsp; net start MYSQL57<br/>
  To stop MySQL Server, prompt is:<br/>
  &nbsp; &nbsp; &nbsp; net stop MYSQL57<br/>
  When PHP program calls mysqli(...) while MYSQL57 is NOT running, then the error message appears as follows:<br/>
  &nbsp; &nbsp; &nbsp; PHP Warning:  mysqli::__construct(): (HY000/2002): No connection could be made because the target machine actively refused it.<br/>
</p>
<a href='MySQLsamples.php'><u>MySQL samples on PHP</u></a><br/>
<br/>
<a href='PHP/helloworld.php'><u>Test virtual directory</u></a><br/>
<br/>
<span style='font-size:9pt;'>Note: For each new PHP project being created, one must<br/>
 &nbsp; &nbsp; 1. Make a new virtual directory in IIS Manager, and grant permission to 'IUSR';<br/>
 &nbsp; &nbsp; 2. Modify c:\php7\php.ini at 'open_basedir =' settings.</span><br/>
<br/>
<hr size=1 width='100%' color='#0080ff'>
 <?php
		echo "<h2>PHP runs first!</h2>";
		echo "<br>";
		echo "<b>*** Testing PHP scripts in own PHP file...</b>";
 ?>
 <br/>
 
<?php
	echo "<br>";
	echo "PHP_SELF: ";
	echo $_SERVER['PHP_SELF'];
	echo "<br>";
	echo "SERVER_NAME: ";
	echo $_SERVER['SERVER_NAME'];
	echo "<br>";
	echo "HTTP_HOST: ";
	echo $_SERVER['HTTP_HOST'];
	echo "<br>";
	echo "HTTP_REFERER: ";
	echo $_SERVER['HTTP_REFERER'];
	echo "<br>";
	echo "HTTP_USER_AGENT: ";
	echo $_SERVER['HTTP_USER_AGENT'];
	echo "<br>";
	echo "SCRIPT_NAME: ";
	echo $_SERVER['SCRIPT_NAME'];
	echo "<br>";
	
	session_start();
	$counter = isset($_SESSION['counter']) ? $_SESSION['counter'] : 0;
	$counter++;
	print "You have visited this page $counter times during this 	session";
	$_SESSION['counter'] = $counter;

      phpinfo();

	//echo "<br><table cellpadding=5 cellspacing=0 border=1 style=\"font-family:Arial;\"> \n";
	//for ($y=1; $y<=16; $y++) {
	//	echo "<tr> \n";
	//	for ($x=1; $x<=16; $x++) {
	//		echo "<td>".pow($y,$x)."</td> \n";
	//	}
	//	echo "</tr> \n";
	//}
	//echo "</table>";
?>
 </body>
</html>