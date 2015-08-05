<?php 
	
	//include 'fcnsdb.php';

	if (isset($_GET['userid'])){
		$userid = $_GET['userid'];

		$query = "SELECT * FROM udescti.user WHERE user_id='$userid'";

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
		/*
		foreach ($valores as $key => $value) {
			echo $key.": ".$value."<br>";
		}
		*/

		$query = "UPDATE udescti.user SET ";
		$i=0;
		foreach ($valores as $key => $value) {
			if ($i == sizeof($valores)-1){
				$query .= "$key='$value' ";
			}else {
				$query .= "$key='$value', ";
			}
			$i++;
		}
		$query .= "WHERE user_id='$userid'";

		//echo $query;
		query($query);
		
		header("Location: ./gerenciaUser.php");
	}

 ?>