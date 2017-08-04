$(document).ready(function()
{

  validaFormUpdateUsuario();
  

    // function createTablasusuarios()
    // {

    //    $.ajax(
    //   {
    //       type: "POST",
    //       url: "Usuarios/cargarUsuarios",
    //       dataType:"json",
    //       data:'',
    //        async: true,
    //       success: function(result)
    //           {
                
              
    //             var tablaUsuariosAlta = "";

    //               for(var x=0 ; x < result.usuariosAlta.length ;x++)
    //               {

    //                 tablaUsuariosAlta += "<tr data-id-usuario='"+result.usuariosAlta[x].id_usuario+"' data-id-rol='"+result.usuariosAlta[x].id_rol+"' >"+
    //                                         "<td>"+(x+1)+"</td>"+
    //                                         // "<td class='id_usuario'>"+result.usuariosAlta[x].id_usuario+"</td>"+
    //                                         // "<td class='id_rol' >"+result.usuariosAlta[x].id_rol+"</td>"+
    //                                         "<td>"+result.usuariosAlta[x].nombre+"</td>"+
    //                                         "<td>"+result.usuariosAlta[x].apellidos+"</td>"+
    //                                         "<td>"+result.usuariosAlta[x].email+"</td>"+
    //                                         "<td>"+result.usuariosAlta[x].fecha_registro+"</td>"+
    //                                         "<td>"+result.usuariosAlta[x].tipoUsuario+"</td>"+
    //                                         "<td class='edit update' ><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></td>"+
    //                                         "<td class='edit baja'><span class='glyphicon glyphicon-circle-arrow-down' aria-hidden='true'></span></td>"+
    //                                       "</tr>";

    //               }


    //               $("#tblUsuariosAlta tbody").empty().append(tablaUsuariosAlta);
    //               $('#tblUsuariosAlta').DataTable({
    //                                                   "language": {
    //                                                                 "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    //                                                               },
    //                                                           "scrollY":        "500px",
    //                                                           "scrollCollapse": true,
    //                                             }
                                                            
    //                                         );

                                             

    //               var tablaUsuariosBaja = "";

    //               for(var x=0 ; x < result.usuariosBaja.length ;x++)
    //               {

    //                 tablaUsuariosBaja += "<tr data-id-usuario='"+result.usuariosBaja[x].id_usuario+"' data-id-rol='"+result.usuariosBaja[x].id_rol+"'>"+
    //                                       "<td>"+(x+1)+"</td>"+
    //                                       // "<td>"+result.usuariosBaja[x].id_usuario+"</td>"+
    //                                       // "<td>"+result.usuariosBaja[x].id_rol+"</td>"+
    //                                       "<td>"+result.usuariosBaja[x].nombre+"</td>"+
    //                                       "<td>"+result.usuariosBaja[x].apellidos+"</td>"+
    //                                       "<td>"+result.usuariosBaja[x].email+"</td>"+
    //                                       "<td>"+result.usuariosBaja[x].fecha_registro+"</td>"+
    //                                       "<td>"+result.usuariosBaja[x].tipoUsuario+"</td>"+
    //                                       "<td class='edit alta'><span class='glyphicon glyphicon-circle-arrow-up' aria-hidden='true'></span></td>"+
    //                                   "</tr>";

    //               }

    //               $("#tblUsuariosBaja tbody").empty().append(tablaUsuariosBaja);
    //               $('#tblUsuariosBaja').DataTable({
    //                                                   "language": {
    //                                                                 "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    //                                                               },
    //                                                           //   "columnDefs": [
    //                                                           //     {
    //                                                           //         "targets": [ 1 ],
    //                                                           //         "visible": false,
    //                                                           //         "searchable": false
    //                                                           //     },
    //                                                           //     {
    //                                                           //         "targets": [ 2 ],
    //                                                           //         "visible": false
    //                                                           //     },

    //                                                           // ],
    //                                                           "scrollY":        "500px",
    //                                                           "scrollCollapse": true,
    //                                             }
                                                            
    //                                         );


               

    //           },
    //      error:function(result)
    //         {
    //           alert("Error");
    //          console.log(result.responseText);
              
    //         }
            
    //       });



    // }



  var tableUsersAlta = $('#tblUsuariosAlta').DataTable( 
      {
        "processing": true,
        "serverSide": true,
         "select": 'single',
         "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                      },
                  "scrollY":        "500px",
                  "scrollCollapse": true,
        "ajax":{
          url :"Usuarios/cargarUsuariosAlta", 
          type: "post",  
          error: function(d){ 
            $(".employee-grid-error").html("");
            $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No se encontraron datos</th></tr></tbody>');
            $("#employee-grid_processing").css("display","none");
            
          },
          // ,
          // success:function(d)
          // {
          //  debugger;
          // }
        },
        "columnDefs": [
                      {
                          "targets": [ 0 ],
                          "visible": false,
                          "searchable": false
                      },
                      {
                          "targets": [ 1 ],
                          "visible": false,
                          "searchable": false
                      }
                  ],
        

      } );


  var tableUsersBaja = $('#tblUsuariosBaja').DataTable( 
      {
        "processing": true,
        "serverSide": true,
         "select": 'single',
         "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                      },
                  "scrollY":        "500px",
                  "scrollCollapse": true,
        "ajax":{
          url :"Usuarios/cargarUsuariosBaja", 
          type: "post",  
          error: function(d){ 
            $(".employee-grid-error").html("");
            $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No se encontraron datos</th></tr></tbody>');
            $("#employee-grid_processing").css("display","none");
            
          },
          // ,
          // success:function(d)
          // {
          //  debugger;
          // }
        },
        "columnDefs": [
                      {
                          "targets": [ 0 ],
                          "visible": false,
                          "searchable": false
                      },
                      {
                          "targets": [ 1 ],
                          "visible": false,
                          "searchable": false
                      }
                  ],
        

      } );


   //createTablasusuarios2();
   

// FUNCIONES PARA ACTUALIZAR USUARIOS 

    $("body").on("click",".updateUsersAlta",function()
    {
      

          var datosUsuario = {
                               id_usuario : tableUsersAlta.rows($(this).closest("tr").index()).data().pluck(0)[0]       
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

                   // console.log(result);
    
                    if(typeof(result.baja) == "undefined") 
                    {

                      $("#txtNombre").val(result.usuario[0].nombre);
                      $("#txtApellidos").val(result.usuario[0].apellidos);
                      $("#txtEmail").val(result.usuario[0].email);
                      $("#txtIdUsuario").val(result.usuario[0].id_usuario);
                      $("#txtPassword").val(result.usuario[0].password);
                      $("#slTipoUsuario option[value="+result.usuario[0].id_rol+"]").prop('selected', 'selected');
                      var urlFoto = "";

                      if(result.usuario[0].foto!="default_avatar.png")
                      {
                          urlFoto = result.base_url+result.usuario[0].foto;
                      }
                      
                        
                        var urlFotoDefault = result.base_url+"default_avatar.png";


                           $('#fileFoto').fileinput('destroy');

                           $('#fileFoto').fileinput({
                                showUpload: false,
                                browseOnZoneClick: true,              
                                language: 'es',
                                maxFileCount: 1,
                                showClose: false,
                                showCaption: false,
                                maxFileSize: 1500,
                                theme: 'explorer',                
                                allowedFileExtensions: ['jpg','png'],
                                initialPreviewAsData: true,
                                initialPreview: urlFoto,
                                initialPreviewConfig: [
                                                {
                                                    caption: result.usuario[0].foto, 
                                                    width: '120px', 
                                                    url: urlFoto, // server delete action 
                                                    key: 100, 
                                                    extra: {id: 100}
                                                }
                                            ],
                               defaultPreviewContent: '<img src="'+urlFotoDefault+'" alt="Tu Avatar" style="width:160px"><h6 class="text-muted">Clic para subir tu foto</h6>',
                                removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
                              removeTitle: 'Remover imagen',
                            }); 
                        
                        $(".kv-file-remove.btn.btn-xs.btn-default , .file-upload-indicator").remove();
                        $(".file-preview-image.kv-preview-data").css("width","160px");
                        $(".file-input.theme-explorer button").css("margin","10px");
                        $("#modalUpdateUsuario #btnModificarUsuario").prop("imagen",result.usuario[0].foto);


                      $("#modalUpdateUsuario").modal("show");
                      
                    }
                    else
                    {
                       window.location = result.url;
                     
                    }

                  },
             error:function(result)
                {
                  alert("Error");
                 console.log(result.responseText);
                  
                }
                
          });



    });

    $('#fileFoto').on('fileselect', function(event) 
    {
        $("body .file-upload-indicator").remove();
        
    });



    $("body").on("submit","#FormUpdateUsuario",function(event)
    {

      event.preventDefault();

      validaFormUpdateUsuario();

    });


    // FUNCION PARA VALIDAR DATOS AL ACTUALIZAR EL USUARIO


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

                                                      if(typeof(result.baja) == "undefined") 
                                                      {
                                                        if(result.msjCantidadRegistros > 0)
                                                        {
                                                           valida = false;
                                                        }
                                                        else
                                                        {
                                                          valida = true;
                                                        }

                                                      }
                                                      else
                                                      {
                                                        window.location = result.url;
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
              

              var imagenBD = $("#modalUpdateUsuario #btnModificarUsuario").prop("imagen");

              var imagenLoad = $("body .file-preview img").attr("src").split("/")[6];

              var cambioImagen = "NO";

              if(imagenBD!=imagenLoad)
              {
                  cambioImagen = "SI";
              }

              console.log(cambioImagen);

              // var cambioImagen = $("#modalUpdateUsuario #btnModificarUsuario").prop("cambioImagen");


               var datosUsuarioUrl = "?id_usuario="+ $("#txtIdUsuario").val()+
                                     "&id_rol= "+$("#slTipoUsuario").val()+
                                     "&nombre="+$("#txtNombre").val()+
                                     "&apellidos="+$("#txtApellidos").val()+
                                     "&email="+$("#txtEmail").val()+
                                     "&password="+$("#txtPassword").val()+
                                     "&cambioImagen="+cambioImagen;

                


               // var datosUsuario = {
               //                   id_usuario : $("#txtIdUsuario").val(),
               //                   id_rol: $("#slTipoUsuario").val(),
               //                   nombre : $("#txtNombre").val(),
               //                   apellidos: $("#txtApellidos").val(),      
               //                   email: $("#txtEmail").val(),
               //                   password: $("#txtPassword").val()

               //                 } 


                         var archivos = document.getElementById("fileFoto");  

                          var archivo = archivos.files;
                          var archivos = new FormData();
                          for(i=0; i<archivo.length;i++)
                          {
                            archivos.append('archivo',archivo[i])
                          }

                            $.ajax(
                            {
                                type: "POST",
                                url: "Usuarios/updateUsuario"+datosUsuarioUrl,
                                dataType:"json",
                                contentType:false,
                                processData:false,
                                data: archivos,
                                 async: true,
                                success: function(result)
                                    {
                                      console.log(result);

                                      if(typeof(result.baja) == "undefined") 
                                      {
                                          $('#modalUpdateUsuario').modal('hide');
                                          $("#modalAlertaUsuario .modal-body").html(result.msjConsulta);
                                          $("#modalAlertaUsuario").modal("show");
                                      }
                                      else
                                      {
                                          window.location = result.url;
                                      }
                                      

                                    },
                               error:function(result)
                                  {
                                    alert("Error");
                                   console.log(result.responseText);
                                    
                                  }
                                  
                            });



          });


  }



