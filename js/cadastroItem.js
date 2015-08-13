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
	 checkDrive = $('input:checkbox');
	 checkConector = $('input:checkbox');
	 count = 0;

	for (var i=0; i<checkDrive.length; i++){
		if(checkDrive[i].name != 'drive[]'){
			delete checkDrive[i];
			count++;
		}
	}
	checkDrive.length-=count;
	count =0;
	for (var i=0; i<checkConector.length; i++){
		if(checkConector[i].name != 'conector[]'){
			delete checkConector[i];
			count++;
		}
	}
	var pos=0;
	for (var i=0; i<checkConector.length; i++){
		if (checkConector[i] != undefined){
			checkConector[pos] = checkConector[i];
			delete checkConector[i];
			pos++;
		}
	}
	checkConector.length-=count;
}


var pos=0;
for (var i=0; i<checkConector.length; i++){
	if (checkConector[i] != undefined){
		checkConector[pos] = checkConector[i];
		delete checkConector[i];
		pos++;
	}
}