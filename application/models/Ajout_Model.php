<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajout_Model extends CI_Model {

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
          $this->load->model('All_Model');
            // Your own constructor code
    } 


	function insertpack($nompack,$montant){
		$this->db->trans_begin();
		try {
			if($nompack == "" || $montant == ""){
				throw new Exception("Veuillez bien remplir le formulaire", 1);
			}
			 $data = array(
            'designation'   => $nompack,
            'prix'   => intval($montant)
       		 );  
        	$this->db->insert('pack', $data);
        		$idpack = $this->db->insert_id();
        	 
        	 $this->db->trans_commit();
		} catch (Exception $e) {
			$this->db->trans_rollback();
			throw new Exception($e, 1);
			
		}

	}

	function create_pack($nompack, $montant){
		 
	}

	function create_packdetails($idpack,$idproduit,$valeur){
		 $data = array(
            'idpack'   => $idpack,
            'idproduit'   => $idproduit,
            'valeur'   => $valeur
        );  
        $this->db->insert('packproduit', $data);
        return $this->db->insert_id();
	}

	
}
