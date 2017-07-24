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

			
			$sqlUsuariosAlta =	"select 
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
									join roles rol on (usu_ro.id_rol = rol.id_rol) where usu.id_usuario != 1 and usu.estado = '1' 
									order by usu.fecha_registro desc";

			$queryUsuariosAlta = $this->db->query($sqlUsuariosAlta);



			$sqlUsuariosBaja =	"select 
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
						join roles rol on (usu_ro.id_rol = rol.id_rol) where usu.id_usuario != 1 and usu.estado = '0' 
						order by usu.fecha_registro desc ";

		    $queryUsuariosBaja = $this->db->query($sqlUsuariosBaja);



				$datos = array("msjCantidadRegistrosAlta" => 0, "msjNoHayRegistrosAlta" => '' ,"usuariosAlta" => array(), "msjCantidadRegistrosBaja" => 0, "msjNoHayRegistrosBaja" => '' ,"usuariosBaja" => array() );


				$datos["msjCantidadRegistrosAlta"] = $queryUsuariosAlta->num_rows(); 

				if($datos["msjCantidadRegistrosAlta"] > 0)
				{
					$datos["usuariosAlta"] = $queryUsuariosAlta->result(); 
					
				}
				else{
					$datos["msjNoHayRegistrosAlta"] = "No hay usuarios dados de alta";
				}

				
				$datos["msjCantidadRegistrosBaja"] = $queryUsuariosBaja->num_rows(); 

				if($datos["msjCantidadRegistrosBaja"] > 0)
				{
					$datos["usuariosBaja"] = $queryUsuariosBaja->result(); 
					
				}
				else{
					$datos["msjNoHayRegistrosBaja"] = "No hay usuarios dados de baja";
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
					where usu.id_usuario = ? and usu.estado = '1'";


			$query = $this->db->query($sql,array($id_usuario));

			// return $query;
			// exit();


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
					where id_usuario = ? and estado = '1'";


			$query1 = $this->db->query($sql1,array($nombre,$apellidos,$email,$password,$id_usuario));


			$sql2 = "update usuarios_roles set 
						id_rol = ?
					where id_usuario = ?";


			$query2 = $this->db->query($sql2,array($id_rol,$id_usuario));

			$datos = array("msjConsulta" => '');

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
					where email = ? and id_usuario != ? and estado = '1'";


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



		public function obtenerDatosBajaUsuario($id_usuario)
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
					where usu.id_usuario = ? and usu.estado = '1'";


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

		public function darDeBajaUsuario($id_usuario)
		{


			$sql = "update usuarios set estado = '0' where id_usuario = ? and estado = '1' ";


			$query = $this->db->query($sql,array($id_usuario));


			$datos = array("msjConsulta" => 0);

			if($query == true)
			{
				$datos["msjConsulta"] = "El usuario ha sido dado de baja correctamente";
			}
			else
			{
				$datos["msjConsulta"] = "Ha ocurrido un error al dar de baja al usuario ";
			}

				return $datos;


		}


		public function obtenerDatosAltaUsuario($id_usuario)
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
					where usu.id_usuario = ? and usu.estado = '0'";


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


		public function darDeAltaUsuario($id_usuario)
		{


			$sql = "update usuarios set estado = '1' where id_usuario = ? and estado = '0' ";


			$query = $this->db->query($sql,array($id_usuario));


			$datos = array("msjConsulta" => 0);

			if($query == true)
			{
				$datos["msjConsulta"] = "El usuario ha sido dado de alta correctamente";
			}
			else
			{
				$datos["msjConsulta"] = "Ha ocurrido un error al dar de alta al usuario ";
			}

				return $datos;


		}


	}
?>