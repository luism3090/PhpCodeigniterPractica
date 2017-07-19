$(document).ready(function()
{


	 $.ajax(
          {
              type: "POST",
              url: "Permisos/listaMenuRoles",
              dataType:"json",
              data: {id_rol:'1'},
               async: true,
              success: function(result)
                  {

                    debugger;

                    $("#ulListaPermisos").html(result.rowsMenu);

                    for(var x=0 ; x<=result.elementosMenu.length;x++)
                    {

                    	$("#ulListaPermisos li[data-id-elemento-menu='"+result.elementosMenu[x].id_elemento_menu+"']").prop("checked",true);

                    }


                  },
             error:function(result)
                {
                  alert("Error");
                 $("#formRegistrarUsuario").html(result.responseText);
                 console.log(result.responseText);
                  
                }
                
          });


	 $("body").on("change","#slTipoUsuario",function()
	 {

	 	 $.ajax(
          {
              type: "POST",
              url: "Permisos/listaMenuRoles",
              dataType:"json",
              data: {id_rol:'1'},
               async: true,
              success: function(result)
                  {

                   // debugger;

                    $("#ulListaPermisos").html(result.rowsMenu);

                  },
             error:function(result)
                {
                  alert("Error");
                 $("#formRegistrarUsuario").html(result.responseText);
                 console.log(result.responseText);
                  
                }
                
          });

	 		
	 });

});