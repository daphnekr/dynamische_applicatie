<div class="grid-item item1">
      <h1>Alle 10 characters uit de database</h1>
  </div>

  <?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = 'dynamische_applicatie';


try {
    $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    $query = "SELECT * FROM characters ORDER BY `name` ASC";

    $data = $connect->query($query);

    echo '<div class="grid-item item2">';

    foreach($data as $row){
        echo '
        <div class = "float">
          <img class = "index" src="avatars/images/'.$row["avatar"].'" alt = '.$row["name"].'><p>'.$row["name"].'</p>
          <i class="fas fa-heart"></i> '.$row["health"]. '<br>
          <i class="fas fa-fist-raised"></i> '.$row["attack"].'<br>
          <i class="fas fa-shield-alt"></i> '.$row["defense"].'<br><br>
          <a href="character.php?id='.$row["id"].'">
          <i class="fas fa-search"></i> bekijk</a>
        <hr></div>';
    }
    echo '</div>';

}
catch(PDOException $e)
    {
    $e->getMessage();
    }
?>
