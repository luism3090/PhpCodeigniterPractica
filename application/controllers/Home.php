<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
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

		$this->load->model('Home/CargarMenu'); 
		$datosMenu = $this->CargarMenu->getMenu();

		$datos["rowsMenu"] = $datosMenu;

		// foreach ($datosMenu["rowsSubmenu"] as $key => $valor) 
		// {
		// 	$datos["rowsSubmenu"][$key] = $valor;
		// }

		// = $datosMenu["rowsSubmenu"];

		$this->load->view('Home/home',$datos);

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