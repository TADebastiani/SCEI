$(document).ready(function(){
		$(".dropdown-button").dropdown();
		
		$('select').select2();
		$(document).on("focus", ".select2", function () {
			$(this).prev().select2('open');
		});
		$("#servidor").load("./cadastroItemV.php?servidor='true'");
		$("#local").load("./cadastroItemV.php?local='true'");


		$('.nobreak').hide();
		$('.pcnot').hide();
		$('.moniproj').hide();

		$('#tipo').on('change', function () {
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

		
  // Initialize collapse button
  $(".button-collapse").sideNav();
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  $('.collapsible').collapsible();
	});