<?php 
	class CargarMenu extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function getMenuSoloHastaNivel3()
		{
			

				// --------------------------------------- CARGAR MENU DE SOLO 3 NIVELES  ---------------------------------------

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
								$elementos_hijos = array("id_elemento_menu" => array());

								if($row['elementos_submenu'] != "")
								{


												$elementos_submenu = explode(",",$row['elementos_submenu']);
												


												// verificar si un hijo tiene mas hijos 

												$x = 0;
												foreach ($elementos_submenu as $index => $valor) 
									 			{
								    				$sql3 =	"select 
															me.id_tipo_menu,
															sub.id_elemento_menu, 
															sub.elementos_submenu 
															from rel_menus_submenus sub
															join menus me on (sub.id_elemento_menu = me.id_elemento_menu)
															where me.id_elemento_menu = ?";

														$query3 = $this->db->query($sql3,$valor);


														if($query3->num_rows() > 0)
														{
															$elementos_hijos["id_elemento_menu"][$x] = $valor;
															$elementos_hijos["hijos"][$x] = $query3->result()[0]->elementos_submenu;
															//return $query3->result();
															//exit();
															$x++;
														}

												}

												//  return $elementos_hijos;
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



												// Fin verificar si un hijo tiene mas hijos 


												$submenu = '<ul class="sub-menu collapse" id="'.$row['descripcion'].'">';

												$sub_Submenu ="";

												foreach ($query2->result_array() as $row2)
												{
													$sub_Submenu ="";

													for($i=0; $i < count($elementos_hijos["id_elemento_menu"]); $i++)
													{
									    				if( $row2['id_elemento_menu'] == $elementos_hijos['id_elemento_menu'][$i] )
									    				{

									    					$sql4 =	"select 
																	id_elemento_menu,
																	descripcion,
																	icono,
																	hijos
																	from menus
																	where id_elemento_menu in ?
																	order by id_elemento_menu";


															//$query4 = $this->db->query($sql4,array($elementos_hijos["hijos"]));

															$elementos = explode(",",$elementos_hijos["hijos"][$i]);

															$query4 = $this->db->query($sql4,array($elementos));

															//return $elementos_hijos["hijos"];
															//return $elementos_hijos["hijos"][$i];
															//exit();

															$sub_Submenu = '<ul class="sub-menu collapse" id="'.$row2['descripcion'].'">'; 

															foreach ($query4->result_array() as $row4)
															{
																$sub_Submenu .= '<li>
														         						<a href="#">'
														         							.$row4['descripcion'].'
																					    </a>
														         					 </li>';



															}

															$sub_Submenu .= "</ul>";

									    				}

													}


													if($row2['hijos']=="SI")
													{
														$submenu .= '<li>
										         						<a href="#" data-toggle="collapse" data-target="#'.$row2['descripcion'].'" class="collapsed active" >
											         						<i class="'.$row2['icono'].'"></i>
																		    <span class="nav-label">'.$row2['descripcion'].'</span>
																		    <span class="fa fa-chevron-left pull-right"></span>
																	    </a>'
																	.$sub_Submenu.'
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


					return $menu;

		}


		public function getElmentosMenu()
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



				
		}

	}
?>