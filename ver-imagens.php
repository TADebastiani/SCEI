<?php 
	include 'fcnsdb.php';

	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$query = "SELECT img_id, imagem FROM udescti.equip_img WHERE img_id='$id'";
		$resultado = query($query);
		$imagem = mysqli_fetch_object($resultado);
		Header( "Content-type: image/gif");		
		echo $imagem->imagem;
	}
 ?>