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

		public function obtenerDatosUsuario($id_usuario)
		{
			$sql = "select 
					usu.id_usuario,
					rol.id_rol,
					usu.nombre,
					usu.apellidos,
					usu.email,
					usu.fecha_registro,
					rol.descripcion as tipoUsuario
					from usuarios usu
					join usuarios_roles usu_ro on (usu.id_usuario = usu_ro.id_usuario)
					join roles rol on (usu_ro.id_rol = rol.id_rol)
					where usu.id_usuario = ?";


			$query = $this->db->query($sql,array($id_usuario));


			$datos = array("msjCantidadRegistros" => 0, "msjNoHayRegistros" => '',"usuario" => array());

			$datos["msjCantidadRegistros"] = $query->num_rows(); 

				if($datos["msjCantidadRegistros"] > 0)
				{
					$datos["usuario"] = $query->result(); 
				}
				else{
					$datos["msjNoHayRegistros"] = "No hay registros";
				}


				return $datos;


		}



		public function actualizarUsuario($id_usuario,$id_rol,$nombre,$apellidos,$email)
		{


			$sql1 = "update usuarios set 
						nombre = ?, 
						apellidos = ?,
						email = ? 
					where id_usuario = ?";


			$query1 = $this->db->query($sql1,array($nombre,$apellidos,$email,$id_usuario));


			$datos = array("msjConsulta" => "");


				if($query1 == true)
				{
					
					$sql2 = "update usuarios_roles set 
								id_rol = ?
							where id_usuario = ?";


					$query2 = $this->db->query($sql2,array($id_rol,$id_usuario));

					if($query2 == true)
					{
						$datos["msjConsulta"] = "El usuario ha sido modificado correctamente";
					}
					else
					{
						$datos["msjConsulta"] = "Falló al actualizar los datos del usuario intente de nuevo";
					}


				}
				else{
					$datos["msjConsulta"] = "Falló al actualizar los datos del usuario intente de nuevo";
					//$msj = "mal";
				}


				return $datos;

		}






		

	}
?>