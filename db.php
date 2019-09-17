<?php
$dsn='mysql:host=localhost;dbname=company';
$username='root';
$password='';
$options=[];
try{
    $connection=new PDO($dsn,$username,$password,$options);
    echo 'Connecton Succesful';
}catch(PDOException $e){
    echo "Error Please Contact Admin.";
}
    
?>