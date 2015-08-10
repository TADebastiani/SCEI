<?php 
require_once 'fcnsdb.php';

if (isset($_POST["submit"])) {

	
	$patrimonio = $_POST['patrimonio'];
	$servidor = trim($_POST['servidor']);
	$lsetor = trim($_POST['lsetor']);
	$lcentro = trim($_POST['lcentro']);
	$tipo = $_POST['tipo'];
	$descr = '';

	if ($tipo == 'Nobreak'){
		$arrayDescr = array('Marca' => $_POST['nmarca'],
			'Modelo' => $_POST['nmodelo'],
			'Potencia' => $_POST['potencia'],
			'Voltagem Entrada' => $_POST['ventrada'],
			'Voltagem Saída' => $_POST['vsaida'],
			'Plugue' => $_POST['plugue']);

		foreach ($arrayDescr as $key => $value) {
			$descr .= $key.': '.$value.';<br>';
		}
	}
	elseif ($tipo == 'PC') {
		$drive = '';
		foreach ($_POST['drive'] as $key => $value) {
			if ($key == sizeof($_POST['drive'])-1){
				$drive .= $value;
			}else {
				$drive .= $value.', ';
			}
		}

		$arrayDescr = array('Sistema Operacional' => $_POST['sistop'],
			'Placa-Mãe' => $_POST['mboard'],
			'Processador' => $_POST['cpu'],
			'Memória' => $_POST['memoria'],
			'HD' => $_POST['hd'],
			'Drive' => $drive);

		foreach ($arrayDescr as $key => $value) {
			$descr .= $key.': '.$value.';<br>';
		}
	}
	elseif ($tipo == 'Monitor' || $tipo == 'Projetor') {
		$conector = '';
		foreach ($_POST['conector'] as $key => $value) {
			if ($key == sizeof($_POST['conector'])-1){
				$conector .= $value;
			}else{
				$conector .= $value.', ';
			}

		}

		$arrayDescr = array('Marca' => $_POST['pmarca'],
			'Modelo' => $_POST['pmodelo'],
			'Voltagem Entrada' => $_POST['pvoltagem'],
			'Resolução' => $_POST['resolucao'],
			'Conector' => $conector);

		foreach ($arrayDescr as $key => $value) {
			$descr .= $key.': '.$value.';<br>';
		}
	}

	$query = "INSERT INTO udescti.equipamento VALUES ('$patrimonio','$servidor','$lsetor','$lcentro','$tipo','$descr')";
	query($query);

	$query = "SELECT * FROM udescti.equipamento WHERE patrimonio='$patrimonio'";
	PrintTable(query($query));
}

if (isset($_GET['servidor'])) {
	$query = "SELECT nome FROM udescti.servidor";
	SelectValues(query($query));
}
if (isset($_GET['lsetor'])) {
	$query = "SELECT setor FROM udescti.local group by 1";
	SelectValues(query($query));
}
if (isset($_GET['lcentro'])) {
	$query = "SELECT centro FROM udescti.local group by 1";
	SelectValues(query($query));
}

/*

[ \w.+(?=:) ] // antes dos dois pontos

(?<=:)(\W)*\w.+(?=;) //entre dois-pontos e ponto-e-virgula

*/
?>