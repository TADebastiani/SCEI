$(document).ready(function(){
		$(".dropdown-button").dropdown();
		
		
		$(document).on("focus", ".select2", function () {
			$(this).prev().select2('open');
		});
		
		$('select').select2();

		$("#servidor").load("./cadastrar-equipamento-v.php?servidor='true'");
		$("#lsetor").load("./cadastrar-equipamento-v.php?lsetor='true'");
		$("#lcentro").load("./cadastrar-equipamento-v.php?lcentro='true'");
		
		$('#submit').hide();
		$('.nobreak').hide();
		$('.pcnot').hide();
		$('.moniproj').hide();


		$('#tipo').on('change', function () {
			$('#submit').show();
			if ($('#tipo').val() == 'Nobreak') {
				$(".pcnot-input").attr("required",false);
				$('.pcnot').hide();
				$(".moniproj-input").attr("required",false);
				$('.moniproj').hide();

				$('.nobreak').show();
				$(".nobreak-input").attr("required",true);
			}

			else if ($('#tipo').val() == 'PC') {
				$(".nobreak-input").attr("required",false);
				$('.nobreak').hide();
				$(".moniproj-input").attr("required",false);
				$('.moniproj').hide();
				
				$('.pcnot').show();
				$(".pcnot-input").attr("required",true);
			}

			else if ($('#tipo').val() == 'Notebook') {
				$(".nobreak-input").attr("required",false);
				$('.nobreak').hide();
				$(".moniproj-input").attr("required",false);
				$('.moniproj').hide();
				
				$('.pcnot').show();
				$(".pcnot-input").attr("required",true);
			}

			else if ($('#tipo').val() == 'Monitor' || $('#tipo').val() == 'Projetor') {
				$(".nobreak-input").attr("required",false);
				$('.nobreak').hide();
				$(".pcnot-input").attr("required",false);
				$('.pcnot').hide();

				$('.moniproj').show();
				$(".moniproj-input").attr("required",true);
			}

			else {
				$(".nobreak-input").attr("required",false);
				$('.nobreak').hide();
				$(".pcnot-input").attr("required",false);
				$('.pcnot').hide();
				$(".moniproj-input").attr("required",false);
				$('.moniproj').hide();
			}
		
		});

		
  $(".button-collapse").sideNav();
  $('.collapsible').collapsible();
  $('.modal-trigger').leanModal({
  		dismissible: false
  });
  $('.materialboxed').materialbox();
});

function disableSubmit () {
	
}
