$(document).ready(function(){
		$(document).on("focus", ".select2", function () {
			$(this).prev().select2('open');
		});

		inputDrive 		= $('input:checkbox[name="drive[]"]');
		inputConector 	= $('input:checkbox[name="conector[]"]');
		radioImg 		= $('.modal-content input:radio');

		headerInput		= $(".header-input input, .header-input select");
		patrimonio		= $("#patrimonio");
		lSetor 			= $("#lsetor");
		lDepartamento 	= $("#ldepartamento");
		servidor 		= $("#servidor");
		tipo 			= $("#tipo");
		imgButton 		= $("#img-modal");
		imageCheck 		= $(".image-check");
		submit 			= $("#submit");
		nobreak 		= $(".nobreak");
		nobreakInput 	= $(".nobreak-input");
		pcnot 			= $(".pcnot");
		pcnotInput 		= $(".pcnot-input");
		moniproj 		= $(".moniproj");
		moniprojInput 	= $(".moniproj-input")

		imgButton.attr("disabled",true);
		submit.hide();
		submit.attr('disabled',true);
		nobreak.hide();
		pcnot.hide();
		moniproj.hide();

		servidor.load("./cadastrar-equipamento-v.php?servidor='true'");
		lDepartamento.load("./cadastrar-equipamento-v.php?ldepartamento='true'");
		lDepartamento.on("change", function () {
			lSetor.load("./cadastrar-equipamento-v.php?lsetor="+lDepartamento.val());
		});

		$('input, select').on('change', enableSubmit);
		
		tipo.on('change', function () {
			imgButton.attr('disabled')? imgButton.attr('disabled',false) : false;
			changeImg(tipo.val());
			submit.show();

			if (tipo.val() == 'Nobreak') {
				pcnotInput.attr("required",false);
				inputDrive.prop("checked",false);
				pcnotInput.val("");
				pcnot.hide();
				moniprojInput.attr("required",false);
				inputConector.prop("checked",false);
				moniprojInput.val('');
				moniproj.hide();

				nobreak.show();
				nobreakInput.attr("required",true);
			}

			else if (tipo.val() == 'PC') {
				nobreakInput.attr("required",false);
				nobreakInput.val('');
				nobreak.hide();
				moniprojInput.attr("required",false);
				inputConector.prop("checked",false);
				moniprojInput.val('');
				moniproj.hide();
				
				pcnot.show();
				pcnotInput.attr("required",true);
			}

			else if (tipo.val() == 'Notebook') {
				nobreakInput.attr("required",false);
				nobreakInput.val('');
				nobreak.hide();
				moniprojInput.attr("required",false);
				inputConector.prop("checked",false);
				moniprojInput.val('');
				moniproj.hide();
				
				pcnot.show();
				pcnotInput.attr("required",true);
			}

			else if (tipo.val() == 'Monitor' || tipo.val() == 'Projetor') {
				nobreakInput.attr("required",false);
				nobreakInput.val('');
				nobreak.hide();
				pcnotInput.attr("required",false);
				inputDrive.prop("checked",false);
				pcnotInput.val("");
				pcnot.hide();

				moniproj.show();
				moniprojInput.attr("required",true);
			}

			else {
				nobreakInput.attr("required",false);
				nobreakInput.val('');
				nobreak.hide();
				pcnotInput.attr("required",false);
				inputDrive.prop("checked",false);
				pcnotInput.val("");
				pcnot.hide();
				moniprojInput.attr("required",false);
				inputConector.prop("checked",false);
				moniprojInput.val('');
				moniproj.hide();
			}
		});

		
  $(".button-collapse").sideNav();
  $('.collapsible').collapsible();
  $('.modal-trigger').leanModal({
  		dismissible: false
  });
  $('.materialboxed').materialbox();
  $('.dropdown-button').dropdown({
		belowOrigin: true
	});
  $('select').select2();

});

function enableSubmit () {
	// Easy way
	imageCheck = $(".image-check");

	if( checkInputs(headerInput) && imageCheck.is(':checked') &&//
	  ( checkInputs(nobreakInput) || //
	  (checkInputs(pcnotInput) && inputDrive.is(':checked')) || //
	  (checkInputs(moniprojInput) && inputConector.is(':checked')) ) ) {
	  	console.log('yep');
		submit.attr('disabled',false);
	} else {
		console.clear();
		console.log("header: "+checkInputs(headerInput));
		console.log("image: "+imageCheck.is(':checked'));
		console.log("nobreak: "+checkInputs(nobreakInput));
		console.log("pcnot: "+checkInputs(pcnotInput));
		console.log("drive: "+inputDrive.is(':checked'));
		console.log("moniproj: "+checkInputs(moniprojInput));
		console.log("conector: "+inputConector.is(':checked'));
		console.log('nope');
		submit.attr('disabled',true);
	}
	
}

function checkInputs (input) {
	var state = 0;
	
	input.each(function() {
		if( $(this).val()){
			state ++;
		}else {
			state --;
		}
	})
	
	if (state < input.length){
		return false;
	} else {
		return true;
	}
}

function changeImg(tipo) {
	$.get("./cadastrar-equipamento-v.php?imagem="+tipo, function(data, status) {
		$('#img-table').html(data);
		changeNames();
	});	
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