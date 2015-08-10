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
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<title>Relatório dos Servidores</title>
</head>
<body>
	<header>
		<nav>
			<div class="nav-wrapper">
				<a href="#" data-activates="mobile-sidenav" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
				<a href="#" class="brand-logo right">UDESC TI - CEO</a>
				<ul id="nav-mobile" class="left hide-on-med-and-down">
					<ul id="drop-equipamentos" class="dropdown-content">
						<li><a href="./cadastrar-equipamento.php">Cadastro<i class="material-icons left">assignment</i></a></li>
						<li class="divider"></li>
						<li><a href="./relatorio-equipamento.php">Relatório<i class="material-icons left">pageview</i></a></li>
					</ul>
					<ul id="drop-servidor" class="dropdown-content">
						<li><a href="./cadastrar-servidor.php">Cadastro<i class="material-icons left">assignment</i></a></li>
						<li class="divider"></li>
						<li class="active"><a>Relatório<i class="material-icons left">pageview</i></a></li>
					</ul>
					<ul id="drop-local" class="dropdown-content">
						<li><a href="./cadastrar-local.php">Cadastro<i class="material-icons left">assignment</i></a></li>
						<li class="divider"></li>
						<li><a href="./relatorio-local.php">Relatório<i class="material-icons left">pageview</i></a></li>
					</ul>		
					<li><a href="./index.php">Home<i class="material-icons left">home</i></a></li>
					<li><a class="dropdown-button" href="#!" data-activates="drop-equipamentos">Equipamentos<i class="material-icons left">work</i><i class="material-icons right">arrow_drop_down</i></a></li>
					<li class="active"><a class="dropdown-button" href="#!" data-activates="drop-servidor">Servidor<i class="material-icons left">person</i><i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a class="dropdown-button" href="#!" data-activates="drop-local">Local<i class="material-icons left">store</i><i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a href="./logout.php">Logout<i class="material-icons left">exit_to_app</i></a></li>
				</ul>
			<!-- MOBILE -->
				<ul id="mobile-sidenav" class="side-nav">
					<li class="active"><a href="./index.php">Home<i class="material-icons left">home</i></a></li>
					<li class="no-padding">
						<ul id="coll-equipamentos" class="collapsible collapsible-accordion">
							<li class="bold">
								<a class="collapsible-header">Equipamentos<i class="material-icons">work</i></a>
								<div class="collapsible-body">
									<ul>
										<li><a href="./cadastrar-equipamento.php">Cadastro<i class="material-icons left">assignment</i></a></li>
										<li><a href="./relatorio-equipamento.php">Relatório<i class="material-icons left">pageview</i></a></li>
										<li class="divider"></li>
									</ul>
								</div>
							</li>
							<li>
								<a class="active collapsible-header">Servidor<i class="material-icons left">person</i></a>
								<div class="collapsible-body">
									<ul>
										<li><a href="./cadastrar-servidor.php">Cadastro<i class="material-icons left">assignment</i></a></li>
										<li class="active"><a>Relatório<i class="material-icons left">pageview</i></a></li>
										<li class="divider"></li>
									</ul>
								</div>
							</li>
							<li>
								<a class="collapsible-header">Local<i class="material-icons left">store</i></a>
								<div class="collapsible-body">
									<ul>
										<li><a href="./cadastrar-local.php">Cadastro<i class="material-icons left">assignment</i></a></li>
										<li><a href="./relatorio-local.php">Relatório<i class="material-icons left">pageview</i></a></li>
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
			<h1>Relatório dos Servidores</h1>
			<div id="tabela">
				<?php require_once 'relatorio-servidor-v.php'; ?>
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
				Copyright © <?php echo date("Y"); ?> Text
				<a class="grey-text text-lighten-4 right">UDESC TI</a>
			</div>
		</div>
	</footer>
</body>
</html>