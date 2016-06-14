<?php

$link = new PDO('mysql:host=localhost;dbname=baccs', "root", "P@ssw0rd");
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['update'])){
    $sql = "UPDATE MyGuests
            SET id = :id,
                firstname = :firstname,
                lastname = :lastname,
                email = :email,
            WHERE id = :id";
    $stmt = $link->prepare($sql);
    $stmt->execute(array(":id" => $_POST['updateid'],
                    ":firstname" => $_POST['firstname'],
                    ":lastname" => $_POST['lastname']
                    ":email" => $_POST['email']));
}

// header('Location: db.php');
// exit();
