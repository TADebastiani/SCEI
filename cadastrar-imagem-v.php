<?php 

if (isset($_POST['submit'])){

	$tipo = $_POST['tipo'];

	$imagem = $_FILES['img'];
	if ($imagem['tmp_name'] != 'none') {
		$fp = fopen($imagem['tmp_name'],"rb");
		$conteudo = fread($fp, $imagem['size']);
		$conteudo = addslashes($conteudo);
		fclose($fp);

		$query = "INSERT INTO udescti.equip_img (tipo,imagem) VALUES ('$tipo','$conteudo')";
		query($query);

		$query = "SELECT max(img_id) FROM udescti.equip_img";
		$lastID = mysqli_fetch_array(query($query))['max(img_id)'];

		echo "<h5 class='center-align'><b>Imagem Salva!</b></h5>";
		echo "<img class='col s6 offset-s3 responssive-img' src='ver-imagens.php?id=".$lastID."'>";
	}
	else{
		echo "<h5 class='valign-center'><b>Erro ao carregar a Imagem!</b></h5>";
	}
}
?>