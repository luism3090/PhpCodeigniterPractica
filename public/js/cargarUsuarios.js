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
                                          "<td style='display:none' class='id_usuario'>"+result.usuarios[x].id_usuario+"</td>"+
                                          "<td style='display:none' class='id_rol' >"+result.usuarios[x].id_rol+"</td>"+
                                          "<td>"+result.usuarios[x].nombre+"</td>"+
                                          "<td>"+result.usuarios[x].apellidos+"</td>"+
                                          "<td>"+result.usuarios[x].email+"</td>"+
                                          "<td>"+result.usuarios[x].fecha_registro+"</td>"+
                                          "<td>"+result.usuarios[x].tipoUsuario+"</td>"+
                                          "<td class='edit update' ><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></td>"+
                                          "<td class='edit delete'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></td>"+
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
   

    $("body").on("click",".update",function()
    {

          var datosUsuario = {
                               id_usuario : $(this).siblings(".id_usuario").text()          
                             } 

          $.ajax(
          {
              type: "POST",
              url: "Usuarios/getDatosUpdateUsuario",
              dataType:"json",
              data: datosUsuario,
               async: true,
              success: function(result)
                  {
                    //console.log(result);

                    $("#txtNombre").val(result.usuario[0].nombre);
                    $("#txtApellidos").val(result.usuario[0].apellidos);
                    $("#txtEmail").val(result.usuario[0].email);
                    $("#txtIdUsuario").val(result.usuario[0].id_usuario);
                    $("#slTipoUsuario option[value="+result.usuario[0].id_rol+"]").prop('selected', 'selected');

                    $("#modalUpdateUsuario").modal("show");

                  },
             error:function(result)
                {
                  alert("Error");
                 console.log(result.responseText);
                  
                }
                
          });


    });

    $("body").on("click","#btnModificarUsuario",function()
    {

        var datosUsuario = {
                               id_usuario : $("#txtIdUsuario").val(),
                               id_rol: $("#slTipoUsuario").val(),
                               nombre : $("#txtNombre").val(),
                               apellidos: $("#txtApellidos").val(),      
                               email: $("#txtEmail").val()

                             } 

          $.ajax(
          {
              type: "POST",
              url: "Usuarios/updateUsuario",
              dataType:"json",
              data: datosUsuario,
               async: true,
              success: function(result)
                  {
                    //console.log(result);

                    $("#modalAlertaUpdateUsuario .modal-body").html(result.msjConsulta);
                    $("#modalAlertaUpdateUsuario").modal("show");

                     


                  },
             error:function(result)
                {
                  alert("Error");
                 console.log(result.responseText);
                  
                }
                
          });


    });


    $('#modalAlertaUpdateUsuario').on('hide.bs.modal', function (e) 
    {
         location.reload();
    })


    $("body").on("click",".delete",function()
    {

      alert("delete");


    });
  

});