<?php 

	$_DB['hostname'] = "localhost";
	$_DB['database'] = "udescti";
	$_DB['username'] = "god";
	$_DB['password'] = "123";

	$_DB['banco'] = conectadb($_DB['hostname'], $_DB['username'], $_DB['password']);
	selectdb($_DB['banco'], $_DB['database']);

	function conectadb($dbHostname, $dbUsername, $dbPassword){
		$con = mysqli_connect($dbHostname, $dbUsername, $dbPassword);
		if(!$con){
			die("Não foi possível conectar ao MySQL: ".mysqli_error($con));
		}
		return $con;
	}
	function selectdb($con, $db){
		mysqli_select_db($con, $db)
			or die("Não foi possível selecionar a base de dados: ".mysqli_error($con));
	}
	function query($query){
		global $_DB;
		$result = mysqli_query($_DB['banco'], $query);
		if(!$result){
			die ("Falha de acesso à base: ".mysqli_error($_DB['banco']).mysqli_errno($_DB['banco']));
		}
		return $result;
	}

	function PrintTable($result){     
		if (@mysqli_num_rows($result) == 0){ 
			echo("<b>Nenhum resultado retornado.</b><br>"); 
		}else { 
			echo "<table border='1' class='tablesorter striped'> 
				<thead> 
				<tr>"; 
			for($i = 0;$i < mysqli_num_fields($result);$i++) 
			{ 
				$name = mysqli_fetch_field($result)->name;
				echo "<th id='".$name."'>" . $name . "</th>"; 
			}
			echo "</tr> 
				</thead> 
				<tbody>"; 
			for ($i = 0; $i < mysqli_num_rows($result); $i++) 
			{ 
				echo "<tr>"; 
				$row = mysqli_fetch_row($result); 
				for($j = 0;$j < mysqli_num_fields($result);$j++)  
				{ 
					echo("<td>" . $row[$j] . "</td>"); 
				} 
				echo "</tr>"; 
			} 
			echo "</tbody> 
				</table>"; 
		}
	}
	function PrintEditTable($result){     
		if (@mysqli_num_rows($result) == 0){ 
			echo("<b>Nenhum resultado retornado.</b><br>"); 
		}else { 
			echo "<table border='1' class='tablesorter striped'> 
				<thead> 
				<tr>"; 
			for($i = 0;$i < mysqli_num_fields($result);$i++) 
			{ 
				$name = mysqli_fetch_field($result)->name;
				echo "<th id='".$name."'>" . $name . "</th>"; 
			}
			echo "<th id='edit'>Aterar</th>";
			echo "</tr> 
				</thead> 
				<tbody>"; 
			for ($i = 0; $i < mysqli_num_rows($result); $i++) 
			{ 
				echo "<tr>"; 
				$row = mysqli_fetch_row($result); 
				for($j = 0;$j < mysqli_num_fields($result);$j++)  
				{ 
					echo("<td>" . $row[$j] . "</td>"); 
				} 
				echo "<td id='edit".$i."'>...</td>";
				echo "</tr>"; 
			} 
			echo "</tbody> 
				</table>"; 
		}
	}
	function SelectValues($result){
		if (@mysqli_num_rows($result) == 0){
			echo "<option selected disabled>Nenhum item encontrado</option>";
		}else {
			echo "<option selected disabled>Selecione...</option>";
			for ($i=0; $i < mysqli_num_rows($result); $i++) { 
				for ($j=0; $j < mysqli_num_fields($result); $j++) { 
					$valor = mysqli_fetch_row($result)[$j];
					echo "<option value=".$valor.">".$valor."</option>";
				}
			}
		}
	}
?>