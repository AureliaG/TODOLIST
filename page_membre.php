<?php
	session_start();

	require __DIR__.'/Model/model.php';

	$todos = getAll();

	require __DIR__.'/View/view.php';
