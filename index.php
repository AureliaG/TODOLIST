<?php



if (isset($_POST['bouton_connexion'])) {

	$login=$_POST['login'];
	$password=$_POST['password'];
	$ok= NULL;


	require __DIR__.'/Model/model.php';

	

	if(RequeteUser($login,$password,$ok)) {

		header('location:./page_membre.php');
	}

	else{

			echo "<a href=inscription.php>Vous devez vous inscrire</a>" ;
		}	
			
}


require __DIR__.'/View/indexView.php';

		


