<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		
	}

	public function index()
	{

		// echo $this->session->userdata('nombre');

		// $this->session->set_userdata('nombre', 'Ana');

		// echo $this->session->userdata('nombre');

		$this->load->view('Home/home');
		

	}


	public function cargarMenu()
	{
		
		$this->load->model('Home/Menu');

		$datosMenu = $this->Menu->getElmentosMenu($this->session->userdata('id_rol'));

		$dataMenu = $this->buildMenu($datosMenu,false,false);

		$datos["rowsMenu"] = $dataMenu;

		echo json_encode($datos);

	}

	function buildMenu($datosMenu1,$is_sub,$descripcion)
	{

		$menu = "";
		$attr = "";

		if($is_sub)
		{
			$attr = "class='sub-menu collapse' id='".$descripcion."'";
			$menu = "<ul $attr >";
		}
		else
		{
			 $attr = 'id="menu"';
		}


		  foreach($datosMenu1 as $id => $properties) 
		  {


			  	$datosMenu2 = $this->Menu->getHijosElmentosMenu($properties->id_elemento_menu,$this->session->userdata('id_rol'));
			  	
			  	if(!empty($datosMenu2)) 
			  	{

                	$sub = $this->buildMenu($datosMenu2, TRUE,$properties->descripcion);

	            }		           
	            else {

	                $sub = NULL;                

	            }	

	            if ($sub != NULL)
	            {
	            	
	            	
	            	 $menu .= "<li class='active' >
					            	 <a href='#' data-toggle='collapse' data-target='#".$properties->descripcion."' class='collapse active'>
						            	 <i class='$properties->icono'></i>
						            	 <span class='nav-label'>$properties->descripcion</span>
						            	 <i class='fa fa-chevron-left pull-right'></i>
					            	 </a>
					            	 $sub
	            	 		   </li>";
	            	
	            }
	            else
	            {

	            	if($properties->controlador != "" )
	            	{
	            		$url = base_url()."index.php/".$properties->controlador;
	            	}
	            	else
	            	{
	            		$url = "#";
	            	}

	            	$menu .= "<li><a href='".$url."'><i class='".$properties->icono."'></i>$properties->descripcion</a></li>";
	            }
            		
            		     			                          

		  }
		

		return $menu . "</ul>";

	}



	public function cerrarSesion()
	{
	
		if($this->session->userdata('logueado')!=null)
		{
			
			$this->session->sess_destroy();
			
			$datos["sesion"] = false;
			$datos["base_url"] = base_url()."index.php/Login";

			echo json_encode($datos);

		} 
		else{

			$datos["sesion"] = false;
			$datos["base_url"] = base_url()."index.php/Login";

			echo json_encode($datos);
		}
	}	


	public function actualizarDatosUsuario()
	{

		$this->load->model('Usuarios/users');
		$datosUsuario = $this->users->obtenerDatosUsuario($this->session->userdata('id'));


		if(is_array($datosUsuario))
		{
			echo json_encode($datosUsuario);
		}
		else
		{
			$datos["algo"] = "Hola";
			echo json_encode($datos);
		}
			
		
	}



}

?>