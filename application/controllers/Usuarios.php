<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller 
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
		$this->load->view('Usuarios/usuarios');

	}

	public function cargarUsuarios()
	{
		$this->load->model('Usuarios/users');

		$datosUsuarios = $this->users->obtenerUsuarios();

		//$datos["usuarios"] = $datosUsuarios;

		echo json_encode($datosUsuarios);

	}


}

?>