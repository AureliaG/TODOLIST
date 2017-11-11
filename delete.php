<?php

require __DIR__.'/Model/model.php';


if (isset($_GET['id'])) {
	$id = $_GET['id'];

  if (deleteOne($id)) {
  	header('Location:read.php?id=' . $id);
  	exit;
	} else {
		header('Location:page_membre.php');
	}
}


require __DIR__.'/View/deleteview.php';