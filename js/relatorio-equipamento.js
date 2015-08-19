$(document).ready( function() {
	$('#patrimonio').on('change', function(){
		value = $(this).val();
		$.get("./relatorio-equipamento-v.php?filtro="+value, function(data, status) {
			$('#tabela').html(data);
			changeNames();
		});
	})
	
	$("#patrimonio").load("./relatorio-equipamento-v.php?patrimonio=true");
	
  $(".button-collapse").sideNav();
  $('.materialboxed').materialbox();
  $('.dropdown-button').dropdown({
		belowOrigin: true
	});
  $('select').select2();
})