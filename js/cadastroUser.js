$(document).ready(function() {
	$('#password').on('input', function() {
		validate()
	});
	$('#password2').on('input',  function() {
		validate()
	});

	function validate() {
		if ( $('#password').val() != '' ) {
			if( $('#password').val() == $('#password2').val() ) {
				$('#password').removeClass('invalid');
				$('#password2').removeClass('invalid');
				
				$('#password').addClass('valid');
				$('#password2').addClass('valid');
			} else {
				$('#password').removeClass('valid');
				$('#password2').removeClass('valid');

				$('#password').addClass('invalid');
				$('#password2').addClass('invalid');
			}
		}
	}
})