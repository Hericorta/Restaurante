<?php
    $host = "localhost";
    $porta = 3306;
    $user = "root";
    $pass = "";
    $dbname = "celke";
    $conn= new PDO("mysql:host=$host;port=$porta;dbname=".$dbname, $user, $pass);
?>