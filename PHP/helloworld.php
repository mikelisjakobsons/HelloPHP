<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
    <p>This page uses PHP.<br/>
    To run PHP with MySQL:
    <ul>
        <li>Configure php.ini in directory 'c:\php7' with open_basedir = &quot;c:\inetpub\wwwroot;c:\Users\Michael\Eclipse_workspace\PHP&quot;</li>
        <li>Run MySQL server by executing 'MySQL Workbench' on 'Run Server', then 'MySQL 5.7 Command Line Client' with pw='root'</li>
    </ul>
    <?php
    $s = 'Hello World from Eclipse!<br/>';
    print($s);
    ?>
    <a href='MySQLsamples.php'>MySQL world sample</a><br/>
    <br/>
    <a href='testfr.php'>Test database with French accents sample</a>
</body>
