$(document).ready( function() {

	$('#filterby, .filtro').on('change', changeSelect);

  $(".button-collapse").sideNav();
  $('.materialboxed').materialbox();
  $('.dropdown-button').dropdown({
		belowOrigin: true
	});
  $('select').select2();
});

function changeSelect(){
	filterby = $("#filterby").val();
	filtro = $(".filtro:checked").val();
	$.get("./relatorio-equipamento-v.php?filterby="+filterby+"&filtro="+filtro, function(data, status) {
		$('#selecao').html(data);
	});
}
