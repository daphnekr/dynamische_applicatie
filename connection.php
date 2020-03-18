<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = 'dynamische_applicatie';


try {
    $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

}
catch(PDOException $e)
    {
    $e->getMessage();
    }
?>
