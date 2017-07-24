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


		if($controlador == 'Login')
		{
			// if($this->ci->session->userdata('logueado') === true)
			// {
			// 	redirect('/Home');
			// }
		}
		else
		{
			if($this->ci->session->userdata('logueado') === null)
			{
				redirect('/Login');
			}
	
		}

		

		// redirect('/Welcome');

		if($this->ci->session->userdata('id_rol') != null)
		{

			$id_rol = $this->ci->session->userdata('id_rol');
			$controladores_rol ="";
			$controladorPermitido = false;

			if($id_rol == '1')
			{
				$controladores_rol = array("Home","Usuarios","RegistrarUsuarios","Permisos");

				$controladorPermitido = in_array($controlador,$controladores_rol);

			}
			else if($id_rol == '2')
			{
				$controladores_rol = array("Home","Usuarios","RegistrarUsuarios");

				$controladorPermitido = in_array($controlador,$controladores_rol);

			}
			else if($id_rol == '3')
			{
				$controladores_rol = array("Home");

				$controladorPermitido = in_array($controlador,$controladores_rol);
			}

		
			if($controlador != "Welcome")
			{
				if($controladorPermitido==false)
				{
					redirect('/Welcome');
				}
			}
			
		
		}
		
		
		
		
		

		
		
		


		//$controllersprivados = array('home');

		//echo "Hola";



	}

}


?>