<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<!-- jQuery -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Validation Plugin -->
	<script src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>
	 <!-- Materialize -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
	<!-- -->
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<title>Cadastro de Usuário</title>
</head>
<body>
	<nav>
		<div class="nav-wrapper">
			
		</div>
	</nav>
	<div class="container">
		<h1 class="center-align">Login</h1>
		<form method="post" action="loginV.php" class="col s12">
			<div class="row">
				<div class="input-field col s6 offset-s3">
					<input type="text" id="login" name="login" length="10" required>
					<label for="login">Login</label>
				</div>
				<div class="input-field col s6 offset-s3">
					<input type="password" id="password" name="password" length="10" required>
					<label for="password">Senha</label>
				</div>
			</div>
			<br>
			<p class="center-align">
				<button class=" btn waves-effect waves-light" type="submit" name="submit" value="confirmar">
				Conectar
					<i class="mdi-content-send right"></i>
				</button>
			</p>
		</form>
	</div>
</body>
</html>
