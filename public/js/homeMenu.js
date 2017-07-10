$(document).ready(function(){
   $('button').click(function(){
       $('.sidebar').toggleClass('fliph');
   });
  
  	


  	$(".sidebar ul li a").on("click",function()
  	{
  	
  		if($(this).parent().find("ul").length == 0 )
  		{
  			$(".sidebar ul li a").removeClass("selecionado");
  			$(this).addClass("selecionado");
  		}

  	})
   
});