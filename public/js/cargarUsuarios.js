$(document).ready(function()
{

  validaFormUpdateUsuario();
  
    
  
   var inicio=0;
   var fin=5;
   var pagination = true;

    function createTablasusuarios(inicio,fin,pagination)
    {


       $.ajax(
      {
          type: "POST",
          url: "Usuarios/cargarUsuarios",
          dataType:"json",
          data: {"inicio":inicio,"fin":fin},
           async: true,
          success: function(result)
              {
                

                var tablaUsuariosAlta = "";

                  for(var x=0 ; x < result.usuariosAlta.length ;x++)
                  {

                    tablaUsuariosAlta += "<tr>"+
                                          "<td>"+(x+1)+"</td>"+
                                          "<td style='display:none' class='id_usuario'>"+result.usuariosAlta[x].id_usuario+"</td>"+
                                          "<td style='display:none' class='id_rol' >"+result.usuariosAlta[x].id_rol+"</td>"+
                                          "<td>"+result.usuariosAlta[x].nombre+"</td>"+
                                          "<td>"+result.usuariosAlta[x].apellidos+"</td>"+
                                          "<td>"+result.usuariosAlta[x].email+"</td>"+
                                          "<td>"+result.usuariosAlta[x].fecha_registro+"</td>"+
                                          "<td>"+result.usuariosAlta[x].tipoUsuario+"</td>"+
                                          "<td class='edit update' ><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></td>"+
                                          "<td class='edit baja'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></td>"+
                                      "</tr>";

                  }


                  $("#tblUsuariosAlta tbody").html(tablaUsuariosAlta);



                  // creando paginacion

                  if(pagination)
                  {

                      var numPagination = parseInt(result.msjTotalUsuariosAlta) / fin;

                      numPagination =  parseInt(numPagination) + 1; 

                      var  _inicio=0;
                      var _fin = fin;

                      var paginations = '<li class="afterLi recorrer"><a href="#">&laquo;</a></li>';

                      for(var x=1 ;x <= numPagination;x++)
                      {
                        

                        if(x==1)
                        {
                        paginations += '<li class="active num visible" data-inicio='+_inicio+' data-fin='+_fin+'><a href="#" >'+ x +'</a></li>';
                        }
                        else
                        {
                          if(x<=2)
                          {
                            paginations += '<li class="num visible" data-inicio='+_inicio+' data-fin='+_fin+'><a href="#" >'+ x +'</a></li>';
                          }
                          else
                          {
                            paginations += '<li class="num hide" data-inicio='+_inicio+' data-fin='+_fin+' style="display:none" ><a href="#" >'+ x +'</a></li>';
                          }
                          
                        }

                        _inicio = _fin;
                        _fin = _fin + 4 ;
                        
                          
                      
                      }
                      paginations += '<li class="afterLi recorrer"><a href="#">&raquo;</a></li>';


                      $("#pagiTblUsuariosAlta").html(paginations);

                  }

                  




                  var tablaUsuariosBaja = "";

                  for(var x=0 ; x < result.usuariosBaja.length ;x++)
                  {

                    tablaUsuariosBaja += "<tr>"+
                                          "<td>"+(x+1)+"</td>"+
                                          "<td style='display:none' class='id_usuario'>"+result.usuariosBaja[x].id_usuario+"</td>"+
                                          "<td style='display:none' class='id_rol' >"+result.usuariosBaja[x].id_rol+"</td>"+
                                          "<td>"+result.usuariosBaja[x].nombre+"</td>"+
                                          "<td>"+result.usuariosBaja[x].apellidos+"</td>"+
                                          "<td>"+result.usuariosBaja[x].email+"</td>"+
                                          "<td>"+result.usuariosBaja[x].fecha_registro+"</td>"+
                                          "<td>"+result.usuariosBaja[x].tipoUsuario+"</td>"+
                                          "<td class='edit alta'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></td>"+
                                      "</tr>";

                  }


                  $("#tblUsuariosBaja tbody").html(tablaUsuariosBaja);


               

              },
         error:function(result)
            {
              alert("Error");
             console.log(result.responseText);
              
            }
            
          });



    }


  
   createTablasusuarios(inicio,fin,pagination);
   



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


    $('#modalAlertaUsuario').on('hide.bs.modal', function (e) 
    {
         location.reload();
    });


    $('#modalUpdateUsuario').on('hide.bs.modal', function (e) 
    {
         $("#FormUpdateUsuario").bootstrapValidator('resetForm', true);


    })


    $("body").on("click",".baja",function()
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

                    var nombre = result.usuario[0].nombre +" "+result.usuario[0].apellidos;
                    
                    $("#modalBajaUsuario #txtMdlIdUsuario").val(result.usuario[0].id_usuario); 
                    $("#modalBajaUsuario #nombre_usuario").text(nombre); 
                    $("#modalBajaUsuario").modal("show");

                    

                  },
             error:function(result)
                {
                  alert("Error");
                 console.log(result.responseText);
                  
                }
                
          });


    });


    $("body").on("click","#btnMdlBajaUsuario",function()
    {

      var datosUsuario = {
                               id_usuario : $("#modalBajaUsuario #txtMdlIdUsuario").val()      
                        } 

                        

        $.ajax(
          {
              type: "POST",
              url: "Usuarios/bajaUsuario",
              dataType:"json",
              data: datosUsuario,
               async: false,
              success: function(result)
                  {
                    
                    
                    $("#modalAlertaUsuario .modal-body").text(result.msjConsulta);
                    $("#modalAlertaUsuario").modal("show");
                    
                  },
             error:function(result)
                {
                  alert("Error");
                 console.log(result.responseText);
                  
                }
                
          });

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
                                      $("#modalAlertaUsuario .modal-body").html(result.msjConsulta);
                                      $("#modalAlertaUsuario").modal("show");

                                    },
                               error:function(result)
                                  {
                                    alert("Error");
                                   console.log(result.responseText);
                                    
                                  }
                                  
                            });



          });


  }

  $("body").on("click","#pagiTblUsuariosAlta li.num",function(event)
  {

    event.preventDefault();


    var index = $(this).index();

    if(!$(this).hasClass("active"))
    {
      
      var paginacion = false;
      createTablasusuarios($(this).attr("data-inicio"),$(this).attr("data-fin"),paginacion);
    
    }



    $("#pagiTblUsuariosAlta li").removeClass("active");
    $(this).addClass("active");



    
  });


  $("body").on("click","#pagiTblUsuariosAlta li.recorrer",function(event)
  {

    event.preventDefault();

     $("#pagiTblUsuariosAlta li.hide:first").css("display","block");
     $("#pagiTblUsuariosAlta li.visible:first").css("display","none");



  });
  

});