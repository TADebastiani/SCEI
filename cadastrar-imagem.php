<?php
include "seguranca.php"; // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
protegeRoot();
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
	<!-- Select2 -->
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
	<!-- Custom -->
	<script src="./js/index.js"></script>
	<script src="./js/cadastrar-imagem.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<title>Cadastro de Imagem</title>
</head>
<body>
	<header>
		<nav>
			<div class="nav-wrapper">
				<a href="#" data-activates="mobile-sidenav" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
				<a href="#" class="brand-logo right">SCTI-CEO</a>
				<ul id="nav-mobile" class="left hide-on-med-and-down">
					<ul id="drop-equipamentos" class="dropdown-content">
						<?php 
						if( validaRoot() ) {
						echo '<li><a href="./cadastrar-equipamento.php">Cadastro<i class="material-icons left">assignment</i></a></li>';
						echo '<li class="divider"></li>';
						} ?>
						<li><a href="./relatorio-equipamento.php">Relatório<i class="material-icons left">pageview</i></a></li>
						<?php
						if( validaRoot() ) {
						echo '<li class="divider"></li>';
						echo '<li><a href="./cadastrar-imagem.php">Imagens<i class="material-icons left">collections</i></a></li>';
						} ?>
					</ul>
					<ul id="drop-servidor" class="dropdown-content">
						<?php
						if ( validaRoot() ) {
						echo '<li><a href="./cadastrar-servidor.php">Cadastro<i class="material-icons left">assignment</i></a></li>';
						echo '<li class="divider"></li>';
						} ?>
						<li><a href="./relatorio-servidor.php">Relatório<i class="material-icons left">pageview</i></a></li>
					</ul>
					<ul id="drop-local" class="dropdown-content">
						<?php
						if ( validaRoot() ) {
						echo '<li><a href="./cadastrar-local.php">Cadastro<i class="material-icons left">assignment</i></a></li>';
						echo '<li class="divider"></li>';
						} ?>
						<li><a href="./relatorio-local.php">Relatório<i class="material-icons left">pageview</i></a></li>
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
							<li class="bold">
								<a class=" active collapsible-header">Equipamentos<i class="material-icons">work</i></a>
								<div class="collapsible-body">
									<ul>
										<?php
										if ( validaRoot() ) {
										echo '<li><a href="./cadastrar-equipamento.php">Cadastro<i class="material-icons left">assignment</i></a></li>';
										} ?>
										<li><a href="./relatorio-equipamento.php">Relatório<i class="material-icons left">pageview</i></a></li>
										<li class="active"><a href="./cadastrar-imagem.php">Imagens<i class="material-icons left">collections</i></a></li>
									</ul>
								</div>
							</li>
							<li>
								<a class="collapsible-header">Servidor<i class="material-icons left">person</i></a>
								<div class="collapsible-body">
									<ul>
										<?php
										if ( validaRoot() ) {
										echo '<li><a href="./cadastrar-servidor.php">Cadastro<i class="material-icons left">assignment</i></a></li>';
										} ?>
										<li><a href="./relatorio-servidor.php">Relatório<i class="material-icons left">pageview</i></a></li>
										
									</ul>
								</div>
							</li>
							<li>
								<a class="collapsible-header">Local<i class="material-icons left">store</i></a>
								<div class="collapsible-body">
									<ul>
										<?php
										if ( validaRoot() ) {
										echo '<li><a href="./cadastrar-local.php">Cadastro<i class="material-icons left">assignment</i></a></li>';
										} ?>
										<li><a href="./relatorio-local.php">Relatório<i class="material-icons left">pageview</i></a></li>
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
			<h1 class="header">Cadastro de Imagem</h1>
			<form method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col s3 input-field">
						<legend for="tipo">Tipo do Equipamento</legend>
						<select id="tipo" style='width:100%;' name="tipo" required>
							<option selected disabled value="">Selecione...</option>
							<option value="Nobreak">No-break</option>
							<option value="PC">Desktop</option>
							<option value="Notebook">Notebook</option>
							<option value="Monitor">Monitor</option>
							<option value="Projetor">Projetor</option>
						</select>
					</div>
					<div class="col s9 file-field input-field">
						<div class="btn">
							<span>Arquivo</span>
							<input type="file" id="img" name="img" />
						</div>
						<input class="col s8  file-path validate" type="text"/>
					</div>
				</div>
				<p class="center-align">
					<button class=" btn waves-effect waves-light" type="submit" id="submit" name="submit" value="confirmar">Confirmar
						<i class="mdi-content-send right"></i>
					</button>
				</p>
			</form>	

			<div class="row col s6 offset-s4">
				<?php require 'cadastrar-imagem-v.php'; ?>
			</div>
		</div>
	</main>
</body>
</html>