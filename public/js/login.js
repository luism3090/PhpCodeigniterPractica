$(document).on("ready",function()
{

	validaLogin();

	$("#FormLogin").on("submit",function(event)
	{
		event.preventDefault();


		 validaLogin();
		


	});


		function validaLogin()
		{
			


			$('#FormLogin').bootstrapValidator(
			{

		        message: 'This value is not valid',
		        container: 'tooltip',
		        feedbackIcons: {
		            valid: 'glyphicon glyphicon-ok',
		            invalid: 'glyphicon glyphicon-remove',
		            validating: 'glyphicon glyphicon-refresh'
		        },
		        fields: {
		            email: {
		                group: '.input-group',
		                validators: 
		                {
		                    notEmpty: {
		                        message: 'Este campo es requerido'
		                    },
		                     regexp: {
                                regexp: /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/,

                                message: 'La dirección de email no es valida',

                            },

		                }
		            },
		            password: {
		                group: '.input-group',
		                validators: {
		                    notEmpty: {
		                        message: 'Este campo es requerido'
		                    },


		                }
		            }

		        }
		    }).on('success.form.bv', function (e) 
		    {

				e.preventDefault();

				$.ajax(
				{
		          type: "POST",
		          dataType: "json",
		          url: "Login/loginUsuario",
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
				          		location.href ="http://localhost:8080/PHPCodeigniter/index.php/Home";
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

		    });







		}
		

});


