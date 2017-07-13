<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Users extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

	public function obtenerUsuarios()
	{
		
		$sql =	"select 
					usu.id_usuario,
					rol.id_rol,
					usu.nombre,
					usu.apellidos,
					usu.email,
					usu.fecha_registro,
					rol.descripcion as tipoUsuario
					from usuarios usu
					join usuarios_roles usu_ro on (usu.id_usuario = usu_ro.id_usuario)
					join roles rol on (usu_ro.id_rol = rol.id_rol)";

					$query = $this->db->query($sql);


			$datos = array("msjCantidadRegistros" => 0, "msjNoHayRegistros" => '',"usuarios" => array());

			$datos["msjCantidadRegistros"] = $query->num_rows(); 

			if($datos["msjCantidadRegistros"] > 0)
			{
				$datos["usuarios"] = $query->result(); 
			}
			else{
				$datos["msjNoHayRegistros"] = "No hay registros";
			}
			

			return $datos;


		
	}

		

	}
?>