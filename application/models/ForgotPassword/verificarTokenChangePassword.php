<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class verificarTokenChangePassword extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}


		public function verifyTokenChangePassword($token)
		{


			$sql1 =	"select 
							id_usuario,
							token 
					 from  
					 		users_forgot_passwords 
					 where 	token = ? ";

					$query = $this->db->query($sql1,array($token));


			   $datos = array("msjCantidadRegistros" => 0, "msjNoHayRegistros" => '' ,"usuarioTokens" => array());


				$datos["msjCantidadRegistros"] = $query->num_rows(); 

				if($datos["msjCantidadRegistros"] > 0)
				{
					$datos["usuarioTokens"] = $query->result();
				}
				else
				{
					$datos["msjNoHayRegistros"] = "No existe un token de ese usuario.";
				}


				return $datos;


		}



	}
?>