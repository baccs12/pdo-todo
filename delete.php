<?php
$link = new PDO('mysql:host=localhost;dbname=baccs', "root", "P@ssw0rd");
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($_POST['delete'])){
    $sql = "DELETE FROM MyGuests WHERE id =  :id";
    $stmt = $link->prepare($sql);
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
    $stmt->execute();
    echo "<script type= 'text/javascript'>alert('Successfully Deleted.');</script>";
}

header('Location: db.php');
exit();
?>