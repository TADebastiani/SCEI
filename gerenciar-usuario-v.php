<?php 

	require_once 'fcnsdb.php';

	if (isset($_POST['excluir'])){
		$excluir = $_POST['excluir'];
		$query = "DELETE FROM udescti.usuario WHERE user_id='$excluir'";
		query($query);
	}

	$query = "SELECT user_id,username,login,email,root FROM udescti.usuario";

	PrintEditTable(query($query));

 ?>