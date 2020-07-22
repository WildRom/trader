<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'trader';

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
} catch (PDOException $e) {
    echo "No connect to DB ..." . $e->getMessage() . "<br/>";
    die();
}