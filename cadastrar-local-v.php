<?php 
if (isset($_POST['submit'])) {
	
	require_once 'fcnsdb.php';

	$sala			= $_POST['sala'];
	$departamento	= $_POST['departamento'];
	$setor 			= $_POST['setor'];

	$query = "INSERT INTO udescti.local VALUES ('$setor','$departamento','$sala')";
	query($query);

	$query = "SELECT * FROM udescti.local WHERE setor='$setor' AND departamento='$departamento'";
	PrintTable(query($query));
}
 ?>