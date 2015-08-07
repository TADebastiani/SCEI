<?php
include "seguranca.php"; // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
 ?>
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
	<!-- Tablesorter -->
	<script src="./tablesorter/jquery.tablesorter.js"></script>
	<link rel="stylesheet" href="./tablesorter/themes/blue/custom_style.css">
	<!-- Custom -->
	<script src="./js/tabela.js"></script>
	<script src="./js/index.js"></script>
	<script src="./js/verItem.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<title>Relatório dos Equipamentos</title>
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
						<li class="active"><a>Relatório<i class="material-icons left">pageview</i></a></li>
					</ul>
					<ul id="drop-servidor" class="dropdown-content">
						<li><a href="./cadastroServidor.php">Cadastro<i class="material-icons left">assignment</i></a></li>
						<li class="divider"></li>
						<li><a href="./verServidor.php">Relatório<i class="material-icons left">pageview</i></a></li>
					</ul>
					<ul id="drop-local" class="dropdown-content">
						<li><a href="./cadastroLocal.php">Cadastro<i class="material-icons left">assignment</i></a></li>
						<li class="divider"></li>
						<li><a href="./verLocal.php">Relatório<i class="material-icons left">pageview</i></a></li>
					</ul>		
					<li><a href="./index.php">Home<i class="material-icons left">home</i></a></li>
					<li class="active"><a class="dropdown-button" href="#!" data-activates="drop-equipamentos">Equipamentos<i class="material-icons left">work</i><i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a class="dropdown-button" href="#!" data-activates="drop-servidor">Servidor<i class="material-icons left">person</i><i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a class="dropdown-button" href="#!" data-activates="drop-local">Local<i class="material-icons left">store</i><i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a href="./logout.php">Logout<i class="material-icons left">exit_to_app</i></a></li>
				</ul>
			<!-- MOBILE -->
				<ul id="mobile-sidenav" class="side-nav">
					<li><a href="./index.php">Home<i class="material-icons left">home</i></a></li>
					<li class="no-padding">
						<ul id="coll-equipamentos" class="collapsible collapsible-accordion">
							<li>
								<a class="active collapsible-header">Equipamentos<i class="material-icons">work</i></a>
								<div class="collapsible-body">
									<ul>
										<li><a href="./cadastroItem.php">Cadastro<i class="material-icons left">assignment</i></a></li>
										<li class="active"><a>Relatório<i class="material-icons left">pageview</i></a></li>
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
								<a class="collapsible-header">Local<i class="material-icons left">store</i></a>
								<div class="collapsible-body">
									<ul>
										<li><a href="./cadastroLocal.php">Cadastro<i class="material-icons left">assignment</i></a></li>
										<li><a href="./verLocal.php">Relatório<i class="material-icons left">pageview</i></a></li>
										<li class="divider"></li>
									</ul>
								</div>
							</li>
						</ul>		
					</li>
					<li><a href="./logout.php">Logout<i class="material-icons left">exit_to_app</i></a></li>
				</ul>
			</div>
		</nav>
	</header>
	<main>
		<div class="container">
			<h2 class="header">Relatório dos Equipamentos</h2>
			<div class="input-field row">
				<legend>Filtro:</legend>
				<div class="col s3">
					<input type="radio" id="nenhum" name="filtro" value="" class="filtro" checked>
					<label for="nenhum">Nenhum</label>
				</div>
				<div class="col s3">
					<input type="radio" id="fNobreak" name="filtro" value="Nobreak" class="filtro">
					<label for="fNobreak">Nobreak</label>
				</div>
				<div class="col s3">
					<input type="radio" id="fPC" name="filtro" value="PC" class="filtro">
					<label for="fPC">PC</label>
				</div>
				<div class="col s3">
					<input type="radio" id="fMonitor" name="filtro" value="Monitor" class="filtro">
					<label for="fMonitor">Monitor</label>
				</div>
			</div>
			<div id="tabela">
				<?php require_once 'verItemV.php'; ?>
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