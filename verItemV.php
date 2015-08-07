<?php 
	require_once 'fcnsdb.php';
	
	if (isset($_GET['filtro'])){
		$filtro = $_GET['filtro'];
		
		$query = "SELECT * FROM udescti.equipamento WHERE tipo='$filtro'";
		PrintTable(query($query));

		$numRows = mysqli_num_rows(query($query));
		echo "<br>".($numRows>0? $numRows: "Nenhum")." ".($numRows > 1? "items.":"item.");
	} else {
		$query = "SELECT * FROM udescti.equipamento";
		PrintTable(query($query));
		$numRows = mysqli_num_rows(query($query));
		echo "<div class=\"divider\"></div>";
		echo "<br>".($numRows>0? $numRows: "Nenhum")." ".($numRows > 1? "items.":"item.");
	}
 ?>