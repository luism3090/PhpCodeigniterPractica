<?php 

class HookValidarDatosUsuario
{

	
	function __construct()
	{
		$this->ci =& get_instance();
	}


	 function validarUsuarios()
	{
		//$this->ci =& get_instance();



		if($this->ci->session->userdata('login') === true)
		{
			redirect('/Home');
		}
		
		



		// verficamos si el usuarios 

		// if($this->ci->session->userdata('login') == null)
		// {
		// 	redirect('Login');
		// }


		//$controllersprivados = array('home');

		//echo "Hola";



	}

}


?>