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
		$inicio = $_POST["inicio"];
		$fin = $_POST["fin"];

		$datosUsuarios = $this->users->obtenerUsuarios($inicio,$fin);

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
		$password = $_POST["password"];



		$datosUsuario = $this->users->actualizarUsuario($id_usuario,$id_rol,$nombre,$apellidos,$email,$password);

		//$datosUsuario["aa"] = $datosUsuario;

		 echo json_encode($datosUsuario);
		//echo $datosUsuario;
	}


	
	public function checkEmail()
	{
		
		$email = $_POST["email"];
		$id_usuario = $_POST["id_usuario"];


		$datosUsuario = $this->users->verificarEmail($email,$id_usuario);

		//$datosUsuario["aa"] = $datosUsuario;

		 echo json_encode($datosUsuario);
		//echo $datosUsuario;
	}


	public function bajaUsuario()
	{
		
		$id_usuario = $_POST["id_usuario"];

		
		$datosUsuario = $this->users->darDeBajaUsuario($id_usuario);

		//$datosUsuario["aa"] = $datosUsuario;

		 echo json_encode($datosUsuario);
		//echo $datosUsuario;
	}


}

?>