// $('body').on('click','.fileinput-remove-button', function(event, id, index) 
// {
  
//       var index = $("body .file-preview img").attr("src").indexOf("default_avatar.png");

//       if(index > -1 )
//       {
//         $("#modalUpdateUsuario #btnModificarUsuario").prop("cambioImagen","SI");
//       }

// });



// FUNCIONES PARA DAR BAJA DE USUARIO


  $("body").on("click",".bajaUsersAlta",function()
  {

      var datosUsuario = {
                               id_usuario : tableUsersAlta.rows($(this).closest("tr").index()).data().pluck(0)[0]         
                             } 

       $.ajax(
          {
              type: "POST",
              url: "Usuarios/getDatosBajaUsuario",
              dataType:"json",
              data: datosUsuario,
               async: true,
              success: function(result)
                  {

                    //console.log(result);

                    if(typeof(result.baja) == "undefined") 
                    {
                      var nombre = result.usuario[0].nombre +" "+result.usuario[0].apellidos;
                    
                      $("#modalBajaUsuario .txtMdlIdUsuario").val(result.usuario[0].id_usuario); 
                      $("#modalBajaUsuario .nombre_usuario").text(nombre); 
                      $("#modalBajaUsuario").modal("show");
                    }
                   else
                    {
                       window.location = result.url;
                     
                    }

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
                             id_usuario : $("#modalBajaUsuario .txtMdlIdUsuario").val()      
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
                  
                  if(typeof(result.baja) == "undefined") 
                  {

                    $("#modalAlertaUsuario .modal-body").text(result.msjConsulta);
                    $("#modalAlertaUsuario").modal("show");
                  }
                  else
                  {
                    window.location = result.url;
                  }
                  
                  
                },
           error:function(result)
              {
                alert("Error");
               console.log(result.responseText);
                
              }
              
        });

  });


