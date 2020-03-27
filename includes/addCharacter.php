<!-- ik heb een extra functie erin gemaakt om zelf nieuwe karakters toe te voegen aan de database en die worden getoond op het scherm en de details -->

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Character</title>
  <link rel="stylesheet" href="../style.css?t=<?=time()?>">
  <script src="https://kit.fontawesome.com/8a70fffbf9.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Fondamento&display=swap" rel="stylesheet">
</head>
<body>
<div class="grid-container">
<div class="grid-item item1">
<a class = "terug" href="../index.php">
            <i class="fas fa-long-arrow-alt-left"></i> Terug</a>
      <h1>Voeg een character toe</h1>
  </div>
<div class="grid-item item2">
<?php
include('connection.php');

    $name = $_POST["name"];
    $avatar = 'nopicture.png';
    $health = $_POST["health"];
    $bio = $_POST["bio"];
    $color = $_POST["color"];
    $attack = $_POST["attack"];
    $defense = $_POST["defense"];
    $weapon = $_POST["weapon"];
    $armor = $_POST["armor"];
    $health;
    $attack;
    $defense;


    $nameErr = $healthErr = $attackErr = $defenseErr = "";
    $valid;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($name)) {
            $nameErr = " * Verplicht";
            $valid = true;
        }

        if (empty($_POST["health"])) {
            $healthErr = " * Verplicht";
            $valid = true;
        }
        if (empty($_POST["attack"])) {
            $attackErr = " * Verplicht";
            $valid = true;
        }
        if (empty($_POST["defense"])) {
            $defenseErr = " * Verplicht";
            $valid = true;
        }
        
            if(empty($avatar)){
                $avatar = "bowser.jpg";
                $sqlavatar = "INSERT INTO characters (avatar) VALUES (:avatar)";
                $stmt1 = $connect->prepare($sqlavatar);
                $stmt1->execute(['avatar'=> $avatar]);
            }

        if ($valid){
            echo "<div class = 'added'>Vul de verplichte velden in </div>";
        }
        else{
            $sql = "INSERT INTO characters (name, avatar, health, bio, color, attack, defense, weapon, armor) VALUES (:name, :avatar, :health, :bio, :color, :attack, :defense, :weapon, :armor)";

            $stmt = $connect->prepare($sql);
            $stmt->execute(['name'=> $name, 'avatar'=> $avatar, 'health'=> $health, 'bio'=> $bio,'color' => $color, 'attack'=> $attack, 'defense'=> $defense, 'weapon'=> $weapon, 'armor'=> $armor]);
        
            echo '<div class = "added"> Character is succesvol toegevoegd </div>';
        }


    }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }


?>

    <form class = "form" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

    Naam character: <br>
        <input type="text" name="name"><span class="error"><?php echo $nameErr;?></span> <br><br>
    Avatar: <br>
        <input type="text" name="avatar" disabled><br><br>
    Health: <br>
        <input type="number" name="health"><span class="error"><?php echo $healthErr;?></span><br><br>
    Bio: <br>
        <textarea type="text" name="bio" rows="5" cols="40"></textarea><br><br>
    Color: <br>
        <input type="color" name="color" value="#ff0000"><br><r>
    Attack: <br>
        <input type="number" name="attack"><span class="error"><?php echo $attackErr;?></span><br><br>
    Defense: <br>
        <input type="number" name="defense"><span class="error"><?php echo $defenseErr;?></span><br><br>
    Weapon: <br>
        <input type="text" name="weapon"><br><br>
    Armor: <br>
        <input type="text" name="armor"><br><br>
        
    <i class="fas fa-share-square"></i><input class= "submit" type="submit">



    </form>

</div>
<?include('footer.php');?>
</div>
</body>
</html>
