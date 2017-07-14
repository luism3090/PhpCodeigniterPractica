<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Usuarios/users');

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

		$datosUsuarios = $this->users->obtenerUsuarios();

		echo json_encode($datosUsuarios);

	}

	public function getDatosUpdateUsuario()
	{
		$id_usuario = $_POST["id_usuario"];

		$datosUsuario = $this->users->obtenerDatosUsuario($id_usuario);

		echo json_encode($datosUsuario);
	}

	public function updateUsuario()
	{
		$id_usuario = $_POST["id_usuario"];
		$id_rol = $_POST["id_rol"];
		$nombre = $_POST["nombre"];
		$apellidos = $_POST["apellidos"];
		$email = $_POST["email"];



		$datosUsuario = $this->users->actualizarUsuario($id_usuario,$id_rol,$nombre,$apellidos,$email);

		//$datosUsuario["aa"] = $datosUsuario;

		 echo json_encode($datosUsuario);
		//echo $datosUsuario;
	}


}

?>