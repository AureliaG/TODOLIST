<?php

require __DIR__.'/Model/model.php';

$todo = addOne($_POST['title'], $_POST['description']);

if ($todo) {
	header('Location:page_membre.php');
	exit;
}

require __DIR__.'/View/addview.php';