$(document).ready(function(){
	try {
		$("table").tablesorter();
	} catch(e){
			
	}

	changeNames();


})
function changeNames(){
	// Equipamento
	$("table #patrimonio").text("Patrimônio");
	$("table #servidor").text("Servidor Responsável");
	$("table #lsetor").text("Setor");
	$("table #ldepartamento").text("Departamento");
	$("table #tipo").text("Tipo");
	$("table #descr").text("Descrição");

	// Servidor
	$("#nome").text("Nome");
	$("#cargo").text("Cargo");

	// Local
	$("#sala").text("Sala");
	$("#setor").text("Setor");
	$("#departamento").text("Departamento");

	// Usuarios
	$("#user_id").text("ID");
	$("#username").text("Nome do Usuário");
	$("#login").text("Login");
	$("#password").text("Senha (criptografada)");
	$("#email").text("E-mail");
	$("#root").text("Administrador");

	// Historico
	$("table #data").text("Data");
	$("#hdescr").text("Descrição");
}

