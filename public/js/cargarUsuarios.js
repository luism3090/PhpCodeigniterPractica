$(document).ready(function()
{
  
    $.ajax(
      {
          type: "POST",
          url: "Usuarios/cargarUsuarios",
          dataType:"json",
          data: "",
           async: true,
          success: function(result)
              {
                var tablaUsuarios = "<tbody>";

                  for(var x=0 ; x < result.usuarios.length ;x++)
                  {

                    tablaUsuarios += "<tr>"+
                                          "<td>"+result.usuarios[x].id_usuario+"</td>"+
                                          "<td>"+result.usuarios[x].id_rol+"</td>"+
                                          "<td>"+result.usuarios[x].nombre+"</td>"+
                                          "<td>"+result.usuarios[x].apellidos+"</td>"+
                                          "<td>"+result.usuarios[x].email+"</td>"+
                                          "<td>"+result.usuarios[x].fecha_registro+"</td>"+
                                          "<td>"+result.usuarios[x].tipoUsuario+"</td>"+
                                      "</tr>";

                  }

                  tablaUsuarios +="</tbody>";

                  

                  $("#tblUsuarios").append(tablaUsuarios);

              },
         error:function(result)
            {
              alert("Error");
             console.log(result.responseText);
              
            }
            
          });
   
});