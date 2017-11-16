<?php

if (isset($_POST['bouton_connexion'])) {

	$login=htmlspecialchars($_POST['login']);
	$email=htmlspecialchars($_POST['email']);
	$password=htmlspecialchars($_POST['password']);
	$password_confirm=htmlspecialchars($_POST['password_confirm']);

	require __DIR__.'/Model/model.php';

	function Inscription($login,$email,$password,$password_confirm);
	}

require __DIR__.'/View/inscriptionView.php';
