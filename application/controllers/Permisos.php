<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		

		if($this->session->userdata('login')==null)
		{
			redirect('/Login');
		} 

		
	}
	public function index()
	{

		$this->load->view('Permisos/permisos');

	}


	public function listaMenuRoles()
	{
		$id_rol = $_POST['id_rol'];

		$this->load->model('Permisos/listaPermisos');

		$datosMenu = $this->listaPermisos->getElmentosListaMenuRoles($id_rol);


		$dataMenu = $this->buildListaMenuRoles($datosMenu,false,false,$id_rol);


		$datosElementosRol = $this->listaPermisos->elementosMenuPermisoRol($id_rol);


		$datos["rowsMenu"] = $dataMenu;
		$datos["elementosMenu"] = $datosElementosRol;

		echo json_encode($datos);

	}

	function buildListaMenuRoles($datosMenu1,$is_sub,$descripcion,$id_rol)
	{

		$menu = "";
		

		if($is_sub)
		{
			$menu = "<ul>";
		}
		


		  foreach($datosMenu1 as $id => $properties) 
		  {


			  	$datosMenu2 = $this->listaPermisos->getHijosElmentosListaMenuRoles($properties->id_elemento_menu,$id_rol);

			  	
			  	if(!empty($datosMenu2)) 
			  	{

                	$sub = $this->buildListaMenuRoles($datosMenu2, TRUE,$properties->descripcion,$id_rol);

	            }		           
	            else {

	                $sub = NULL;                

	            }	

	            if ($sub != NULL)
	            {
	            	//<a href='#'><i class='".$properties->icono."'></i>$properties->descripcion</a>
	            	
	            	 $menu .= "<li class='list-group-item list-group-item-warning'>
					            	 $properties->descripcion
					            	 $sub
	            	 		   </li>";
	            	
	            }
	            else
	            {

	            	$menu .=   "<li class='list-group-item list-group-item-info' data-id-elemento-menu='$properties->id_elemento_menu'>$properties->descripcion
								 <input type='checkbox' >
	            				</li>";
	            }
            		
            		     			                          

		  }
		

		return $menu . "</ul>";

	}



}

?>