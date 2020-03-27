<?php include('includes/connection.php');?>
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


    $id = $_GET['id'];

    $data = $connect->prepare("SELECT * FROM characters WHERE id = :id");
    $data->execute(array(
        ':id' => $id
    ));

    foreach($data as $row){ ?>
        <div class="grid-item item1">
        <a class = "terug" href="index.php">
            <i class="fas fa-long-arrow-alt-left"></i> Terug</a>
            <div class = "title"> <? echo $row["name"] ?></div>
        </div>
        <div class="grid-item item3 ">

            <img class = "character" src="avatars/images/<? echo $row["avatar"]?>"alt="<? echo $row["name"] ?>"><br>

            <div class = "details" style="background-color: <? echo $row["color"] ?>">

                <p class = "margin"><i class="fas fa-heart"></i> <? echo $row["health"] ?><br>

                <i class="fas fa-fist-raised"></i> <? echo $row["attack"]?><br>
                <i class="fas fa-shield-alt"></i> <? echo $row["defense"] ?><br><br>

                <b>Weapon:</b> <? echo $row["weapon"]?><br>

                <b>Armor:</b> <? echo $row["armor"] ?></p>
            </div>

        </div>
        
            <div class="grid-item item4 ">
                <p><pre><? echo $row["bio"] ?></pre><br></p>
            </div>
    <?}

    include('includes/footer.php');
?>
</div>
</body>
</html>
