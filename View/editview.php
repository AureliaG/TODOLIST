<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Modifier...</title>
  </head>
  <body>
    <h1 class="title">Modifier une tâche</h1>
     <form action="" method="post">
      <div>
        <label>
          titre :
          <input type="text" name="title" value="<?php echo $todo['title']; ?>">
        </label>
      </div>
      <div>
        <label>
          description :
          <textarea name="description"<?php echo $todo['description']; ?>></textarea>
        </label>
      </div>
      <div>
        <input type="submit" value="envoyer">
      </div>
    </form>
    <ul>
      <li><a href="read.php?id=<?php echo $todo['id']; ?>">annuler</a></li>
      <li><a href="index.php">retour à l'index</a></li>
    </ul>
  </body>
</html>
