<?php
include "seguranca.php"; // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
protegeRoot();
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
	<!-- Select2 -->
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
	<!-- -->
	<script src="./js/cadastroItem.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<title>Cadastro de Item</title>
</head>
<body>
<header>
		<nav>
			<div class="nav-wrapper">
				<a href="#" data-activates="mobile-sidenav" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
				<a href="#" class="brand-logo right">UDESC TI - CEO</a>
				<ul id="nav-mobile" class="left hide-on-med-and-down">
					<ul id="drop-patrimonio" class="dropdown-content">
						<li class="active"><a>Cadastro<i class="material-icons left">assignment</i></a></li>
						<li class="divider"></li>
						<li><a href="./verItem.php">Relatório<i class="material-icons left">pageview</i></a></li>
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
					<li class="active"><a class="dropdown-button" href="#!" data-activates="drop-patrimonio">Patrimônio<i class="material-icons left">work</i><i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a class="dropdown-button" href="#!" data-activates="drop-servidor">Servidor<i class="material-icons left">person</i><i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a class="dropdown-button" href="#!" data-activates="drop-local">Local<i class="material-icons left">store</i><i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a href="./logout.php">Logout<i class="material-icons left">exit_to_app</i></a></li>
				</ul>
			<!-- MOBILE -->
				<ul id="mobile-sidenav" class="side-nav">
					<li><a href="./index.php">Home<i class="material-icons left">home</i></a></li>
					<li class="no-padding">
						<ul id="coll-patrimonio" class="collapsible collapsible-accordion">
							<li class="bold">
								<a class=" active collapsible-header">Patrimônio<i class="material-icons">work</i></a>
								<div class="collapsible-body">
									<ul>
										<li class="active"><a>Cadastro<i class="material-icons left">assignment</i></a></li>
										<li><a href="./verItem.php">Relatório<i class="material-icons left">pageview</i></a></li>
									</ul>
								</div>
							</li>
							<li>
								<a class="collapsible-header">Servidor<i class="material-icons left">person</i></a>
								<div class="collapsible-body">
									<ul>
										<li><a href="./cadastroServidor.php">Cadastro<i class="material-icons left">assignment</i></a></li>
										<li><a href="./verServidor.php">Relatório<i class="material-icons left">pageview</i></a></li>
										
									</ul>
								</div>
							</li>
							<li>
								<a class="collapsible-header">Local<i class="material-icons left">store</i></a>
								<div class="collapsible-body">
									<ul>
										<li><a href="./cadastroLocal.php">Cadastro<i class="material-icons left">assignment</i></a></li>
										<li><a href="./verLocal.php">Relatório<i class="material-icons left">pageview</i></a></li>
									</ul>
								</div>
							</li>
						</ul>		
					</li>
					<li><a href="./logout.php">Logout<i class="material-icons left">exit_to_app</i></a></li>
				</ul>
			</div>
		</nav>
	</header>	<main>
		<div class="container">
			<h1 class="header">Cadastro de item</h1>
			<form method="post" class="col s12">
				<div class="row">
					<div class="input-field col s6">
						<input type="text" class="validate" id="patrimonio" name="patrimonio" required>
						<label for="patrimonio">Patrimônio</label>
					</div>
					<div class="input-field col s6">
						<legend for="local">Local</legend>
						<select type="text" id="local" name="local" required>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">			
						<!--
						<input type="text" id="servidor" name="servidor" class="validate" required>
						-->
						<legend for="servidor">Servidor Responsável</legend>
						<select id="servidor" name="servidor" class="validate">
						</select>
					</div>
					<div class="input-field col s6">
						<legend for="tipo">Tipo do Equipamento</legend>
						<select id="tipo" name="tipo" required>
							<option selected disabled value="">Selecione...</option>
							<option value="Nobreak">No-break</option>
							<option value="PC">Desktop</option>
							<option value="Notebook">Notebook</option>
							<option value="Monitor">Monitor</option>
							<option value="Projetor">Projetor</option>
						</select>
					</div>
				</div>
				
				<fieldset class="nobreak">
