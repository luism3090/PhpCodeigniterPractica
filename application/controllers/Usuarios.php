<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		 $this->load->model('Usuarios/users');
		
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


		//$datos["id"] = $id_usuario;
		// echo json_encode($datos);
		// exit();


		$datosUsuario = $this->users->obtenerDatosUsuario($id_usuario);

		$datos["algo"] = "Hola";

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


	public function getDatosBajaUsuario()
	{
		$id_usuario = $_POST["id_usuario"];


		$datosUsuario = $this->users->obtenerDatosBajaUsuario($id_usuario);

		echo json_encode($datosUsuario);
	}

	public function bajaUsuario()
	{
		
		$id_usuario = $_POST["id_usuario"];

		
		$datosUsuario = $this->users->darDeBajaUsuario($id_usuario);

		//$datosUsuario["aa"] = $datosUsuario;

		 echo json_encode($datosUsuario);
		//echo $datosUsuario;
	}


	public function getDatosAltaUsuario()
	{
		$id_usuario = $_POST["id_usuario"];


		$datosUsuario = $this->users->obtenerDatosAltaUsuario($id_usuario);

		echo json_encode($datosUsuario);
	}

	public function altaUsuario()
	{
		
		$id_usuario = $_POST["id_usuario"];

		
		$datosUsuario = $this->users->darDeAltaUsuario($id_usuario);

		//$datosUsuario["aa"] = $datosUsuario;

		 echo json_encode($datosUsuario);
		//echo $datosUsuario;
	}

}

?>