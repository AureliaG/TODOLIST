<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lire les todos</title>
  </head>
  <body>
    <h1><?php echo $todo['title']; ?></h1>
    <p><?php echo $todo['description']; ?></p>
    <ul>
      <li><a href="add.php?id=<?php echo $todo['id']; ?>">modifier...</a></li>
      <li><a href="delete.php?id=<?php echo $todo['id']; ?>">supprimer</a></li>
      <li><a href="index.php">retour à l'index</a></li>
    </ul>
  </body>
</html>