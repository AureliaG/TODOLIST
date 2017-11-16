 <?php
function initDatabase() {
	try {
	  require __DIR__.'/config.php';

	  $pdo = new PDO(
	    "mysql:dbname=$dbname;host=$host;charset=utf8", $user, $password
	  );
	} catch (PDOException $e) {
	  echo 'erreur : ' . $e->getMessage();

	  $pdo = null;
	}
//les noms n'ont de valeur que dans la fonction où ils sont déclarés
	return $pdo;
}


function prepareStatement($sql) {
	$pdo_statement = null;

	$pdo = initDatabase();

	if ($pdo) {
		try {
		  $pdo_statement = $pdo->prepare($sql);
		} catch (PDOException $e) {
		  echo 'erreur : ' . $e->getMessage();
		}
	}
//les noms n'ont de valeur que dans la fonction où ils sont déclarés
	return $pdo_statement;
}


function getAll() {
	$todos = [];

	$pdo_statement = prepareStatement('SELECT * FROM todos WHERE deleted_at IS NULL');

	if ($pdo_statement && $pdo_statement->execute()) {
		$todos = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
	}

	return $todos;
}


function getOne($id) {
	$todo = null;
	$pdo_statement = prepareStatement('SELECT * FROM todos WHERE id=:id');

	if (
  	$pdo_statement &&
  	$pdo_statement->bindParam(':id', $id, PDO::PARAM_INT) &&
  	$pdo_statement->execute()
	) {
  	$todo = $pdo_statement->fetch(PDO::FETCH_ASSOC);
	}
  return $todo;
}


function addOne($title, $description) {
	$pdo_statement = prepareStatement('INSERT INTO todos (title, description)' .
  		'VALUES (:title, :description)');

	if (
	  $pdo_statement &&
	  $pdo_statement->bindParam(':title', $title) &&
	  $pdo_statement->bindParam(':description', $description) &&
	  $pdo_statement->execute()
	 ) {
	 	return $pdo_statement;
      }  
}


function deleteOne($id) {
	$pdo_statement = prepareStatement('UPDATE todos SET deleted_at = CURRENT_TIMESTAMP() WHERE id=:id');
	if (
    !$pdo_statement ||
    !$pdo_statement->bindParam(':id', $id, PDO::PARAM_INT) ||
    !$pdo_statement->execute()
  ) {
    return $pdo_statement;
  }

}

      
function editOne($id, $title, $description) {
	$todo = null;
	$pdo_statement = prepareStatement('UPDATE todos SET title=:title, description=:description WHERE id=:id');
	if (
	  $pdo_statement &&
	  $pdo_statement->bindParam(':id', $id, PDO::PARAM_INT) &&
	  $pdo_statement->bindParam(':title', $title) &&
	  $pdo_statement->bindParam(':description', $description) &&
	  $pdo_statement->execute()
	) {
	  $todo = $pdo_statement->fetch(PDO::FETCH_ASSOC);
	  return $todo;
	}
}

function RequeteUser ($login,$password,$ok) {
	$ok= NULL;

	$sql = 'SELECT * FROM user WHERE login=? AND password=?';
	$reqUser =prepareStatement($sql);


	$reqUser->execute(array($login, $password));


	$userExist = $reqUser->rowCount();

	if($userExist==1) { 

		$userData = $reqUser->fetch();

		$_SESSION['id_user']= $userData['id_user'];
		$_SESSION['login'] = $userData['login'];
		$_SESSION['password'] = $userData['password'];

		$ok=TRUE;
	}
	
	return $ok;
}	
	


function Inscription($login,$email,$password,$password_confirm)
{
	if (($login ==true) AND ($email ==true) AND($password ==true) AND($password_confirm ==true) ){

		if ($password == $password_confirm) {
			
			$password=password_hash($password,PASSWORD_BCRYPT);

			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

				$succes ='Votre compte a bien été crée !';
				
				session_start();
				$_SESSION['login']=$_POST['login'];


				header('location: index.php');
			}else{

				$error= 'Votre email n\'est pas valide';
			}
		}else {

			$error = 'Attention, vos mots de passe ne correspondent pas!';
		}

	}else {

		$error= "Vous devez remplir tous les champs";
	} 
}	
