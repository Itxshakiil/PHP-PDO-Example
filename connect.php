<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "people";
$options = [];

$dsn = "mysql:host=$host;dbname=$dbname";
try {
    $connection = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo 'Connection Failed: '.$e->getMessage();
}
