<?php
	require_once 'fcnsdb.php';

	if (isset($_POST['filtrar'])){
			$filtro = $_POST['filtro'];
		if ($filtro != ""){
			if (isset($_POST['selecao']) && isset($_POST['filterby'])) {
				$selecao = $_POST['selecao'];
				$filterby = $_POST['filterby'];
				$query = "SELECT * FROM udescti.equipamento WHERE tipo='$filtro' AND $filterby='$selecao'";
			} else {
				$query = "SELECT * FROM udescti.equipamento WHERE tipo='$filtro'";
			}
		} else if (isset($_POST['selecao']) && isset($_POST['filterby'])) {
			$selecao = $_POST['selecao'];
			$filterby = $_POST['filterby'];
			$query = "SELECT * FROM udescti.equipamento WHERE $filterby='$selecao'";
		} else {
			$query = "SELECT * FROM udescti.equipamento";
		}
		ShowTable($query);
	}

	//Original
	/*
	if (isset($_GET['patrimonio'])){
		$query = "SELECT patrimonio FROM udescti.equipamento";
		SelectValues(query($query));
	}

	if (isset($_GET['filtro'])) {
		$patrimonio = $_GET['filtro'];
		$query = "SELECT * FROM udescti.equipamento WHERE patrimonio='$patrimonio'";
		ShowTable($query);
	}
	*/

	if (isset($_GET['filterby'])){
		$filterby = $_GET['filterby'];
		if (isset($_GET['filtro']) && $_GET['filtro'] != ""){
			$filtro = $_GET['filtro'];
			$query = "SELECT $filterby FROM udescti.equipamento WHERE tipo='$filtro' GROUP BY 1";
		} else {
			$query = "SELECT $filterby FROM udescti.equipamento GROUP BY 1";
		}
		SelectValues(query($query));
	}

	function ShowTable($query) {
		PrintEquipTable(query($query));
		$numRows = mysqli_num_rows(query($query));
		echo "<div class=\"divider\"></div>";
		echo "<br>".($numRows>0? $numRows: "Nenhum")." ".($numRows > 1? "items.":"item.");
	}
 ?>
