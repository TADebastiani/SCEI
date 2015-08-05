$(document).ready( function() {
	$('.filtro').on('change', function(){
		if ($('#nenhum').is(':checked')){
			$.get("./verItemV.php", function(data, status) {
				$('#tabela').html(data);
				changeNames();
			});
		} else if ($('#fNobreak').is(':checked')){
			$.get("./verItemV.php?filtro=Nobreak", function(data, status) {
				$('#tabela').html(data);
				changeNames();
			});
		} else if ($('#fMonitor').is(':checked')){
			$.get("./verItemV.php?filtro=Monitor", function(data, status) {
				$('#tabela').html(data);
				changeNames();
			});
		} else if ($('#fPC').is(':checked')){
			$.get("./verItemV.php?filtro=PC", function(data, status) {
				$('#tabela').html(data);
				changeNames();
			});
		}
	})
})