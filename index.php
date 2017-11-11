<?php

require __DIR__.'/Model/model.php';

if (isset($_POST['bouton_connexion'])) {

	$login=$_POST['login'];
	$password=$_POST['password'];

	RequeteUser();
	
	header('location:./page_membre.php');
		
}
require __DIR__.'/View/indexView.php';

		


