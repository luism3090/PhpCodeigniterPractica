<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrarUsuarios extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('RegistrarUsuarios/registrarUsers');

		if($this->session->userdata('login')==null)
		{
			redirect('/Login');
		} 
		if($this->session->userdata('id_rol')=='3')
		{
			redirect('/index');
		} 
		
	}
	public function index()
	{
		$this->load->view('RegistrarUsuarios/registrarUsuarios');

	}

	public function checkEmail()
	{
		
		$email = $_POST["email"];

		$datosUsuario = $this->registrarUsers->verificarEmail($email);

		//$datosUsuario["aa"] = $datosUsuario;

		 echo json_encode($datosUsuario);
		//var_dump($datosUsuario); 
	}

	public function insertarUsuario()
	{
		
		$nombre = $_POST["nombre"];
		$apellidos = $_POST["apellidos"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$id_rol = $_POST["id_rol"];

		$datosUsuario = $this->registrarUsers->insertUsers($nombre,$apellidos,$email,$password,$id_rol);

		//$datosUsuario["aa"] = $datosUsuario;

		 echo json_encode($datosUsuario);
		//var_dump($datosUsuario); 
	}


}

?>