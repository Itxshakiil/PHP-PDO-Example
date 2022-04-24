<?php
require_once 'connect.php';

$id = $_GET['id'];
$SQLQuery = "DELETE  FROM people WHERE ID=:id";
$statement = $connection->prepare($SQLQuery);

if ($statement->execute([':id' => $id])) {
    header('location:index.php');
}
