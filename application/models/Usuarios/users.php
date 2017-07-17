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
						usu.fecha_actualizacion,
						rol.descripcion as tipoUsuario
						from usuarios usu
						join usuarios_roles usu_ro on (usu.id_usuario = usu_ro.id_usuario)
						join roles rol on (usu_ro.id_rol = rol.id_rol) where usu.id_usuario != 1";

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
					usu.password,
					usu.fecha_registro,
					usu.fecha_actualizacion,
					rol.descripcion as tipoUsuario
					from usuarios usu
					join usuarios_roles usu_ro on (usu.id_usuario = usu_ro.id_usuario)
					join roles rol on (usu_ro.id_rol = rol.id_rol)
					where usu.id_usuario = ? ";


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



		public function actualizarUsuario($id_usuario,$id_rol,$nombre,$apellidos,$email,$password)
		{

			$this->db->trans_begin();


			$sql1 = "update usuarios set 
						nombre = ?, 
						apellidos = ?,
						email = ? ,
						password = ?,
						fecha_actualizacion = now()
					where id_usuario = ?";


			$query1 = $this->db->query($sql1,array($nombre,$apellidos,$email,$password,$id_usuario));


			$sql2 = "update usuarios_roles set 
						id_rol = ?
					where id_usuario = ?";


			$query2 = $this->db->query($sql2,array($id_rol,$id_usuario));


					if ($this->db->trans_status() === FALSE)
					{
							$datos["msjConsulta"] = "Falló al actualizar los datos del usuario intente de nuevo";

					        $this->db->trans_rollback();
					}
					else
					{
						$datos["msjConsulta"] = "El usuario ha sido modificado correctamente";

					    $this->db->trans_commit();
					}

				return $datos;

		}


		public function verificarEmail($email,$id_usuario)
		{
			$sql = "select * from usuarios
					where email = ? and id_usuario != ?";


			$query = $this->db->query($sql,array($email,$id_usuario));


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




		

	}
?>