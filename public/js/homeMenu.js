$(document).ready(function(){
   $('button').click(function(){
       //$('.sidebar').toggleClass('fliph');
   });
  
  	
  	$(".sidebar ul li a").on("click",function()
  	{
  	
  		if($(this).parent().find("ul").length == 0 )
  		{
  			$(".sidebar ul li a").removeClass("selecionado");
  			$(this).addClass("selecionado");
  		}

  	});


    $("#btnCerrarSesion").on("click",function(event)
  {
      event.preventDefault();

       //console.log("aaa");

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

    // validaLogin();
    


  });


   
});