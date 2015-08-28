$(document).ready(function(){
  $(".button-collapse").sideNav();
  $('.collapsible').collapsible();
  $('.modal-trigger').leanModal({});
  $('.materialboxed').materialbox();
  $('.dropdown-button').dropdown({
		belowOrigin: true
	});
  $('select').select2();
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
})