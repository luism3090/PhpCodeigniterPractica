$(document).ready(function()
{


	 $.ajax(
          {
              type: "POST",
              url: "Permisos/listaMenuRoles",
              dataType:"json",
              data: {id_rol:'1',id_rol_select:$("#slTipoUsuario").val()},
              async: true,
              success: function(result)
                  {

                    $("#ulListaPermisos").html(result.rowsMenu);

                    for(var x=0 ; x < result.elementosMenu.length;x++)
                    {

                    	$("#ulListaPermisos li[data-id-elemento-menu="+result.elementosMenu[x].id_elemento_menu+"] input").prop("checked","checked");

                    }


                  },
             error:function(result)
                {
                  alert("Error");
                 $("#formRegistrarUsuario").html(result.responseText);
                 console.log(result.responseText);
                  
                }
                
          });


	 $("body").on("submit","#formPermisos",function(event)
	 {
	 	event.preventDefault();


	 	//OBTENER ELEMENTOS PRIMER NIVEL

	 	var datosElementosPrimerNivel = [
	 								
	 							 ];

	 	$("#ulListaPermisos > li").each(function(index)
	 	{
	 		

	 		// arrayElementosMenu = [ { 
		 	// 							nombreElemento: elemento[0].childNodes[0].nodeValue.trim(), 
		 	// 							hijos:[{ 
		 	// 									nombreElementoHijo: elemento[0].childNodes[0].nodeValue.trim()
		 	// 								 }]
	 		// 					   }, 
	 		// 					   { 
	 		// 					   	 	nombreElemento2: "Descripcion" 
	 		// 					   }
	 		// 					];
	 		// debugger;
	 		

	 		var elemento = 
	 		{
	 			elementoJquery:$(this),
	 			nombreElemento: $(this)[0].childNodes[0].nodeValue.trim(),
	 			id_elemento_menu:$(this).attr("data-id-elemento-menu"),
	 			 hijos:[]	
	 		}


	 		datosElementosPrimerNivel.push(elemento);

	 	});

	 	// OBTENER ELEMENTOS SEGUNDO NIVEL
	 

	 	
	 	datosElementosSegundoNivel = [];
	 	
	 	function buildObject(arrayElementosMenu)
	 	{

	 		for(var x=0 ; x < arrayElementosMenu.length ;x++)
	 		{

	 			datosElementosSegundoNivel[x] = getHijosElementosLista(arrayElementosMenu[x]);
	 			
	 		}

	 	}
	 	function getHijosElementosLista(arrayElementosMenu)
	 	{
	 		

	 		arrayElementosHijos = [];

	 		
	 		arrayElementosMenu.elementoJquery.find(">ul > li").each(function(index)
	 		{

	 			

	 			var Hijo = 
	 					{ 
	 						nombreElementoHijo : $(this)[0].childNodes[0].nodeValue.trim(),
	 						elementoJquery : $(this)
	 						
	 					}


	 			arrayElementosHijos.push(Hijo);

	 			

	 		});

	 		

	 		return arrayElementosHijos;

	 	}





	 	buildObject(datosElementosPrimerNivel);
	 	buildObject(datosHijosSegundoNivel);
	 	


	 	console.log(datosElementosPrimerNivel);
	 	console.log(datosElementosSegundoNivel);

	 	
	 	
	 	 

	 });



	 $("body").on("change","#slTipoUsuario",function()
	 {


	 	 $.ajax(
          {
              type: "POST",
              url: "Permisos/listaMenuRoles",
              dataType:"json",
              data: {id_rol:'1',id_rol_select:$("#slTipoUsuario").val()},
               async: true,
              success: function(result)
                  {

                   $("#ulListaPermisos").html(result.rowsMenu);

                   

                    for(var x=0 ; x < result.elementosMenu.length;x++)
                    {

                    	$("#ulListaPermisos li[data-id-elemento-menu="+result.elementosMenu[x].id_elemento_menu+"] > input").prop("checked","checked");

                    }

                  },
             error:function(result)
                {
                  alert("Error");
                 $("#formRegistrarUsuario").html(result.responseText);
                 console.log(result.responseText);
                  
                }
                
          });


	 		
	 });


	$("body").on("click","#ulListaPermisos li > input",function() 
	{
		
		if(!$(this).is(':checked') )
		{
			$(this).parent().find("ul li > input").prop("checked","");
		}
		else
		{
			$(this).parent().find("ul li > input").prop("checked","checked");
		}


		var cantChecks = $(this).closest("ul").find("li input").length;
		var cantCheckeados = $(this).closest("ul").find("li input:not(:checked)").length;


		if(cantCheckeados > 0 )
		{
			$(this).parents("ul").parent("li").find(">input").prop("checked","checked");
			//$(this).closest("ul").parent().find(">input").prop("checked","checked");
		}

		if(cantChecks == cantCheckeados )
		{
			$(this).parents("ul").parent("li").find(">input").prop("checked","");
			//$(this).closest("ul").parent().find("input").prop("checked","");
		}

	});



});