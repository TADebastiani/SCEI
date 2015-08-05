$(document).ready(function(){
	try {
		$("table").tablesorter();
	} catch(e){
			
	}

	changeNames();


})
function changeNames(){
	// Item
	$("#patrimonio").text('Patrimônio');
	$("#servidor").text('Servidor Responsável');
	$("#local").text('Sala');
	$("#tipo").text('Tipo');
	$("#descr").text('Descrição');

	// Servidor
	$("#nome").text('Nome');
	$("#cargo").text('Cargo');

	// Local
	$("#sala").text('Sala');
	$("#setor").text('Setor');
	$("#centro").text("Centro");
}

