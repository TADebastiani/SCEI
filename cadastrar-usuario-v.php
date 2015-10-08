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

	$getUser = "SELECT max(user_id) FROM udescti.usuario"; //pegar o maior valor auto incrementado
	$userid = mysqli_fetch_array(query($getUser))['max(user_id)'];
	$hDescr = "Cadastrado novo usuário com a id ".$userid;
	$data = date('Y-m-d H:i:s');
	$log = "INSERT INTO udescti.log (data,usuario,descricao) VALUES ('$data','$_SESSION[usuarioID]','$hDescr')";
	query($log);
}
 ?>