<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajout extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
	        parent::__construct();
	 
	/* Standard Libraries of codeigniter are required */
		$this->load->database();
		$this->load->helper('url');
		/* ------------------ */ 
		 $this->load->model('Ajout_Model');
		 $this->load->model('Client_Model');
		 $this->load->library('session');
		//$this->load->library('grocery_CRUD');
	 
	}

	public function index()
	{
		$user = $this->session->userdata('user');

		$data['username'] = "toavina";
		$data['contents'] = 'home/home';
		$this->load->view('default', $data);
	}

	public function vente(){
		$user = $this->session->userdata('user');

		$data['username'] = $user;
		$listClient = $this->Client_Model->allClient();
		$data['listClient'] = $listClient;
		$data['contents'] = 'ajout/ajoutbillet';
		$this->load->view('default', $data);
	}

	public function client(){
		$user = $this->session->userdata('user');

		$data['username'] = "toavina";
		$data['contents'] = 'ajout/ajoutclient';
		$this->load->view('default', $data);
	}

	public function produit(){

	}

	// public function index()
	// {
	// 	$user = $this->session->userdata('user');
	// 	if(!isset($user)){
	// 		redirect('/Login_Controller');
	// 	}
	// 	$data['username'] = $user[0]->login;
	// 	$data['contents'] = 'home/home_view';
	// 	$this->load->view('default', $data);
	// }
}
