<?php 

class HookValidarDatosUsuario
{

	
	function __construct()
	{
		$this->ci =& get_instance();
	}


	 function validarUsuarios()
	{
	
		$controlador = $this->ci->router->class;
		$funcion = $this->ci->router->method;


		// primero verificamos si el usuario esta logueado 

		if($controlador == 'Login')
		{
			if($this->ci->session->userdata('logueado') === true)
			{
				
				redirect('/Home');
				exit();
			
			}
		}
		else
		{
			if($this->ci->session->userdata('logueado') === null)
			{
				if( $this->ci->input->is_ajax_request())
				{
					$datos["baja"]=true;
					$datos["url"]= base_url()."index.php/login";

					echo json_encode($datos);

					//redirect(, 'location', 302);
					
					exit();
				}
				else
				{
					redirect('/Login');
					exit();
				}
				
			}
	
		}


		// Verificar si el usuario esta dado de alta 

		if($controlador != 'Login' && $this->ci->session->userdata('logueado') === true)
		{
			$this->ci->load->model('Home/VerificarUsuarioActivo');

			$datosMenu = $this->ci->VerificarUsuarioActivo->verificarUserActivo($this->ci->session->userdata('id'));

			if($datosMenu == 0)
			{
				if( $this->ci->input->is_ajax_request())
				{
					$this->ci->session->sess_destroy();

					$datos["baja"]=true;
					$datos["url"]= base_url()."index.php/login";
					echo json_encode($datos);
					
					exit();
				}
				else
				{
					
					$this->ci->session->sess_destroy();
					redirect('/Login');
					exit();
				}


				
			}
			



		}

		

		// verificar si el usuario tiene permisos de acuerdo a su rol para visualizar tales elementos del menú

		if($this->ci->session->userdata('id_rol') != null)
		{

			$id_rol = $this->ci->session->userdata('id_rol');
			$controladores_rol ="";
			$controladorPermitido = false;

			$this->ci->load->model('Home/VerificarControladoresRol');

			$datosControles = $this->ci->VerificarControladoresRol->VerifyControlesRol($this->ci->session->userdata('id_rol'));

			//var_dump($datosControles["controladores"]);
			//exit();

			if($id_rol == '1')
			{	
				if($datosControles["msjCantidadRegistros"] > 0)
				{
					//$controladores_rol = array("Home","Usuarios","RegistrarUsuarios","Permisos");

					//$controladores_rol = $datosControles["controladores"];

					
				}

				$controladores_rol = array("Home","Usuarios","RegistrarUsuarios","Permisos");


				$controladorPermitido = in_array($controlador,$controladores_rol);

			}
			else if($id_rol == '2')
			{
				$controladores_rol = array("Home","Usuarios","RegistrarUsuarios","Permisos");

				$controladorPermitido = in_array($controlador,$controladores_rol);

			}
			else if($id_rol == '3')
			{
				$controladores_rol = array("Home");

				$controladorPermitido = in_array($controlador,$controladores_rol);
			}

		
			if($controlador != "AccesoDenegado")
			{
				if($controladorPermitido==false)
				{
					redirect('/AccesoDenegado',$datosControles);
				}
			}
			
		
		}
		
		
	



	}

}


?>