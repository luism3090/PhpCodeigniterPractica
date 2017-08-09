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

    $("#btnUpdateMyData").on("click",function()
    {

       $.ajax(
        {
              type: "POST",
              dataType: "json",
              url: "Home/actualizarDatosUsuario",
              data: "",
               async: true,
              success: function(result)
                  {
                    
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

                          loadFiles(urlFoto,urlFotoDefault);

                        $(".kv-file-remove.btn.btn-xs.btn-default , .file-upload-indicator").remove();
                        $(".file-drag-handle.drag-handle-init.text-info").remove();
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
                
                console.log(result.responseText);
                //$("#error").html(data.responseText); 
              }
              
         });

    });


     function loadFiles(urlFoto,urlFotoDefault)
     {

       $('#fileFoto').fileinput('destroy');

        if( urlFoto.split(".")[1] === "pdf")
        {
           $('#fileFoto').fileinput({
                                 showUpload: false,
                                 browseOnZoneClick: true,              
                                 language: 'es',
                                 maxFileCount: 1,
                                 showClose: false,
                                 showCaption: false,
                                 maxFileSize: 5000,
                                 theme: 'explorer',                
                                 allowedFileExtensions: ['jpg','png','gif','pdf'],
                                 initialPreview: urlFoto,
                                 initialPreviewAsData: true,
                                 initialPreviewConfig: [
                                                 
                                                 {type: "pdf", size: 5000, caption: "Archivo", url: urlFoto},
                                                 
                                             ],
                                defaultPreviewContent: '<img src="'+urlFotoDefault+'" alt="Tu Avatar" style="width:160px"><h6 class="text-muted">Clic para subir tu foto</h6>',
                                 removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
                               removeTitle: 'Remover archivo',
                             }); 
        }
        else
        {
           $('#fileFoto').fileinput({
                                 showUpload: false,
                                 browseOnZoneClick: true,              
                                 language: 'es',
                                 maxFileCount: 1,
                                 showClose: false,
                                 showCaption: false,
                                 maxFileSize: 5000,
                                 theme: 'explorer',                
                                 allowedFileExtensions: ['jpg','png','gif','pdf'],
                                 initialPreview: urlFoto,
                                 initialPreviewAsData: true,
                                 initialPreviewConfig: [
                                                 
                                                 {type: "image", size: 5000, caption: "imagen", url: urlFoto },
                                                 
                                             ],
                                defaultPreviewContent: '<img src="'+urlFotoDefault+'" alt="Tu Avatar" style="width:160px"><h6 class="text-muted">Clic para subir tu foto</h6>',
                                 removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
                               removeTitle: 'Remover archivo',
                             }); 
        }

        
     }


     $("body").on("submit","#FormUpdateUsuario",function(event)
    {

      event.preventDefault();

      validaFormUpdateUsuario();

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

                var imagenLoad = "";

                if($("body .file-preview img").length > 0 )
                {
                  imagenLoad = $("body .file-preview img").attr("src").split("/")[6];
                }
                if($("body .kv-file-content embed").length>0)
                {
                  imagenLoad = $("body .kv-file-content embed").attr("src").split("/")[3]
                }

                

                var cambioImagen = "NO";

                if(imagenBD!=imagenLoad)
                {
                    cambioImagen = "SI";
                }

                 var datosUsuarioUrl = "?id_usuario="+ $("#txtIdUsuario").val()+
                                       "&id_rol= "+$("#slTipoUsuario").val()+
                                       "&nombre="+$("#txtNombre").val()+
                                       "&apellidos="+$("#txtApellidos").val()+
                                       "&email="+$("#txtEmail").val()+
                                       "&password="+$("#txtPassword").val()+
                                       "&cambioImagen="+cambioImagen;



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

      
    
});


  