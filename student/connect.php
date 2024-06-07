<?php 
//database// 
$db_host = 'mariadb';
$db_user = 'root';
$db_pass = 'mysql';
$db_database = 'studentenadmin';

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
