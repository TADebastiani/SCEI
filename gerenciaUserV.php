<?php 

	require_once 'fcnsdb.php';

	if (isset($_POST['excluir'])){
		$excluir = $_POST['excluir'];
		$query = "DELETE FROM udescti.user WHERE user_id='$excluir'";
		query($query);
	}

	$query = "SELECT * FROM udescti.user";

	PrintEditTable(query($query));

 ?>