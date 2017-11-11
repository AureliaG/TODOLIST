<?php
	session_start();

	$_SESSION['login']=$_POST['login'];

	require __DIR__.'/Model/model.php';

	$todos = getAll();

	require __DIR__.'/View/view.php';
