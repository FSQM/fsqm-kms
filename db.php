<?php

$servername='localhost';
$username = 'root';
$passwords = '';
$dbname = 'db_map';

$connection = new mysqli($servername,$username,$passwords,$dbname);

if($connection->connect_error){

	die('no connection');
}
else{

}
?>
