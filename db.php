
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
    Title: <br>
    <input type='text' name='title' required='required' ><br>
    Message: <br>
    <input type='text' name='message' required='required' ><br>
    <br>
    <input type='submit' name='submit' value='submit'>

    </form>
</div>



<?php
class Pdoclass
{
    public function __construct($db)
    {

    }

    public function addsubmit($result) {

    if(isset($_POST["submit"])){
    try {
        $link = new PDO('mysql:host=localhost;dbname=baccs', "root", "P@ssw0rd");
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO `baccs` . `ToDo` (`title`, `message`)
        VALUES ('$_POST[title]','$_POST[message]')";
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

        $sql= "SELECT * FROM ToDo";
                $stmt = $link->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach($result as $row)
                {
                    echo "<div class='wrapper'>
                    <form action='delete.php' method='POST' class='form-display'>";
                    echo "<input type='text' name='id' value='{$row['id']}'>";
                    echo "<input type='text' name='firstname' value='{$row['title']}'>";
                    echo "<input type='text' name='lastname' value='{$row['message']}'>";
                    echo "<button type='submit' name='update'>Update</button>";
                    echo "<button type='submit' name='delete'>Delete</button>";
                    echo "</form></div>";
                }
            }
        }
    }

$info = new Pdoclass($db);
$info->addsubmit($result);


?>
