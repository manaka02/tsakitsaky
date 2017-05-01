<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beneficiaire_Model extends CI_Model {

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

	function checkAllTypeAide(){
		$query = $this->db->get('type_aide');

		return $query->result();
	}

	function getChampsByBeneficiaire($type_beneficaire){
		$this->db->order_by('statut ASC, champs_id Asc');
		$this->db->where('beneficiaire_type_id', $type_beneficaire);
		$query = $this->db->get('champByBeneficiaire');

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

	function insert_new_beneficiaire($type_beneficaire, $type_aide, $date){
		$data = array(
			'beneficiaire_type_id'  => $type_beneficaire,
			'type_aide_id'		=> $type_aide,
			'date_ajout'	=>$date
			);
		$this->db->insert('beneficiaire', $data);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}

	function insert_champs_beneficiaire($beneficiaire_id, $listData){
		foreach ($listData as $value) {
			$data = array(
				'beneficiaire_id' => $beneficiaire_id,
				'champs_id' => $value[0],
				'valeurs' => $value[1] 
			);
			$this->db->insert('beneficiaire_data', $data);
		}
	}


}
