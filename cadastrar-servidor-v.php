<?php 
if (isset($_POST['submit'])) {
	
	require_once 'fcnsdb.php';
	
	$nome = $_POST['nome'];
	$cargo = $_POST['cargo'];

	$query = "INSERT INTO udescti.servidor VALUES ('$nome','$cargo')";

	query($query);

	$query = "SELECT * FROM udescti.servidor WHERE nome like '$nome'";

	PrintTable(query($query));
}
 ?>