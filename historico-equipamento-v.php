<?php 
	require_once 'fcnsdb.php';
	
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$query = "SELECT * FROM udescti.historico WHERE patrimonio='$id'";
		ShowTable($query);
	}
	function ShowTable($query) {
		PrintTable(query($query));
		$numRows = mysqli_num_rows(query($query));
		echo "<div class=\"divider\"></div>";
		echo "<br>".($numRows>0? $numRows: "Nenhum")." ".($numRows > 1? "items.":"item.");
	}

	/*
	if (isset($_POST['filtrar'])){
			$filtro = $_POST['filtro'];
		if ($filtro != ""){
			$query = "SELECT * FROM udescti.historico WHERE EXISTS (SELECT * FROM udescti.equipamento WHERE tipo='$filtro'";
			ShowTable($query);
		} else {
			$query = "SELECT * FROM udescti.historico";
			ShowTable($query);
		}
	}
	
	if (isset($_GET['patrimonio'])){
		$query = "SELECT patrimonio FROM udescti.historico";
		SelectValues(query($query));
	}


	if (isset($_GET['filtro'])) {
		$patrimonio = $_GET['filtro'];
		$query = "SELECT * FROM udescti.historico WHERE patrimonio='$patrimonio'";
		ShowTable($query);
	}
	*/
 ?>