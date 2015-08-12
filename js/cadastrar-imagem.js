$(document).ready(function () {
	$(document).on("focus", ".select2", function () {
		$(this).prev().select2('open');
	});
		
	$('select').select2();

	disableSubmit();

	$('#img').on('change', disableSubmit);
	$('#tipo').on('change', disableSubmit);

})

function disableSubmit () {
	if (($('#tipo').val() == null) || ($('#img').val() == "")){
		console.log($('#tipo').val());
		if (! $('#submit').hasClass('disabled')){
			$('#submit').addClass('disabled');
		}
	}else{
		if ($('#submit').hasClass('disabled')){
			$('#submit').removeClass('disabled');
		}
	}
}