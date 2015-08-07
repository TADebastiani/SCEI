<?php 

	require_once 'fcnsdb.php';

	if (isset($_POST['excluir'])){
		$excluir = $_POST['excluir'];
		$query = "DELETE FROM udescti.usuario WHERE user_id='$excluir'";
		query($query);
	}

	$query = "SELECT * FROM udescti.usuario";

	PrintEditTable(query($query));

 ?>