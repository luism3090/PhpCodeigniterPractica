<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccesoSistema extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('ValidaLogin'); 
	}
	public function index()
	{
		$this->load->view('AccesoSistema/home');

	}


}

?>