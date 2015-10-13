$(document).ready( function() {

	changeSelect();
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
	console.log(filterby+"");
	if (filterby == "Todos"){
		$('#selecao').attr("disabled",true);
	}else{
		$('#selecao').attr("disabled",false);
		$.get("./relatorio-equipamento-v.php?filterby="+filterby+"&filtro="+filtro, function(data, status) {
			$('#selecao').html(data);
		});
	}
}
