<?php 
	
	//include 'fcnsdb.php';

	if (isset($_GET['userid'])){
		$userid = $_GET['userid'];

		$query = "SELECT * FROM udescti.usuario WHERE user_id='$userid'";

		$result = query($query);

		$valorTupla = array();
		
		for($i = 0;$i < mysqli_num_fields($result);$i++) 
			{ 
				$name = mysqli_fetch_field($result)->name;
				$nameTupla[] = $name;
			}
		for ($i=0; $i < mysqli_num_rows(query($query)); $i++) { 
			for ($j=0; $j < mysqli_num_fields(query($query)); $j++) { 
				//$name = mysqli_fetch_field(query($query))->name;
				$valor = mysqli_fetch_row(query($query))[$j];
				$valorTupla[$nameTupla[$j]] = $valor;
			}
		}
		/*
		foreach ($valorTupla as $key => $value) {
			echo $key.": ".$value."<br>";
		}
		*/
		
	}

	if(isset($_POST['submit'])){
		$_POST['root'] = isset($_POST['root'])? $_POST['root']: 'N';
		$valores = array();
		
		/*
		foreach ($valorTupla as $key => $value) {
			echo "@".$key.": ".$value."<br>";
		}
		echo "<br>";
		foreach ($_POST as $key => $value) {
			echo "#".$key.": ".$value."<br>";
		}
		*/

		foreach ($valorTupla as $key => $value) {
			if ($key != 'user_id'){
				if ($_POST[$key] != $value){
					if ($key == 'password'){
						$valores[$key] = md5($_POST[$key]);
					} else {
						$valores[$key] = $_POST[$key];
					}
				}
			}
		}

		$query = "UPDATE udescti.usuario SET ";
		$i=0; //controle para saber qual o último índice de $valores
		$hDescr = "Alterado ";
		
		foreach ($valores as $key => $value) {
			//echo $key.": ".$value."<br>";
		
			if ($key != 'user_id'){
				if ($valorTupla[$key] != $value){
					if ($i == sizeof($valores)-1){
						$query .= "$key='$value' ";
						$hDescr .= $key;
					}else {
						$query .= "$key='$value', ";
						$hDescr .= $key.", ";
					}
					$i++;
				}
			}
		}
		$query .= "WHERE user_id='$userid'";
		echo $query."<br>";
		query($query);

		$hDescr .= " do usuário ".$userid;
		$data = date('Y-m-d H:i:s');
		echo $hDescr;
		$log = "INSERT INTO udescti.log (data,usuario,descricao) VALUES ('$data','$_SESSION[usuarioID]','$hDescr')";
		query($log);
		header("Location: ./gerenciar-usuario.php");
	}
?>