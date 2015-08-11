<?php 
	include 'fcnsdb.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv=\"refresh\" content=\"1; url=authentication.php?url=index.php\">
	<meta charset="utf-8">
	<!-- jQuery -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	 <!-- Materialize -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
	<!-- Custom -->
	<script src="./js/index.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<title>teste</title>
</head>
<body>
	<main>
		<div class="container">
			<div class="row col s12">
				<form method="POST" enctype="multipart/form-data">
					<div class="file-field input-field">
						<div class=" btn">
							<span>File</span>
							<input type="file" name="img" />
						</div>
						<input class=" file-path validate" type="text"/>
					</div>
				<p class="center-align">
					<button class=" btn waves-effect waves-light" type="submit" name="submit" value="confirmar">Confirmar
						<i class="mdi-content-send right"></i>
					</button>
				</p>
				</form>	
			</div>

			<div class="row col s12">
				<?php 
					if (isset($_POST['submit'])){
						
						foreach ($_FILES as $key => $value) {
							foreach ($value as $key2 => $value2) {
								echo "FILE[".$key."][".$key2."]: ".$value2."<br>";
							}
						}foreach ($_POST as $key => $value) {
							echo "POST[".$key."]: ".$value."<br>";
						}
						$imagem = $_FILES['img'];
						if ($imagem['tmp_name'] != 'none') {
							$fp = fopen($imagem['tmp_name'],"rb");
							$conteudo = fread($fp, $imagem['size']);
							$conteudo = addslashes($conteudo);
							fclose($fp);

							$query = "INSERT INTO udescti.equip_img (tipo,imagem) VALUES ('teste','$conteudo')";

							query($query);
							echo "Imagem Salva!<br>";
							echo "<a href='?id=1'>Visualizar</a>";
						}
						else{
							echo "Erro ao carregar a Imagem!";
						}
					}

					echo "<a href=\"ver-imagens.php?id=3\">Imagem 3</a>";
  					echo "<img src='ver-imagens.php?id=3'>";
				 ?>
			</div>
		</div>
	</main>
</body>
</html>