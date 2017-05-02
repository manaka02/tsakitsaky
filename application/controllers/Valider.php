<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Valider extends CI_Controller {

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
		 $this->load->model('Client_Model');
		 $this->load->model('Ajout_Model');
		 $this->load->model('Vente_Model');
		 $this->load->library('session');
		//$this->load->library('grocery_CRUD');
	 
	}

	public function vente(){
		$user = $this->session->userdata('user');
		if(!isset($user)){
			redirect('index.php/Login');
		} 

		$nomclient = $this->input->post('nomclient');
		$adresseclient = $this->input->post('adresseclient');
		$pack = $this->input->post('pack');
		$nombrebillet = $this->input->post('nombrebillet');
		$vendeur = $this->input->post('vendeur');
		$date = $this->input->post('date');

		try {
			$this->Vente_Model->insertVente($nomclient,$adresseclient,$pack,$nombrebillet,$vendeur,$date);
			redirect('index.php/Liste/vente');
		} catch (Exception $e) {

			$data['username'] = $user;
			$listClient = $this->Client_Model->allClient();
			$data['listClient'] = $listClient;
			$data['erreur'] = $e->getMessage();
			$data['contents'] = 'ajout/ajoutbillet';
			$this->load->view('default', $data);
		}

		

		
	}

	public function client(){
		$user = $this->session->userdata('user');
		if(!isset($user)){
			redirect('index.php/Login');
		}

		$nomclient = $this->input->post('nomclient');
		$adresseclient = $this->input->post('adresseclient');
		try {
			$client = $this->Client_Model->create_client($nomclient,$adresseclient);
		} catch (Exception $e) {
			throw new Exception("le client n'a pas pu être inséré, veuillez ressayer ultérieurement", 1);
		}
	}

	public function produit(){
		
	}

	public function pack(){
		$user = $this->session->userdata('user');
		if(!isset($user)){
			redirect('index.php/Login');
		}

		$designation = $this->input->post('designation');
		$prix = $this->input->post('prix');
		$data['username'] = $user;
		//$image = $this->input->post('image');

		try {
			$idPack = $this->Ajout_Model->insertpack($designation,$prix);
			redirect('index.php/Liste/pack');
		} catch (Exception $e) {
			$data['erreur'] = $e->getMessage();
			$data['contents'] = 'ajout/ajoutpack';
			$this->load->view('default', $data);
			
		}
	}

	public function packdetails(){
		$idPack = $this->input->post('idPack');
		$nombreproduit = $this->input->post('nombreproduit');
		$produit = $this->input->post('produit');
		$listProduit =  $this->All_Model->allModel("produit");

		$this->Ajout_Model->insertpack($designation,$prix);


	}

	public function paye(){
		$idvente = $this->input->post('idvente');
		$restant = $this->input->post('restant');
		$montant = $this->input->post('montant');

		$this->Vente_Model->insertPaye($idvente, $restant, $montant);
	}



	
}
