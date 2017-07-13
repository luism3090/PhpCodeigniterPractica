$(document).ready(function()
{

    $("#btnCerrarSesion").on("click",function()
    {

       $.ajax(
        {
              type: "POST",
              dataType: "json",
              url: "Home/cerrarSesion",
              data: "",
               async: true,
              success: function(result)
                  {
                    
                    if(!result.sesion)
                    {
                      location.href = result.base_url;
                    }
                  

                  },
           error:function(result)
              {
                
                console.log(result.responseText);
                //$("#error").html(data.responseText); 
              }
              
            });

    });

    

  });


  