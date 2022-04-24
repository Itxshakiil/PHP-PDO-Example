<?php
require_once 'connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM people WHERE ID=:id LIMIT 1";
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id]);
$person = $statement->fetch(PDO::FETCH_OBJ);

if (isset($_POST['name'], $_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = 'UPDATE people SET name=:name ,email=:email WHERE id=:id';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':name' => $name, ':email' => $email, ':id' => $id])) {
        header('location:index.php');
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit person</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="container mx-auto py-8">
    <div class="bg-gray-100 shadow-md rounded w-full max-w-lg mx-auto">
        <div class="flex justify-between items-center px-4 py-2 border-b border-gray-300">
            <h2 class="text-2xl font-semibold">Edit person</h2>
            <a href="index.php"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full uppercase text-xs">All
                people</a>
        </div>
        <div class="w-full text-left table-auto bg-white rounded shadow-md">
            <form action="" method="post"
                  class="w-full max-w-lg mx-auto p-4 grid grid-cols-1 row-gap-6 col-gap-4">
                <label for="name" class="text-sm font-semibold mt-2">Name</label>
                <input type="text" name="name" id="name" value="<?= $person->name ?>" required
                       class="mt-1 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                <label for="email" class="text-sm font-semibold mt-2">Email</label>
                <input type="email" name="email" id="email" value="<?= $person->email ?>" required
                       class="mt-1 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                <button type="submit"
                        class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full uppercase text-xs">
                    Update person
                </button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
