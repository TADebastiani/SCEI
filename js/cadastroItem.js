$(document).ready(function(){
		$(document).on("focus", ".select2", function () {
			$(this).prev().select2('open');
		});

		checkDrive 		= $('input:checkbox[name="drive[]"]');
		checkConector 	= $('input:checkbox[name="drive[]"]');
		radioImg 		= $('input:radio');

		servidor 		= $("#servidor");
		lSetor 			= $("#lsetor");
		lCentro 		= $("#lcentro");
		imgModal 		= $('#img-modal');
		submit 			= $('#submit');
		nobreak 		= $('.nobreak');
		nobreakInput 	= $(".nobreak-input");
		pcnot 			= $('.pcnot');
		pcnotInput 		= $(".pcnot-input");
		moniproj 		= $('.moniproj');
		moniprojInput 	= $(".moniproj-input")
		tipo 			= $('#tipo');
		
		imgModal.attr("disabled",true);
		submit.hide();
		submit.attr('disabled',true);
		nobreak.hide();
		pcnot.hide();
		moniproj.hide();

		servidor.load("./cadastrar-equipamento-v.php?servidor='true'");
		lSetor.load("./cadastrar-equipamento-v.php?lsetor='true'");
		lCentro.load("./cadastrar-equipamento-v.php?lcentro='true'");

		tipo.on('change', function () {
			imgModal.attr('disabled')? imgModal.attr('disabled',false) : false;
			submit.show();

			if (tipo.val() == 'Nobreak') {
				pcnotInput.attr("required",false);
				pcnot.hide();
				moniprojInput.attr("required",false);
				moniproj.hide();

				nobreak.show();
				nobreakInput.attr("required",true);
			}

			else if (tipo.val() == 'PC') {
				nobreakInput.attr("required",false);
				nobreak.hide();
				moniprojInput.attr("required",false);
				moniproj.hide();
				
				pcnot.show();
				pcnotInput.attr("required",true);
			}

			else if (tipo.val() == 'Notebook') {
				nobreakInput.attr("required",false);
				nobreak.hide();
				moniprojInput.attr("required",false);
				moniproj.hide();
				
				pcnot.show();
				pcnotInput.attr("required",true);
			}

			else if (tipo.val() == 'Monitor' || tipo.val() == 'Projetor') {
				nobreakInput.attr("required",false);
				nobreak.hide();
				pcnotInput.attr("required",false);
				pcnot.hide();

				moniproj.show();
				moniprojInput.attr("required",true);
			}

			else {
				nobreakInput.attr("required",false);
				nobreak.hide();
				pcnotInput.attr("required",false);
				pcnot.hide();
				moniprojInput.attr("required",false);
				moniproj.hide();
			}
		});

		
  $(".button-collapse").sideNav();
  $('.collapsible').collapsible();
  $('.modal-trigger').leanModal({
  		dismissible: false
  });
  $('.materialboxed').materialbox();
  $(".dropdown-button").dropdown();
  $('select').select2();

});

function disableButtons () {
	// Easy way
	var checkDrive 		= $('input:checkbox[name="drive[]"]');
	var checkConector 	= $('input:checkbox[name="drive[]"]');
	var radioImg 		= $('input:radio');
	var tipo
}


/* Harder way

function disableSubmit() {
	var checkDrive = $('input:checkbox');
	var checkConector = $('input:checkbox');
	var count = 0;

	for (var i=0; i<checkDrive.length; i++){
		if(checkDrive[i].name != 'drive[]'){
			delete checkDrive[i];
			count++;
		}
	}
	checkDrive = positionSort(checkDrive);
	checkDrive.length-=count;

	count =0;
	for (var i=0; i<checkConector.length; i++){
		if(checkConector[i].name != 'conector[]'){
			delete checkConector[i];
			count++;
		}
	}
	checkConector = positionSort(checkConector);
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

function positionSort (obj) {
	var pos=0;
	for (var i=0; i<obj.length; i++){
		if (obj[i] != undefined){
			obj[pos] = obj[i];
			if (pos != i)
				delete obj[i];

			pos++;
		}
	}
	return obj;
}
*/