<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Liste extends CI_Controller {

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
		 $this->load->model('All_Model');
		 $this->load->library('session');
		//$this->load->library('grocery_CRUD');
	 
	}

	public function index()
	{
		$user = $this->session->userdata('user');

		$data['username'] = $user;
		$data['contents'] = 'home/home';
		$this->load->view('default', $data);
	}

	public function vente(){
		$user = $this->session->userdata('user');
		if(!isset($user)){
			redirect('index.php/Login');
		}

		$data['username'] = $user;
		$listVente = $this->All_Model->tenFirstDataDescOrder("ventedetails","idvente");
		
		$data['listVente'] = $listVente;
		$data['contents'] = 'liste/vente';
		$this->load->view('default', $data);
	}

	public function venteByUser(){
		$user = $this->session->userdata('user');
		if(!isset($user)){
			redirect('index.php/Login');
		}

		$data['username'] = $user;
		$listVente = $this->All_Model->allmodel("ventebyuser");
		
		$data['listVente'] = $listVente;
		$data['contents'] = 'liste/ventebyuser';
		$this->load->view('default', $data);
	}


	public function client(){
		$user = $this->session->userdata('user');
		if(!isset($user)){
			redirect('index.php/Login');
		}

		$data['username'] = "toavina";
		$data['contents'] = 'ajout/ajoutclient';
		$this->load->view('default', $data);
	}

	public function produit(){

	}

	public function pack(){
		$user = $this->session->userdata('user');
		if(!isset($user)){
			redirect('index.php/Login');
		}

		$listPack =  $this->All_Model->tenFirstDataDescOrder("packprixrevient","idpack");

		$data['username'] = $user;
		$data['listPack'] = $listPack;
		$data['contents'] = 'liste/pack';
		$this->load->view('default', $data);
	}

	public function payement(){
		$user = $this->session->userdata('user');
		if(!isset($user)){
			redirect('index.php/Login');
		}

		$listVente = $this->All_Model->allModel("etatvente", 'statut <', 5);
		$data['username'] = $user;
		$data['listVente'] = $listVente;
		$data['contents'] = 'liste/payement';
		$this->load->view('default', $data);
	}

	public function montantrecu(){
		$user = $this->session->userdata('user');
		if(!isset($user)){
			redirect('index.php/Login');
		}

		$listetat = $this->All_Model->allModel("etatetudiant");
		$data['username'] = $user;
		$data['listetat'] = $listetat;
		$data['contents'] = 'liste/montantrecu';
		$this->load->view('default', $data);
	}

	public function montantreste(){
		$user = $this->session->userdata('user');
		if(!isset($user)){
			redirect('index.php/Login');
		}

		$listVente = $this->All_Model->allModel("venteprix");
		$data['username'] = $user;
		$data['listVente'] = $listVente;
		$data['contents'] = 'liste/montantreste';
		$this->load->view('default', $data);
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
