<?php 
	require_once 'fcnsdb.php';
	
	if (isset($_POST['filtrar'])){
			$filtro = $_POST['filtro'];
		if ($filtro != ""){
			$query = "SELECT * FROM udescti.equipamento WHERE tipo='$filtro'";
			ShowTable($query);
		} else {
			$query = "SELECT * FROM udescti.equipamento";
			ShowTable($query);
		}
	}

	if (isset($_GET['patrimonio'])){
		$query = "SELECT patrimonio FROM udescti.equipamento";
		SelectValues(query($query));
	}

	if (isset($_GET['filtro'])) {
		$patrimonio = $_GET['filtro'];
		$query = "SELECT * FROM udescti.equipamento WHERE patrimonio='$patrimonio'";
		ShowTable($query);
	}

	function ShowTable($query) {
		PrintEquipTable(query($query));
		$numRows = mysqli_num_rows(query($query));
		echo "<div class=\"divider\"></div>";
		echo "<br>".($numRows>0? $numRows: "Nenhum")." ".($numRows > 1? "items.":"item.");
	}
 ?>