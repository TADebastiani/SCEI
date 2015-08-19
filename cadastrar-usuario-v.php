<?php 

require_once 'fcnsdb.php';

if(isset($_POST['submit'])){
	$arrayName = array(	'username' => $_POST['username'],
						'login' => $_POST['login'],
						'password' => md5($_POST['password']),
						'email' => $_POST['email'],
						'root' => isset($_POST['root'])? $_POST['root']: 'N');
	
	$query = "INSERT INTO udescti.usuario ";
	$query .= "(".implode(", ", array_keys($arrayName)).")";
	$query .= " VALUES ('".implode("', '", $arrayName)."')";

	query($query);
	$login = $arrayName['login'];
	$query = "SELECT username,login,email,root FROM udescti.usuario WHERE login = '$login'";

	PrintTable(query($query));
}
 ?>