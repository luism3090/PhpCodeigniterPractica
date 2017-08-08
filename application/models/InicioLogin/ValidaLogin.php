<?php 
	class ValidaLogin extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function verificarLogin($datos)
		{
			
			// -------------------------------------------------------- 

			//$query = $this->db->query("select * from usuarios where email= '".$datos["email"]."' and password = '".$datos["password"]."' ");

			//return "select * from usuarios where email= '".$datos["email"]."' and password = '".$datos["password"]."'"; 


		    //$query = $this->db->query("select * from usuarios where email= '".$this->db->escape_str($datos["email"])."' and password = '".$this->db->escape_str($datos["password"])."' ");



			// --------------------------------------------------------

			// $this->db->select('*');
			// $this->db->from('usuarios');
			// $this->db->where('email', $datos["email"]);
			// $this->db->where('password', $datos["password"]);
			// $query = $this->db->get();


			// --------------------------------------------------------

			$sql =	"select us.id_usuario,us.nombre,us.apellidos,us.email,ro.id_rol,ro.descripcion as rol,us.foto from usuarios us
				 	join usuarios_roles usr on(us.id_usuario = usr.id_usuario) 
					join roles ro on(usr.id_rol = ro.id_rol)
		         	where email= ? and password = ? and us.estado = '1' ";

			$query = $this->db->query($sql,array($datos["email"],$datos["password"]));


			// --------------------------------------------------------



			$datos = array("msjCantidadRegistros" => 0, "msjNoHayRegistros" => '',"loginUsuario" => array());

			$datos["msjCantidadRegistros"] = $query->num_rows(); 

			if($datos["msjCantidadRegistros"] > 0)
			{
				$datos["loginUsuario"] = $query->result(); 
			}
			else{
				$datos["msjNoHayRegistros"] = "El nombre de usuario o contraseña son incorrectos";
			}
			

			return $datos;



			// foreach ($query->result_array() as $row)
			// {
			//         echo $row['title'];
			//         echo $row['name'];
			//         echo $row['body'];
			// }

		}
	}
?>