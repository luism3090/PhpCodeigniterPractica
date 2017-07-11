<?php 
	class CargarMenu extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}


		public function getElmentosMenu()
		{
			$sql =	"select 
					me.id_elemento_menu,
					me.id_tipo_menu,
					me.hijos,
					me.descripcion,
					me.icono,
					me.id_elemento_padre_menu
					from usuarios usu
					join usuarios_roles usu_ro on (usu.id_usuario = usu_ro.id_usuario)
					join roles rol on (usu_ro.id_rol = rol.id_rol)
					join rel_menu_usuarios rel_mu on (rol.id_rol = rel_mu.id_rol)
					join menus me on (rel_mu.id_elemento_menu = me.id_elemento_menu)
					where rol.id_rol = 1 and me.id_tipo_menu = 1";

					$query = $this->db->query($sql,1); 


			return $query->result();




		}


		public function getHijosElmentosMenu($id_elemento_menu)
		{
			$sql =	"select 
							id_elemento_menu,
							id_tipo_menu,
							hijos,
							descripcion,
							icono,
							id_elemento_padre_menu
							from menus 
					where 	id_elemento_padre_menu = ?";

					$query = $this->db->query($sql,$id_elemento_menu); 


			return $query->result();
		}

	}
?>