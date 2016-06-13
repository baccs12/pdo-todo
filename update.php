<?php

$link = new PDO('mysql:host=localhost;dbname=baccs', "root", "P@ssw0rd");
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = $link->query('SELECT * FROM MyGuests');
$results = $sql->fetchAll(PDO::FETCH_ASSOC);

