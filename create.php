<?php
require('db.php');
$message='';

if(isset($_POST['name']) && isset($_POST['email'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $sql='INSERT INTO people(name, email) VALUES(:name, :email)';
    $statement=$connection->prepare($sql);
    if($statement->execute([':name'=> $name ,':email'=>$email])){
        $message='Data Inserted.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Person</title>
</head>
<body>
    <div class="container">
    <div class="card">
        <div class="card-header">
        <h2>Create a Person.</h2>
        </div>
        <div class="card-body">
        <?php
        if(!empty($message)):?>
                <div class="error"><?=$message?></div>
        <?php endif;?>
        <form action="" method="post">
        <input type="text" name="name" id="name" placeholder="Enter Your name" required>
        <br>
        <input type="email" name="email" id="email" placeholder="Enter Your email" required>
        <br>
        <button type="submit">Create a person</button>
        </form>
        </div>
    </div>
    </div>
</body>
</html>