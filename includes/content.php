<?php include("connection.php");?>

<div class="grid-item item1">
<? $nRows = $connect->query("SELECT count(*) from characters")->fetchCOlumn();
 ?>
      <h1>Alle <?echo $nRows;?> characters uit de database</h1>
  </div>

  <?php

    
    $query = $connect->prepare("SELECT * FROM characters ORDER BY `name` ASC");
    $query->execute();
    $data = $query->fetchAll();
    ?>

    <div class="grid-item item2">

    <?php foreach($data as $row){?>

        <div class = "float">
          <img class = "index" src="avatars/images/<? echo $row["avatar"]?>" alt = <? echo $row["name"]?>><p><? echo $row["name"]?></p>

          <i class="fas fa-heart"></i> <? echo $row["health"]?> <br>
          <i class="fas fa-fist-raised"></i> <? echo $row["attack"]?><br>
          <i class="fas fa-shield-alt"></i> <? echo $row["defense"]?><br><br>
          
          <?php echo '<a href="character.php?id='.$row["id"].'">'?>
          <i class="fas fa-search"></i> bekijk</a>
        <hr></div>
    <?}
     ?>
    </div>

