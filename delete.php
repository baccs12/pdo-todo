<?php
require('db.php');
$link = new PDO('mysql:host=localhost;dbname=baccs', "root", "P@ssw0rd");
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
var_dump($id);

if(isset($_POST['delete'])){
    $sql = "DELETE FROM List WHERE id =  :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $_POST['updateid'], PDO::PARAM_INT);
    $stmt->execute();
}

header('Location: index.php');
exit();
?>