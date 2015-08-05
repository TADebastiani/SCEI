<?php 
if (isset($_POST['submit'])) {
	
	require_once 'fcnsdb.php';

	$sala = $_POST['sala'];
	$centro = $_POST['centro'];
	$setor = $_POST['setor'];

	$query = "INSERT INTO udescti.local VALUES ('$sala','$centro','$setor')";
	query($query);

	$query = "SELECT * FROM udescti.local WHERE sala='$sala'";
	PrintTable(query($query));
}
 ?>