<!-- NOBREAK -->				
					<legend>No-Break</legend>
					<div class="row">
						<div class="input-field col s4">
							<input type="text" id="nmarca" name="nmarca" class="nobreak-input validate">
							<label for="nmarca">Marca</label>
						</div>
						<div class="input-field col s4">
							<input type="text" id="nmodelo" name="nmodelo" class="nobreak-input validate">
							<label for="nmodelo">Modelo</label>
						</div>
						<div class="input-field col s4">
							<input type="text" id="potencia" name="potencia" class="nobreak-input validate">
							<label for="potencia">Potência</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s4">
							<select name="ventrada" id="ventrada" class="nobreak-input">
								<option selected disabled value="">Selecione...</option>
								<option value="110V">110 V</option>
								<option value="220V">220 V</option>
								<option value="110/220V">110/220 V</option>	
							</select>
							<label for="ventrada">Voltagem  de Entrada</label>
						</div>
						<div class="input-field col s4">
							<select name="vsaida" id="vsaida" class="nobreak-input">
								<option selected disabled value="">Selecione...</option>
								<option value="110V">110 V</option>
								<option value="220V">220 V</option>
							</select>
							<label for="vsaida">Voltagem de Saída</label>
						</div>
						<div class="input-field col s4">
							<input type="text" id="plugue" name="plugue" class="nobreak-input validate">
							<label for="plugue">Plugue</label>
						</div>
					</div>
				</fieldset>
<!-- PC/NOT -->				
				<fieldset class="pcnot">
					<legend>Desktop / Notebook</legend>
					<div class="row">
						<div class="input-field col s4">
							<input type="text" name="sistop" class="pcnot-input validate">
							<label for="sistop">Sistema Operacional</label>
						</div>
						<div class="input-field col s4">
							<input type="text" id="mboard" name="mboard" class="pcnot-input validate">
							<label for="mboard">Placa Mãe</label>
						</div>
						<div class="input-field col s4">
							<input type="text" id="cpu" name="cpu" class="pcnot-input validate">
							<label for="cpu">Processador</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s4">
							<input type="text" id="memoria" name="memoria" class="pcnot-input validate">
							<label for="memoria">Memória</label>
						</div>
						<div class="input-field col s4">
							<input type="text" id="hd" name="hd" class="pcnot-input validate">
							<label for="hd">HD</label>
						</div>
						<div class="input-field col s4">
							<legend>Drive:</legend>
							<div class="col s3">
								<input type="checkbox" id="drivecd" name="drive[]" value="CD">
								<label for="drivecd">CD</label>
							</div>
							<div class="col s3">
								<input type="checkbox" id="drivedvd" name="drive[]" value="DVD">
								<label for="drivedvd">DVD</label>
							</div>
							<div class="col s6">
								<input type="checkbox" id="drivebluray" name="drive[]" value="BluRay">
								<label for="drivebluray">Blu-Ray</label>
							</div>
						</div>
					</div>
				</fieldset>
<!-- MONI/PROJ -->
				<fieldset class="moniproj">
					<legend>Monitor / Projetor</legend>
					<div class="row">
						<div class="input-field col s4">
							<input type="text" id="pmarca" name="pmarca" class="moniproj-input validate">
							<label for="pmarca">Marca</label>
						</div>
						<div class="input-field col s4">
							<input type="text" id="pmodelo" name="pmodelo" class="moniproj-input validate">
							<label for="pmodelo">Modelo</label>
						</div>
						<div class="input-field col s4">
							<select id="pvoltagem" name="pvoltagem">
								<option selected disabled>Selecione...</option>
								<option value="110V">110 V</option>
								<option value="220V">220 V</option>
								<option value="110/220V">110/220 V</option>	
							</select>
							<label for="pvoltagem">Voltagem de Entrada</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input type="text" id="resolucao" name="resolucao" class="moniproj-input validate">
							<label for="resolucao">Resolução</label>
						</div>
						<div class="input-field col s6">
							<legend>Conectores:</legend>
							<div class="col s4">
								<input type="checkbox" id="conectvga" name="conector[]" value="VGA">
								<label for="conectvga">VGA</label>
							</div>
							<div class="col s4">
								<input type="checkbox" id="conectdvi" name="conector[]" value="DVI">
								<label for="conectdvi">DVI</label>
							</div>
							<div class="col s4">
								<input type="checkbox" id="conecthdmi" name="conector[]" value="HDMI">
								<label for="conecthdmi">HDMI</label>
							</div>
						</div>
					</div>
				</fieldset>
				<p class="center-align">
					<button class=" btn waves-effect waves-light" type="submit" name="submit" value="confirmar">Confirmar
						<i class="mdi-content-send right"></i>
					</button>
				</p>
			</form>
			<div>
			<?php require 'cadastroItemV.php'; ?>
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