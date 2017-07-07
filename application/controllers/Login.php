<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('login')!=null)
		{
			redirect('/Home');
		} 
		
	}
	public function index()
	{
		
		 $this->load->view('Login/login');
		// $this->load->view('inicioLogin/cuerpoLogin');
		// $this->load->view('inicioLogin/pieLogin');

	}

	public function loginUsuario()
	{
		
		// $datos["email"] = $this->input->post('email');	
		// $datos['password'] = $this->input->post('password');


		// $datos["email"] = $_POST['email'];
		// $datos["password"] = $_POST['password'];

		$datos = array(
						"email" => $_POST['email'],
						"password" => $_POST['password']
					  );

		
		
		

		$this->load->model('InicioLogin/ValidaLogin'); 
		$datosLogin = $this->ValidaLogin->verificarLogin($datos);

		//$this->session->sess_destroy();

		if($datosLogin["msjCantidadRegistros"] > 0)
		{
			
			$arregloSesion = array(
									"id" => $datosLogin["loginUsuario"][0]->id_usuario,
									"nombre" => $datosLogin["loginUsuario"][0]->nombre, 
									"login" => true
								  );
										

			$this->session->set_userdata($arregloSesion);
								  
		}
		
		//echo $datosLogin;

		echo json_encode($datosLogin);


		//echo "Hola mundo";

		//echo json_encode($datosLogin);

		//echo json_encode($arregloSesion); 

		// echo $datosLogin["loginUsuario"][0]->id_usuario;
		
	}


}

?>