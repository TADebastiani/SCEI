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
	<!-- -->
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<script src="./js/index.js"></script>
	<title>UDESC TI - CEO</title>
</head>
<body>
	<header>
		<nav>
			<div class="nav-wrapper">
				<a href="#" data-activates="mobile-sidenav" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
				<a href="#" class="brand-logo right">UDESC TI - CEO</a>
				<ul id="nav-mobile" class="left hide-on-med-and-down">
					<ul id="drop-patrimonio" class="dropdown-content">
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
						<li><a href="./cadastroLocal.php">Cadastro<i class="material-icons left">assignment</i></a></li>
						<li class="divider"></li>
						<li><a href="./verLocal.php">Relatório<i class="material-icons left">pageview</i></a></li>
					</ul>		
					<li class="active"><a href="#">Home<i class="material-icons left">home</i></a></li>
					<li><a class="dropdown-button" href="#!" data-activates="drop-patrimonio">Patrimônio<i class="material-icons left">work</i><i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a class="dropdown-button" href="#!" data-activates="drop-servidor">Servidor<i class="material-icons left">person</i><i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a class="dropdown-button" href="#!" data-activates="drop-local">Local<i class="material-icons left">store</i><i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a href="./logout.php">Logout<i class="material-icons left">exit_to_app</i></a></li>
				</ul>
			<!-- MOBILE -->
				<ul id="mobile-sidenav" class="side-nav">
					<li class="active"><a href="#">Home<i class="material-icons left">home</i></a></li>
					<li class="no-padding">
						<ul id="coll-patrimonio" class="collapsible collapsible-accordion">
							<li class="bold">
								<a class="collapsible-header">Patrimônio<i class="material-icons">work</i></a>
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
		<?php 
		if( validaRoot() ) {
			echo "<div class=\"row\">
					<div class=\"col s12 m7\">
					  <div class=\"card\">
						<div class=\"card-content\">
						  <pan class=\"card-title black-text\"><h4>Ferramentas Admnistrativas</h4></span>
						  <div class='col s12 m12 l6 collection with-header'>
						  	<h5 class='collection-header'>Usuários</h5>
						  	<a class='collection-item' href=\"./cadastroUser.php\">Criar</a>
						  	<a class='collection-item' href=\"./soon.html\">Gerenciar</a>
						  </div>
						  </div>
					  </div>
					</div>
				  </div>";	
		}
		?>
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