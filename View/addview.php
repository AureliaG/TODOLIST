<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lire les todos</title>
  </head>
  <body>
 
    <h1><?php echo $todo['title']; ?></h1>
    <p><?php echo $todo['description']; ?></p>

    <form action="" method="post">
      <div>
        <label>
          titre :
          <input type="text" name="title" value="">
        </label>
      </div>
      <div>
        <label>
          description :
          <textarea name="description"></textarea>
        </label>
      </div>
      <div>
        <input type="submit" value="envoyer">
      </div>
    </form>

    <ul>

      <li><a href="read.php">annuler...</a></li>
      <li><a href="index.php">retour à l'index</a></li>

    </ul>
  </body>
</html>