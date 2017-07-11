<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Home/CargarMenu');

		if($this->session->userdata('login')==null)
		{
			redirect('/Login');
		} 

		

	}
	public function index()
	{


		$datosMenu = $this->CargarMenu->getElmentosMenu();

		$dataMenu = $this->buildMenu($datosMenu,false,false);

		$datos["rowsMenu"] = $dataMenu;

		$this->load->view('Home/home',$datos);

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


			  	$datosMenu2 = $this->CargarMenu->getHijosElmentosMenu($properties->id_elemento_menu);
			  	
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

	            	$menu .= "<li><a href='#'><i class='".$properties->icono."'></i>$properties->descripcion</a></li>";
	            }
            		
            		     			                          

		  }
		

		return $menu . "</ul>";

		//  return $attr

	}

	public function cerrarSesion()
	{
		
		// echo json_encode("a"); 
		// exit();

		if($this->session->userdata('login')!=null)
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

}

?>