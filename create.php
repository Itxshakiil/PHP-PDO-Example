<?php
require_once 'connect.php';
$message = '';

if (isset($_POST['name'], $_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $SQLQuery = 'INSERT INTO people(name, email) VALUES(:name, :email)';
    $statement = $connection->prepare($SQLQuery);
    if ($statement->execute([':name' => $name, ':email' => $email])) {
        $message = 'Data Inserted.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Person</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="container mx-auto py-8">
    <div class="bg-gray-100 shadow-md rounded w-full max-w-lg mx-auto main-card">
        <div class="flex justify-between items-center px-4 py-2 border-b border-gray-300">
            <h2 class="text-2xl font-semibold">Add new person</h2>
            <a href="index.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full uppercase text-xs">All people</a>
        </div>
        <div class="w-full text-left table-auto bg-white rounded shadow-md">
            <?php if (!empty($message)): ?>
                <span class="inline-block m-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-0" role="alert"><?php echo $message; ?></span>
            <?php endif; ?>
            <form action="" method="post" class="w-full max-w-lg mx-auto p-4 grid grid-cols-1 row-gap-6 col-gap-4">
                <label class="text-sm font-semibold" for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter Your name" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                <label class="text-sm font-semibold" for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter Your email" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full uppercase text-xs">Add new person</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
