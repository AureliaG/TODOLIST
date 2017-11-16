<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Parcourir les todos</title>
  </head>
  <body>
    <h1>todo-list</h1>
    <ul>

    <?php

      foreach ($todos as $ligne) {
    ?>

      <li>
        <a href="read.php?id=<?php echo $ligne['id']; ?>">
          <?php echo $ligne['title']; ?> 
        </a>
      </li>

    <?php
      }
    ?>

      <li><a href="add.php">ajouter une tâche...</a></li>
	    <li><a href="./deconnexion.php">Déconnexion</a></li>	

    </ul>
    
  </body>
</html>
