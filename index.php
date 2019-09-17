<!DOCTYPE html>
<html lang="en">
<head>
<?php
require('db.php');
$sql='SELECT * FROM people';
$statement=$connection->prepare($sql);
$statement->execute();
$people=$statement->fetchAll(PDO::FETCH_OBJ);
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All People</title>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>All People</h2>
            <a href="create.php">Add New</a>
        </div>
        <div class="card-body">
         <table>
         <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
         </tr>
         <?php foreach($people as $person): ?>
         <tr>
         <td><?=$person->id; ?></td>
         <td><?=$person->name; ?></td>
         <td><?=$person->email; ?></td>
         <td>
            <a href="edit.php?id=<?=$person->id ?>">Edit</a>
            <a onclick="return confirm('Are you Sure You want to Delete This Entry?')" href="delete.php?id=<?=$person->id ?>">Delete</a>
         </td>
         </tr>
        <?php endforeach; ?>
         </table>
        </div>
    </div>
</div>
</body>
</html>