<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Champs_Model extends CI_Model {

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
            // Your own constructor code
    } 


	function allAttribute(){
		$query = $this->db->get('champs_dispo');

		return $query->result();
	}

	function ajout_champs($designation,$type_Data, $type_champs,$choix){
		$data = array(
			'designation'  => $designation,
			'type_data'		=> $type_data,
			'type_champs'	=>$type_champs,
			'choix'			=>$choix
			);
		$this->db->insert('champs_dispo', $data);
	}

	function ajout_beneficiaire($designation,$code, $details){
		$data = array(
			'designation'  => $designation,
			'details'		=> $details,
			'code_beneficiaire'	=>$code
			);
		$this->db->insert('beneficiaire_type', $data);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}

	function getAttributeAlreadyUsed($beneficiaire_id){
		$this->db->where('beneficiaire_type_id', $beneficiaire_id);
		$this->db->select('champs_id');
		$query = $this->db->get('type_champs');

		return $query->result();
	}

	function getAttributeLesAlreadyUsed($beneficiaire_id){
		$listAlreadyUsed = $this->getAttributeAlreadyUsed($beneficiaire_id);


		if(count((array)$listAlreadyUsed)>0){
			$listUsed = array();
			foreach ($listAlreadyUsed as $key) {
				array_push($listUsed, $key->champs_id);
			}
			$this->db->where_not_in('champs_id',$listUsed);
		}	
		$this->db->order_by('statut','ASC');
		$query = $this->db->get('champs_dispo');

		return $query->result();
	}

	function getAttribute(){
		
		$this->db->order_by('statut','ASC');
		$query = $this->db->get('champs_dispo');

		return $query->result();
	}

	function getAllType(){
		$query = $this->db->get('beneficiaire_type');

		return $query->result();
	}

	function insert_type_champs($type_id, $listChamps){
		for ($i=0; $i < count($listChamps); $i++) { 
			$data = array(
				'beneficiaire_type_id'  => $type_id,
				'champs_id' => $listChamps[$i]
			);

			$this->db->insert('type_champs',$data);
		}
	}
}
