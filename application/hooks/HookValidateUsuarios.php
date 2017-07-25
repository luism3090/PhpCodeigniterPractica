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

			$datos = $this->ci->VerificarControladoresRol->VerifyControlesRol($this->ci->session->userdata('id_rol'));

			if($datos["msjCantidadRegistros"] > 0)
			{
				$controladores_rol = explode(",", $datos["controllers"][0]->controladores);
				$controladorPermitido = in_array($controlador,$controladores_rol);
			}
			else
			{
				$controladores_rol = array();
				$controladorPermitido = in_array($controlador,$controladores_rol);
			}
			//var_dump($datos["controllers"][0]->controladores);
			
			 //exit();


			// if($id_rol == '1')
			// {	
				

			// }
			// else if($id_rol == '2')
			// {
			// 	$controladores_rol = array("Home","Usuarios","RegistrarUsuarios","Permisos");

			// 	$controladorPermitido = in_array($controlador,$controladores_rol);

			// }
			// else if($id_rol == '3')
			// {
			// 	$controladores_rol = array("Home");

			// 	$controladorPermitido = in_array($controlador,$controladores_rol);
			// }

		
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