$(document).ready(function(){
	try {
		$("table").tablesorter();
	} catch(e){
			
	}

	changeNames();


})
function changeNames(){
	// Equipamento
	$("table #patrimonio").text('Patrimônio');
	$("table #servidor").text('Servidor Responsável');
	$("table #lsetor").text('Setor');
	$("table #lcentro").text('Centro');
	$("table #tipo").text('Tipo');
	$("table #descr").text('Descrição');

	// Servidor
	$("#nome").text('Nome');
	$("#cargo").text('Cargo');

	// Local
	$("#sala").text('Sala');
	$("#setor").text('Setor');
	$("#centro").text("Centro");

	//Usuarios
	$("#user_id").text("ID");
	$("#username").text("Nome do Usuário");
	$("#login").text("Login");
	$("#password").text("Senha (criptografada)");
	$("#email").text("E-mail");
	$("#root").text("Administrador");


	
}

