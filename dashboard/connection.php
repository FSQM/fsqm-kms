

<?php
// Microsoft SQL Server using the SQL Native Client 10.0 ODBC Driver - allows connection to SQL 7, 2000, 2005 and 2008

$server="10.3.202.142";
$database="FSQM";
$user="sa";
$password="m@skirovka1";

$connection = odbc_connect("Driver={SQL Server Native Client 06.01.7601};Server=$server;Database=$database;", $user, $password);


?>

