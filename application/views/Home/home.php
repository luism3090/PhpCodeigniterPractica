<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/estiloHomeMenu.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/estiloBarraSuperior.css">
</head>
<body >
	


	<div class="navbar navbar-default navbar-fixed-top" role="navigation">

    <div class="container"> 

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



<!-- <button type="button" id="btnCerrarSesion" class="btn btn-primary">Cerrar sesion</button> -->
	

	<?php echo $this->session->userdata('id_rol'); ?>

		<div class="sidebar left" style="">

			  <ul class="list-sidebar bg-defoult" >
	
			 <?php  echo $rowsMenu; ?>  


					    <!--<li class="nav-header "> <span> <img alt="image" class="img-circle" src="http://placehold.it/150x150"> </span>
					      <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
					        <li><a href="#">Regular link</a></li>
					        <li class="disabled"><a href="#">Disabled link</a></li>
					        <li><a href="#">Another link</a></li> 
					      </ul> 
					    </li>
				
					
					   <!--  <li>
						    <a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active" > 
							    <i class="fa fa-th-large"></i> 
							    <span class="nav-label"> Dashboards </span> 
							    <span class="fa fa-chevron-left pull-right"></span> 
						    </a> -->
						      
						    <!--  <ul class="sub-menu collapse" id="dashboard">

							        <li><a href="#">General</a></li>
							        <li><a href="#">Buttons</a></li>
							        <li><a href="#">Tabs & Accordions</a></li>
							        <li><a href="#">Typography</a></li>
							        <li><a href="#">FontAwesome</a></li>

									<li class="active">

							        	<a href="#" data-toggle="collapse" data-target="#Animation" class="collapse active" >
								        	<i class="fa fa-th-large"></i> 
										    <span class="nav-label"> CSS3 Animation </span> 
										    <span class="fa fa-chevron-left pull-right"></span> 
							        	</a>
										<ul class="sub-menu collapse" id="Animation"> 
										 	<li><a href="#">Javascript</a></li>
							        		<li><a href="#">React JS</a></li>
										</ul>


							        </li>
							        
							        <li><a href="#">Slider</a></li>
							        <li><a href="#">Panels</a></li>
							        <li><a href="#">Widgets</a></li>
							        <li><a href="#">Bootstrap Model</a></li>
						      </ul>  -->

						      
					   <!--  </li> -->

<!-- 
					    <li> 
						    <a href="#">
							    <i class="fa fa-diamond"></i>
							     <span class="nav-label">Layouts</span>
						     </a> 
					    </li>

					    <li> 
						    <a href="#" data-toggle="collapse" data-target="#products" class="collapsed active" > 
							    <i class="fa fa-bar-chart-o"></i> <span class="nav-label">Graphs</span> 
							    <span class="fa fa-chevron-left pull-right Mihover"></span> 
						    </a>
						      <ul class="sub-menu collapse" id="products">
						        <li class="active"><a href="#">Ajax</a></li>
						        <li><a href="#">Java</a></li>
						        <li><a href="#">PHP</a></li>
						        <li><a href="#">Sql</a></li>
						        <li><a href="#">MYSQL</a></li>
						        <li><a href="#">MongoDB</a></li>
						        <li><a href="#">AngularJS</a></li>
						        <li><a href="#">Visual</a></li>
						        <li><a href="#">C#</a></li>
						        <li><a href="#">Bootstrap validation</a></li>
						      </ul>
					    </li>

					    <li> 
						    <a href="#">
							    <i class="fa fa-laptop"></i> 
							    <span class="nav-label">Grid options</span>
						    </a> 
					    </li>

					    <li> 
						    <a href="#" data-toggle="collapse" data-target="#tables" class="collapsed active" >
							    <i class="fa fa-table"></i> 
							    <span class="nav-label">Tables</span>
							    <span class="fa fa-chevron-left pull-right"></span>
						    </a>
						      <ul  class="sub-menu collapse" id="tables" >
						        <li><a href=""> Static Tables</a></li>
						        <li><a href=""> Data Tables</a></li>
						        <li><a href=""> Foo Tables</a></li>
						        <li><a href=""> jqGrid</a></li>
						      </ul>
					    </li>

					    <li> 
						    	<a href="#" data-toggle="collapse" data-target="#e-commerce" class="collapsed active" >
								     <i class="fa fa-shopping-cart"></i>
								     <span class="nav-label">E-commerce</span>
								     <span class="fa fa-chevron-left pull-right"></span>
							    </a>
						      <ul  class="sub-menu collapse" id="e-commerce" >
						        <li><a href=""> Products grid</a></li>
						        <li><a href=""> Products list</a></li>
						        <li><a href="">Product edit</a></li>
						        <li><a href=""> Product detail</a></li>
						        <li><a href="">Cart</a></li>
						        <li><a href=""> Orders</a></li>
						        <li><a href=""> Credit Card form</a> </li>
						      </ul>
					    </li>

					    <li> 
						    <a href="">
							    <i class="fa fa-pie-chart"></i> 
							    <span class="nav-label">Metrics</span> 
						    </a>
					    </li>

					    <li> 
						    <a href="#">
							    <i class="fa fa-files-o"></i> 
							    <span class="nav-label">Other Pages</span>
						    </a> 
					    </li>

					    <li> 
						    <a href="#">
							    <i class="fa fa-files-o"></i> 
							    <span class="nav-label">Other Pages</span>
						    </a> 
					    </li>

					    <li> 
						     <a href="#">
							     <i class="fa fa-files-o"></i>
							     <span class="nav-label">Other Pages</span>
						     </a> 
					     </li>

					    <li> 
						    <a href="#">
							    <i class="fa fa-files-o"></i> 
							    <span class="nav-label">Other Pages</span>
						    </a> 
					    </li>

					    <li> 
						    <a href="#">
							    <i class="fa fa-files-o"></i> 
							    <span class="nav-label">Other Pages</span>
						    </a> 
					    </li> -->

			  </ul>

	</div>
	

	<script src="<?php echo base_url(); ?>public/libreriasJS/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>public/libreriasJS/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>public/libreriasJS/bootstrapValidator.js"></script>
	<script src="<?php echo base_url(); ?>public/js/homeMenu.js"></script> 

</body>
</html>