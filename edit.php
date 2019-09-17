<?php
require('db.php');
$id=$_GET['id'];
$sql="SELECT * FROM people WHERE ID=:id";
$statement=$connection->prepare($sql);
$statement->execute([':id'=>$id]);
$person=$statement->fetch(PDO::FETCH_OBJ);
$message='';
if(isset($_POST['name']) && isset($_POST['email'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $sql='UPDATe people SET name=:name ,email=:email WHERE id=:id';
    $statement=$connection->prepare($sql);
 if($statement->execute([':name'=> $name ,':email'=>$email,':id'=>$id])){
     header('location:index.php');
 }
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                <div class="error"><?php echo $message; ?></div>
        <?php endif;?>
        <form action="" method="post">
        <input type="text" name="name" id="name"  value="<?=$person->name ?>" required>
        <br>
        <input type="email" name="email" id="email" value="<?=$person->email ?>" required>
        <br>
        <button type="submit">Create a person</button>
        </form>
        </div>
    </div>
    </div>
</body>
</html>