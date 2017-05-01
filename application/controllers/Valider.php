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
		 $this->load->model('Vente_Model');
		 $this->load->library('session');
		//$this->load->library('grocery_CRUD');
	 
	}

	public function vente(){
		$choixClient = $this->input->post('choixClient');
		$nomclient = $this->input->post('nomclient');
		$adresseclient = $this->input->post('adresseclient');

		$billet2[0] = $this->input->post('quantite2');
		$billet2[1] = $this->input->post('debut2');

		$billet3[0] = $this->input->post('quantite3');
		$billet3[1] = $this->input->post('debut3');

		$livraison = $this->input->post('livraison');
		$vendeur = $this->input->post('vendeur');
		$date = $this->input->post('date');

		try {
			$this->Vente_Model->insertVente($choixClient,$nomclient,$adresseclient,$billet2,$billet3,$livraison,$vendeur,$date);
		} catch (Exception $e) {
			$user = $this->session->userdata('user');

			$data['username'] = $user;
			$listClient = $this->Client_Model->allClient();
			$data['listClient'] = $listClient;
			$data['erreur'] = $e->getMessage();
			$data['contents'] = 'ajout/ajoutbillet';
			$this->load->view('default', $data);
		}

		

		
	}

	public function client(){
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
