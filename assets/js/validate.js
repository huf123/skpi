$(document).ready(function(){    
    // ColorPicker init
    $('.colorpicker').colorpicker();
    
    // jQuery Validation init
	$('#validate').validate({
		highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
	});
});