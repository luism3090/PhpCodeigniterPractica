$(document).ready(function()
{
  
    validaFormUpdateUsuario();

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
                    $("#txtPassword").val(result.usuario[0].password);
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

    $("body").on("submit","#FormUpdateUsuario",function(event)
    {

      event.preventDefault();

      validaFormUpdateUsuario();

    });


    $('#modalAlertaUpdateUsuario').on('hide.bs.modal', function (e) 
    {
         location.reload();
    });


    $('#modalUpdateUsuario').on('hide.bs.modal', function (e) 
    {
         $("#FormUpdateUsuario").bootstrapValidator('resetForm', true);


    })





    $("body").on("click",".delete",function()
    {

      alert("delete");


    });




  function validaFormUpdateUsuario()
  {


        $('#FormUpdateUsuario').bootstrapValidator(
        {

              message: 'This value is not valid',
              container: 'tooltip',
              feedbackIcons: {
                  valid: 'glyphicon glyphicon-ok',
                  invalid: 'glyphicon glyphicon-remove',
                  validating: 'glyphicon glyphicon-refresh'
              },
              fields: {
                  txtNombre: {
                     group: '.form-group',
                      validators: 
                      {
                          notEmpty: {
                              message: 'Este campo es requerido'
                          },
                          

                      }
                  },
                  txtApellidos: {
                      group: '.form-group',
                      validators: {
                          notEmpty: {
                              message: 'Este campo es requerido'
                          },
                          


                      }
                  },
                  txtEmail: {
                    group: '.form-group',
                    validators: 
                    {
                        notEmpty: {
                            message: 'Este campo es requerido'
                        },
                         regexp: {
                                regexp: /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/,

                                message: 'La dirección de email no es válida',

                            },
                            callback: {
                            message: 'El Email ingresado no esta disponible',
                            callback: function(value, validator) {
                                // Get the selected options

                                var valida = true;

                                var datosUsuario = {
                                                      id_usuario : $("#txtIdUsuario").val(),
                                                      email:$("#txtEmail").val()
                                                    }


                                            $.ajax(
                                            {
                                                type: "POST",
                                                url: "Usuarios/checkEmail",
                                                dataType:"json",
                                                data: datosUsuario,
                                                 async: false,
                                                success: function(result)
                                                    {
                                                      if(result.msjCantidadRegistros > 0)
                                                      {
                                                         valida = false;
                                                      }
                                                      else
                                                      {
                                                        valida = true;
                                                      }

                                                     
                                                      
                                                    },
                                               error:function(result)
                                                  {
                                                    alert("Error");
                                                   console.log(result.responseText);
                                                    
                                                  }
                                                  
                                            });

                                            return valida;

                                // var options = validator.getFieldElements('colors').val();
                                // return (options != null && options.length >= 2 && options.length <= 4);
                            }
                        },

                    }
                },
                txtPassword: {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Este campo es requerido'
                        },
                        stringLength: {
                            enabled: true,
                            min: 5,
                            max: 20,
                            message: 'El password debe contener como mínimo 5 caracteres y 20 como máximo'
                        },

                    }
                },
                 slTipoUsuario: {
                  group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Seleciona un tipo de usuario.'
                        }
                    }
                }


          }
        }).on('success.form.bv', function (e) {
              
               var datosUsuario = {
                                 id_usuario : $("#txtIdUsuario").val(),
                                 id_rol: $("#slTipoUsuario").val(),
                                 nombre : $("#txtNombre").val(),
                                 apellidos: $("#txtApellidos").val(),      
                                 email: $("#txtEmail").val(),
                                 password: $("#txtPassword").val()

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
                                      $('#modalUpdateUsuario').modal('hide');
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


  }
  

});