<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Character</title>
  <link rel="stylesheet" href="style.css?t=<?=time()?>">
  <script src="https://kit.fontawesome.com/8a70fffbf9.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Fondamento&display=swap" rel="stylesheet">
</head>
<body>
<div class="grid-container">

<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = 'dynamische_applicatie';

$id = $_GET['id'];

try {
    $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    $data = $connect->prepare("SELECT * FROM characters WHERE id = :id");
    $data->execute(array(
        ':id' => $id
    ));

    foreach($data as $row){
        echo '
        <div class="grid-item item1">
        <a class = "terug" href="index.php">
            <i class="fas fa-long-arrow-alt-left"></i> Terug</a>
            <div class = "title">'.$row["name"].'</div>
        </div>
        <div class="grid-item item3 ">
            <img class = "character" src="avatars/images/'.$row["avatar"].'"alt="'.$row["name"].'"><br>
            <div class = "details" style="background-color:'.$row["color"].'">
                <p class = "margin"><i class="fas fa-heart"></i> '.$row["health"]. '<br>
                <i class="fas fa-fist-raised"></i> '.$row["attack"].'<br>
                <i class="fas fa-shield-alt"></i> '.$row["defense"].'<br><br>
                <b>Weapon:</b> '.$row["weapon"].
                '<br><b>Armor:</b> '.$row["armor"].'</p>
            </div>
        </div>
            <div class="grid-item item4 ">
                <p><pre>'.$row["bio"]. '</pre><br></p>
            </div>';
    }
}
catch(PDOException $e)
    {
    $e->getMessage();
    }

    include('includes/footer.php');
?>
</div>
</body>
</html>
