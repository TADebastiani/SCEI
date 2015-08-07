<?php
include "seguranca.php"; // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
protegeRoot();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- jQuery -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	 <!-- Materialize -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
	<!-- Custom -->
	<script src="./js/tabela.js"></script>
	<script src="./js/index.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<title>Cadastro de Local</title>
</head>
<body>
	<header>
		<nav>
			<div class="nav-wrapper">
				<a href="#" data-activates="mobile-sidenav" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
				<a href="#" class="brand-logo right">UDESC TI - CEO</a>
				<ul id="nav-mobile" class="left hide-on-med-and-down">
					<ul id="drop-equipamentos" class="dropdown-content">
						<li><a href="./cadastroItem.php">Cadastro<i class="material-icons left">assignment</i></a></li>
						<li class="divider"></li>
						<li><a href="./verItem.php">Relatório<i class="material-icons left">pageview</i></a></li>
					</ul>
					<ul id="drop-servidor" class="dropdown-content">
						<li><a href="./cadastroServidor.php">Cadastro<i class="material-icons left">assignment</i></a></li>
						<li class="divider"></li>
						<li><a href="./verServidor.php">Relatório<i class="material-icons left">pageview</i></a></li>
					</ul>
					<ul id="drop-local" class="dropdown-content">
						<li class="active"><a>Cadastro<i class="material-icons left">assignment</i></a></li>
						<li class="divider"></li>
						<li><a href="./verLocal.php">Relatório<i class="material-icons left">pageview</i></a></li>
					</ul>		
					<li><a href="./index.php">Home<i class="material-icons left">home</i></a></li>
					<li><a class="dropdown-button" href="#!" data-activates="drop-equipamentos">Equipamentos<i class="material-icons left">work</i><i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a class="dropdown-button" href="#!" data-activates="drop-servidor">Servidor<i class="material-icons left">person</i><i class="material-icons right">arrow_drop_down</i></a></li>
					<li class="active"><a class="dropdown-button" href="#!" data-activates="drop-local">Local<i class="material-icons left">store</i><i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a href="logout.php">Logout<i class="material-icons left">exit_to_app</i></a></li>
				</ul>
			<!-- MOBILE -->
				<ul id="mobile-sidenav" class="side-nav">
					<li><a href="./index.php">Home<i class="material-icons left">home</i></a></li>
					<li class="no-padding">
						<ul id="coll-equipamentos" class="collapsible collapsible-accordion">
							<li class="bold">
								<a class="collapsible-header">Equipamentos<i class="material-icons">work</i></a>
								<div class="collapsible-body">
									<ul>
										<li><a href="./cadastroItem.php">Cadastro<i class="material-icons left">assignment</i></a></li>
										<li><a href="./verItem.php">Relatório<i class="material-icons left">pageview</i></a></li>
										<li class="divider"></li>
									</ul>
								</div>
							</li>
							<li>
								<a class="collapsible-header">Servidor<i class="material-icons left">person</i></a>
								<div class="collapsible-body">
									<ul>
										<li><a href="./cadastroServidor.php">Cadastro<i class="material-icons left">assignment</i></a></li>
										<li><a href="./verServidor.php">Relatório<i class="material-icons left">pageview</i></a></li>
										<li class="divider"></li>
									</ul>
								</div>
							</li>
							<li>
								<a class="active collapsible-header">Local<i class="material-icons left">store</i></a>
								<div class="collapsible-body">
									<ul>
										<li class="active"><a>Cadastro<i class="material-icons left">assignment</i></a></li>
										<li><a href="./verLocal.php">Relatório<i class="material-icons left">pageview</i></a></li>
										<li class="divider"></li>
									</ul>
								</div>
							</li>
						</ul>		
					</li>
					<li><a href="logout.php">Logout<i class="material-icons left">exit_to_app</i></a></li>
				</ul>
			</div>
		</nav>
	</header>
	<main>
		<div class="container">
			<h1 class="header">Cadastro de Local</h1>
			<form method="post" class="col s12">
				<div class="row">
					<div class="input-field col s1">
						<input type="text" id="sala" name="sala" class="validate" required>
						<label for="sala">Sala</label>
					</div>
					<div class="input-field col s5">
						<input type="text" id="setor" name="setor" class="validate" required>
						<label for="setor">Setor</label>
					</div>
					<div class="input-field col s6">
						<input type="text" id="centro" name="centro" class="validate" required>
						<label for="centro">Centro</label>
					</div>
				</div>
				<p class="center-align">
					<button class=" btn waves-effect waves-light" type="submit" name="submit" value="confirmar">Confirmar
						<i class="mdi-content-send right"></i>
					</button>
				</p>
			</form>
			<div>
				<?php require 'cadastroLocalV.php'; ?>
			</div>
		</div>
	</main>
	<footer class="page-footer">
		<div class="container">
			<div class="row">
				<span class="grey-text text-lighten-4"><?php echo "<span class='grey-text text-lighten-2'>".$_SESSION['usuarioNome']."</span> conectado ".($_SESSION['usuarioRoot']=='Y'? 'com' : 'sem')." direitos de Administrador" ?></span>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				© 2015 Copyright Text
				<a class="grey-text text-lighten-4 right">UDESC TI</a>
			</div>
		</div>
	</footer>
</body>
</html>