$(document).on("ready",function()
{

	validateLogin();


	$("#login").on("submit",function(event)
	{
		
		event.preventDefault();

		validateLogin();
		 
	});


	function validateLogin()
	{
		$.validate({
					form : '#login',
					language : mi_lenguaje(),
					onSuccess : function($form) 
		 					{
						      
		 						$.ajax(
								{
							          type: "POST",
							          dataType: "json",
							          url: "InicioLogin/loginUsuario",
							          data: {
							          		email: $("#email").val(),
	            							password: $("#password").val(),
							          },
							           async: true,
							          success: function(result)
									          {
									          	console.log(result);
									          	if(result.msjCantidadRegistros > 0)
									          	{
									          		location.href ="http://localhost:8080/PolizasNew/index.php/AccesoSistema";
									          	}
									          	else
									          	{
									          		alert(result.msjNoHayRegistros);
									          	}

									          },
									   error:function(result)
											  {
											  	console.log(result.responseText);
											  	//$("#error").html(data.responseText); 
											  }
						          
						        });

						    },

				  }); 
	}
	
	
});


function mi_lenguaje()
	{
		  MiLeguaje = 
		 {
	        errorTitle: 'Form submission failed!',
	        requiredFields: 'You have not answered all required fields',
	        badTime: 'You have not given a correct time',
	        badEmail: 'Tu direccion de correo electrónico es incorrecta',
	        badTelephone: 'You have not given a correct phone number',
	        badSecurityAnswer: 'You have not given a correct answer to the security question',
	        badDate: 'You have not given a correct date',
	        lengthBadStart: 'Este campo debe contener entre ',
	        lengthBadEnd: ' caracteres',
	        lengthTooLongStart: 'The input value is longer than ',
	        lengthTooShortStart: 'The input value is shorter than ',
	        notConfirmed: 'Input values could not be confirmed',
	        badDomain: 'Incorrect domain value',
	        badUrl: 'The input value is not a correct URL',
	        badCustomVal: 'The input value is incorrect',
	        andSpaces: ' and spaces ',
	        badInt: 'The input value was not a correct number',
	        badSecurityNumber: 'Your social security number was incorrect',
	        badUKVatAnswer: 'Incorrect UK VAT Number',
	        badStrength: 'The password isn\'t strong enough',
	        badNumberOfSelectedOptionsStart: 'You have to choose at least ',
	        badNumberOfSelectedOptionsEnd: ' answers',
	        badAlphaNumeric: 'The input value can only contain alphanumeric characters ',
	        badAlphaNumericExtra: ' and ',
	        wrongFileSize: 'The file you are trying to upload is too large (max %s)',
	        wrongFileType: 'Only files of type %s is allowed',
	        groupCheckedRangeStart: 'Please choose between ',
	        groupCheckedTooFewStart: 'Please choose at least ',
	        groupCheckedTooManyStart: 'Please choose a maximum of ',
	        groupCheckedEnd: ' item(s)',
	        badCreditCard: 'The credit card number is not correct',
	        badCVV: 'The CVV number was not correct',
	        wrongFileDim : 'Incorrect image dimensions,',
	        imageTooTall : 'the image can not be taller than',
	        imageTooWide : 'the image can not be wider than',
	        imageTooSmall : 'the image was too small',
	        min : 'mínimo',
	        max : 'máximo',
	        imageRatioNotAccepted : 'Image ratio is not accepted'
    	}; 

    	return MiLeguaje;
	}
