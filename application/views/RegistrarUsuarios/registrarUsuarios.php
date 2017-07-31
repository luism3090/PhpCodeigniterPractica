<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Usuarios</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/estiloHomeMenu.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/estiloBarraSuperior.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/estiloTablasBootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
</head>
<body >
	
	<div id="contenedor-principal" >
					
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

					<div class="sidebar left" >

						  <ul class="list-sidebar bg-defoult" >

						  </ul>
					</div>
					
		            <div style="margin-left:22%;width:75%" class="container-fluid" >
								
								<div class="row">
									<div class="col-xs-12 text-center">
										
										<h3>Registrar Usuarios</h3>	
									
									</div>
								</div>
								<br><br><br>
								
								<div class="row">
									<div class="col-xs-12 ">
										
										<form action="" id="formRegistrarUsuario">

											<div class="form-group">
												<label for="txtNombre">Nombre:</label>
												<input type="text" id="txtNombre" name="txtNombre" class="form-control" placeholder="Nombre">
											</div>
											<div class="form-group">
												<label for="txtApellidos">Apellidos:</label>
												<input type="text" id="txtApellidos" name="txtApellidos" class="form-control" placeholder="Apellidos">
											</div>
											<div class="form-group">
												<label for="txtEmail">Email:</label>
												<input type="text" id="txtEmail" name="txtEmail"  class="form-control" placeholder="Email">
											</div>
											<div class="form-group">
												<label for="txtPassword">Password:</label>
												<input type="text" id="txtPassword" name="txtPassword"  class="form-control" placeholder="Password" minlength="5"  maxlength="20" >
											</div>
											<div class="form-group">
												<label for="elegir">Tipo de usuario:</label> 
												<select id="slTipoUsuario" class="form-control" name="slTipoUsuario">
													<option value="1">Super Usuario</option>
													<option value="2">Administrador</option> 
													<option value="3" selected >Cliente</option>
												</select> 
											</div>
											
											<!-- <div class="form-group">
											<label for="elegir">Subir imagen:</label> 
												<input type="file" id="fileSubir" multiple class="form-control" >
											</div> -->

											<button type="submit" class="btn btn-primary"  >Guardar</button>
										</form>


									</div>
								</div>

				    </div>

	</div>

	<br><br><br><br><br>

<!-- Modal -->
<div id="modalUsuarioRegistrado" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alerta</h4>
      </div>
      <div class="modal-body">
        <h4>El Usuario ha sido registrado correctamente</h4>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal" id="btnAceptarUsuarioRegistrado" >Registrar nuevo usuario</button>
      <button type="button" class="btn btn-primary" id="btnIrAUsuarios">Ir a usuarios</button>
      <input type="hidden" id="base_url" >
      </div>
    </div>

  </div>
</div>

	<script src="<?php echo base_url(); ?>public/libreriasJS/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>public/libreriasJS/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

	<script src="<?php echo base_url(); ?>public/libreriasJS/bootstrapValidator.js"></script>
	<script src="<?php echo base_url(); ?>public/js/registrarUsuarios.js"></script>
	<script src="<?php echo base_url(); ?>public/js/cargarMenu.js"></script>
	<script src="<?php echo base_url(); ?>public/js/cerrarSesion.js"></script>
	

	

</body>
</html>