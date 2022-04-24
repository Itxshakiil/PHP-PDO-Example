<?php
include_once 'connect.php';

$SQLQuery = 'SELECT * FROM people';
$statement = $connection->prepare($SQLQuery);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All People</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="container mx-auto py-8">
    <div class="bg-gray-100 shadow-md rounded w-full max-w-lg mx-auto">
        <div class="flex justify-between items-center px-4 py-2 border-b border-gray-300">
            <h2 class="text-2xl font-semibold">All People</h2>
            <a href="create.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full uppercase text-xs">Add new user</a>
        </div>
        <div class="p-4">
            <table class="w-full text-left table-auto rounded shadow bg-white">
                <tr class="border-b border-gray-300">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
                <?php foreach ($people as $person): ?>
                    <tr class="border-b border-gray-300">
                        <td class="px-4 py-2"><?= $person->id ?></td>
                        <td class="px-4 py-2"><?= $person->name ?></td>
                        <td class="px-4 py-2"><?= $person->email ?></td>
                        <td class="px-4 py-2">
                            <a class="text-sm text-blue-500" href="edit.php?id=<?= $person->id ?>">Edit</a>
                            <a class="text-sm text-red-500" onclick="return confirm('Are you Sure You want to Delete This Entry?')"
                               href="delete.php?id=<?= $person->id ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
