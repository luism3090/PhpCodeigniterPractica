<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Usuarios</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/estiloHomeMenu.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/estiloBarraSuperior.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/estiloTablasBootstrap.css">
</head>
<body >
	
	<div id="contenedor-principal">
					
					<div class="navbar navbar-default navbar-fixed-top" role="navigation">

									    <div class="container-fluid"> 

									        <div class="navbar-header">
									        
									        </div>

									        <div class="collapse navbar-collapse">
									            
									            <ul class="nav navbar-nav navbar-right">
									                <li class="dropdown">
									                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
									                        <span class="glyphicon glyphicon-user"></span> 
									                        <strong><?php echo $this->session->userdata('nombre'); ?></strong>
									                        <span class="glyphicon glyphicon-chevron-down"></span>
									                    </a>
									                    <ul class="dropdown-menu">
									                        <li>
									                            <div class="navbar-login">
									                                <div class="row">
									                                    <div class="col-lg-4">
									                                        <p class="text-center">
									                                            <span class="glyphicon glyphicon-user icon-size"></span>
									                                        </p>
									                                    </div>
									                                    <div class="col-lg-8">
									                                        <p class="text-left"><strong><?php echo $this->session->userdata('nombre')." ".$this->session->userdata('apellidos') ?></strong></p>
									                                        <p class="text-left small"><?php echo $this->session->userdata('email')?></p>
									                                        <p class="text-left">
									                                            <a href="#" class="btn btn-primary btn-block btn-sm">Actualizar Datos</a>
									                                        </p>
									                                    </div>
									                                </div>
									                            </div>
									                        </li>
									                        <li class="divider"></li>
									                        <li>
									                            <div class="navbar-login navbar-login-session">
									                                <div class="row">
									                                    <div class="col-lg-12">
									                                        <p>
									                                            <a href="#" class="btn btn-danger btn-block" id="btnCerrarSesion">Cerrar Sesion</a>
									                                        </p>
									                                    </div>
									                                </div>
									                            </div>
									                        </li>
									                    </ul>
									                </li>
									            </ul>
									        </div>

									    </div>
					</div>

					<div class="sidebar left" style="">

						  <ul class="list-sidebar bg-defoult" >

						  </ul>
					</div>
					
					<div class="container" style="margin-left:20%;width:79%;" >
						<div class="row">
							<div class="col-xs-12">
								<h2 style="text-align: center;">Usuarios</h2>
							</div>
						</div>
	
						<div class="row">
							<div class="col-xs-12">
								
								<div class="table-responsive">
										<table class="table table-bordered table-hover" id="tblUsuarios">
												<caption>Tabla de usuarios</caption>
												<thead>
									                    <tr class="info">
									                      <th style="display:none">id_usuario</th>
									                      <th style="display:none">id_rol</th>
									                      <th>Nombre</th>
									                      <th>Apellidos</th>
									                      <th>Email</th>
									                      <th>Fecha de registro</th>
									                      <th>Tipo de usuario</th>
									                      <th>Modificar</th>
									                      <th>Eliminar</th>
									                    </tr>
								                </thead>
										</table>
								</div>

							</div>
						</div>

					</div>

	</div>


   <!-- Modal -->
<div id="modalUpdateUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modificar usuario</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-xs-12">
	        		<form action="">
						<br>
						<label for="nombre">Nombre:</label>
						<input type="text" id="txtNombre" class="form-control" placeholder="Nombre">
						<br>
						<label for="apellidos">Apellidos:</label>
						<input type="text" id="txtApellidos" class="form-control" placeholder="Apellidos">
						<br>
						<label for="email">Email:</label>
						<input type="text" id="txtEmail" class="form-control" placeholder="Email">
						<br>
						<label for="elegir">Tipo de usuario:</label> 
						<select id="slTipoUsuario" class="form-control">
							<option value="1">Super Usuario</option>
							<option value="2">Administrador</option> 
							<option value="3">Cliente</option>
						</select> 
						<br>
						<input type="hidden" id="txtIdUsuario" class="form-control">
						
					</form>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnModificarUsuario" >Modificar</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>

   <!-- Modal -->
<div id="modalAlertaUpdateUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alerta</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal" id="btnMdlAlertaUpdateUsuario">Aceptar</button>
      </div>
    </div>

  </div>
</div>


	<script src="<?php echo base_url(); ?>public/libreriasJS/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>public/libreriasJS/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>public/libreriasJS/bootstrapValidator.js"></script>
	<script src="<?php echo base_url(); ?>public/js/cargarMenu.js"></script>
	<script src="<?php echo base_url(); ?>public/js/cerrarSesion.js"></script>
	<script src="<?php echo base_url(); ?>public/js/cargarUsuarios.js"></script> 
	

</body>
</html>