// FUNCIONES PARA EL ALTA DE USUARIOS 


  $("body").on("click",".usersBajaAlta",function()
  {

        var datosUsuario = {
                                 id_usuario : tableUsersBaja.rows($(this).closest("tr").index()).data().pluck(0)[0]            
                               } 

         $.ajax(
            {
                type: "POST",
                url: "Usuarios/getDatosAltaUsuario",
                dataType:"json",
                data: datosUsuario,
                 async: true,
                success: function(result)
                    {

                      //console.log(result);

                       if(typeof(result.baja) == "undefined") 
                       {
                           var nombre = result.usuario[0].nombre +" "+result.usuario[0].apellidos;
                      
                          $("#modalAltaUsuario .txtMdlIdUsuario").val(result.usuario[0].id_usuario); 
                          $("#modalAltaUsuario .nombre_usuario").text(nombre); 
                          $("#modalAltaUsuario").modal("show");
                       }
                       else
                      {
                        window.location = result.url;
                      }

                    },
               error:function(result)
                  {
                    alert("Error");
                   console.log(result.responseText);
                    
                  }
                  
            });


  });


  $("body").on("click","#btnMdlAltaUsuario",function()
  {

      var datosUsuario = {
                               id_usuario : $("#modalAltaUsuario .txtMdlIdUsuario").val()      
                        } 

        $.ajax(
          {
              type: "POST",
              url: "Usuarios/altaUsuario",
              dataType:"json",
              data: datosUsuario,
               async: false,
              success: function(result)
                  {
                    
                    if(typeof(result.baja) == "undefined") 
                    {
                       $("#modalAlertaUsuario .modal-body").text(result.msjConsulta);
                       $("#modalAlertaUsuario").modal("show");
                    }
                    else
                    {
                      window.location = result.url;
                    }
                    
                   
                    
                  },
             error:function(result)
                {
                  alert("Error");
                 console.log(result.responseText);
                  
                }
                
          });

        location.href = result.base_url;
        
  });





  // EVENTOS DE VENTANAS MODALES

    $('#modalAlertaUsuario').on('hide.bs.modal', function (e) 
    {
         location.reload();
    });

    // $('#modalUpdateUsuario').on('hide.bs.modal', function (e) 
    // {
    //      $('#avatar-2').fileinput('clear');
    // });


    $('#modalUpdateUsuario').on('hide.bs.modal', function (e) 
    {
         $("#FormUpdateUsuario").bootstrapValidator('resetForm', true);


    })







});