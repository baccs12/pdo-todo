<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trial-PDO</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="normalize.css">
</head>
<body>
<div class='wrapper'>
    <form name='baccs' method='post' action='db.php'>
    First Name: <br>
    <input type='text' name='firstname' required='required' ><br>
    Last Name: <br>
    <input type='text' name='lastname' required='required' ><br>
    Email: <br>
    <input type='email' name='email' id='email' required='required' ><br><br>
    <input type='submit' name='submit' value='submit'>

    </form>
</div>

</body>
</html>



<?php
if(isset($_POST["submit"])){
try {
    $link = new PDO('mysql:host=localhost;dbname=baccs', "root", "P@ssw0rd");
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="INSERT INTO `baccs` . `MyGuests` (`firstname`, `lastname`, `email`)
    VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[email]')";
    if ($link->query($sql)) {
    echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
    }
    else{
    echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
    }
    $dbh = null;
    }
    catch(PDOException $e)
    {
    echo $e->getMessage();
    }
}


$sql = $link->query('SELECT * FROM MyGuests');
$results = $sql->fetchAll(PDO::FETCH_ASSOC);

foreach($results as $result){
echo "<table border = '1px'>";
echo "<tr><td>" . $result[id] . "</td><td>" . $result["firstname"] . "</td><td>" . $result["lastname"] . "</td><td>" . $result["email"] . "</td><td>" . "<span><a href='#'>Delete</a></span>" . "<span><a href='#'>Update</a></span>" . "</td></tr>";
}


?>