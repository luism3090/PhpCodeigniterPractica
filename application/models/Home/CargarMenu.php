<?php 
	class CargarMenu extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function getMenu()
		{
			

			$sql =	"select 
					me.id_elemento_menu,
					me.descripcion,
					me.icono,
					me.hijos,
					subme.elementos_submenu
					FROM menus me
					left join rel_menus_submenus subme on (me.id_elemento_menu = subme.id_elemento_menu)
					where  ( me.hijos = 'SI' and  me.id_tipo_menu = 1) or ( me.hijos is null and  me.id_tipo_menu = 1)
					order by me.id_elemento_menu ";

			$query = $this->db->query($sql);


			// --------------------------------------------------------



			$datos = array("msjCantidadRegistros" => 0, "msjNoHayRegistros" => '',"rowsMenu" =>"" ,"rowsSubmenu" => array());

			$datos["msjCantidadRegistros"] = $query->num_rows(); 

			$id_elemento_menu="";

			if($datos["msjCantidadRegistros"] > 0)
			{
				//$datos["rowsMenu"] = $query->result(); 

				$menu ="";
				
				
				foreach ($query->result_array() as $row)
				{
						
						// obtener hijos del elemento padre  

						$submenu="";
						if($row['elementos_submenu'] != "")
						{


										$elementos_submenu = explode(",",$row['elementos_submenu']);
										// $elementos_hijos = array();


										// verificar si un hijo tiene mas hijos 
										// foreach ($elementos_submenu as $clave => $valor) 
							 		// 	{
						    // 				$sql3 =	"select 
										// 			me.id_tipo_menu,
										// 			sub.id_elemento_menu, 
										// 			sub.elementos_submenu 
										// 			from rel_menus_submenus sub
										// 			join menus me on (sub.id_elemento_menu = me.id_elemento_menu)
										// 			where me.id_elemento_menu = ?";

												

										// 		$query3 = $this->db->query($sql3,$valor);

										// 		if($query3->num_rows() > 0)
										// 		{
										// 			$elementos_hijos["id_elemento_menu"] = $valor;
										// 			$elementos_hijos["hijos"] = $query3->result();
										// 		}

												

										// }

										// return $elementos_hijos;
										// exit();

										$sql2 =	"select 
												id_elemento_menu,
												descripcion,
												icono,
												hijos
												FROM menus
												where id_elemento_menu in ?
												order by id_elemento_menu";


										$query2 = $this->db->query($sql2,array($elementos_submenu));
										//return $query2->result();
										//exit();

										$submenu = '<ul class="sub-menu collapse" id="'.$row['descripcion'].'">';

										foreach ($query2->result_array() as $row2)
										{

											if($row2['hijos']=="SI")
											{
												$submenu .= '<li>
								         						<a href="#" data-toggle="collapse" data-target="#'.$row2['descripcion'].'" class="collapsed active" >
									         						<i class="'.$row2['icono'].'"></i>
																    <span class="nav-label">'.$row2['descripcion'].'</span>
																    <span class="fa fa-chevron-left pull-right"></span>
															    </a>
															
							         					  </li>';

											}
											else
											{
												$submenu .= '<li>
								         						<a href="#">'
								         							.$row2['descripcion'].'
															    </a>
								         					 </li>';
											}

											
										}

										$submenu .="</ul>";


						}


						if($row['hijos'] == "SI")
						{
							$menu .= '<li>
			         						<a href="#" data-toggle="collapse" data-target="#'.$row['descripcion'].'" class="collapsed active" >
				         						<i class="'.$row['icono'].'"></i>
											    <span class="nav-label">'.$row['descripcion'].'</span>
											    <span class="fa fa-chevron-left pull-right"></span>
										    </a>'
											.$submenu.'
		         					  </li>';
     					}
     					else
     					{
     						$menu .= '<li>
			         						<a href="#">
			         						 <i class="'.$row['icono'].'"></i> 
			         						 <span class="nav-label">'.$row['descripcion'].'</span> 
										    </a>
		         					  </li>';
     					}
				         




				        // echo $row['descripcion'];
				        // echo $row['icono'];
				}

				// fin obtener hijos del elemento padre

			}
			else{
				$datos["msjNoHayRegistros"] = "El menú no se pudo cargar";
			}


			//$datos["rowsMenu"] = $menu;
			

			// obtener submenus 


			// $sql2 =	"select sub.id_elemento_menu, sub.elementos_submenu ,me.icono,me.descripcion
			// 		from rel_menus_submenus sub 
			// 		join menus me on (sub.id_elemento_menu = me.id_elemento_menu) 
			// 		order by me.id_tipo_menu asc";

			// $query2 = $this->db->query($sql2);
			
			
			// $x=0;
			// $submenu = "";
			// foreach ($query2->result_array() as $row2)
			// {
			// 	$submenu = '<ul class="sub-menu collapse" id="dashboard">';

			// 	if($row2['hijos']=="SI")
			// 	{
			// 		$enlace2 = '<a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active" >';
			// 	}
			// 	else
			// 	{
			// 		$enlace2 = '<a href="#">';
			// 	}

			//    $submenu .= '<li data-id="'.$row2['id_elemento_menu'].'">
   //       						<a href="#">
   //       						<i class="'.$row2['icono'].'"></i>
			// 				    <span class="nav-label">'.$row2['descripcion'].'</span>
			// 				    <span class="fa fa-chevron-left pull-right"></span>
			// 				    </a>
   //       					  </li></ul> ';

   //       		$datos["rowsSubmenu"] = "<ul>";

   //       		$x++;


			// }




			return $menu;



			

		}
	}
?>