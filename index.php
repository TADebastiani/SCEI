<?php
include "seguranca.php"; // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
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
	<title>UDESC TI - CEO</title>
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
						echo '<li class="divider"></li>';;
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
					<li class="active"><a href="#">Home<i class="material-icons left">home</i></a></li>
					<li><a class="dropdown-button" href="#!" data-activates="drop-equipamentos">Equipamentos<i class="material-icons left">work</i><i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a class="dropdown-button" href="#!" data-activates="drop-servidor">Servidor<i class="material-icons left">person</i><i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a class="dropdown-button" href="#!" data-activates="drop-local">Local<i class="material-icons left">store</i><i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a href="./logout.php">Logout<i class="material-icons left">exit_to_app</i></a></li>
				</ul>
				<!-- MOBILE -->
				<ul id="mobile-sidenav" class="side-nav">
					<li class="active"><a href="#">Home<i class="material-icons left">home</i></a></li>
					<li class="no-padding">
						<ul id="coll-equipamentos" class="collapsible collapsible-accordion">
							<li class="bold">
								<a class="collapsible-header">Equipamentos<i class="material-icons">work</i></a>
								<div class="collapsible-body">
									<ul>
										<?php
										if ( validaRoot() ) {
										echo '<li><a href="./cadastrar-equipamento.php">Cadastro<i class="material-icons left">assignment</i></a></li>';
										} ?>
										<li><a href="./relatorio-equipamento.php">Relatório<i class="material-icons left">pageview</i></a></li>
										<?php
										if ( validaRoot() ) {
										echo '<li><a href="./cadastrar-imagem.php">Imagens<i class="material-icons left">collections</i></a></li>';
										} ?>
										<li class="divider"></li>
									</ul>
								</div>
							</li>
							<li class="bold">
								<a class="collapsible-header">Servidor<i class="material-icons left">person</i></a>
								<div class="collapsible-body">
									<ul>
										<?php
										if ( validaRoot() ) {
										echo '<li><a href="./cadastrar-servidor.php">Cadastro<i class="material-icons left">assignment</i></a></li>';
										} ?>
										<li><a href="./relatorio-servidor.php">Relatório<i class="material-icons left">pageview</i></a></li>
										<li class="divider"></li>
									</ul>
								</div>
							</li>
							<li class="bold">
								<a class="collapsible-header">Local<i class="material-icons left">store</i></a>
								<div class="collapsible-body">
									<ul>
										<?php
										if ( validaRoot() ) {
										echo '<li><a href="./cadastrar-local.php">Cadastro<i class="material-icons left">assignment</i></a></li>';
										} ?>
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
			<img class="responsive-img" src="./img/logo_udesc_ceo.png">

			<?php 
			if( validaRoot() ) {
				echo  "<div class='row'>
						<ul class='col m12 s12 l6 collapsible popout' data-collapsible='accordion'>
							<li>
								<div class='collapsible-header'><i class='material-icons'>filter_drama</i>Ferramentas de Usuários</div>
								<div class='collapsible-body'>
									<div class='collection'>
										<a class='collection-item' href='./cadastrar-usuario.php'>Criar</a>
										<a class='collection-item' href='./gerenciar-usuario.php'>Gerenciar</a>
									</div>
								</div>
							</li>
						</ul>";
			}
		?>
	</div>
</main>
<footer class="page-footer">
	<div class="container">
		<div class="row">
			<span class="grey-text text-lighten-4"><?php echo "Usuário <span class='grey-text text-lighten-2'>".$_SESSION['usuarioNome']."</span> conectado ".($_SESSION['usuarioRoot']=='Y'? 'com' : 'sem')." direitos de Administrador" ?></span>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			Copyright © <?php echo date("Y"); ?> <a class="grey-text text-lighten-2" href="https://github.com/TADebastiani">Tiago Debastiani</a>.
			<a href="http://www.udesc.br/" class="grey-text text-lighten-4 right">UDESC TI</a>
		</div>
	</div>
</footer>
</body>
</html>