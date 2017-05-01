<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flux_Model extends CI_Model {

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

    function readExcel($file){
    		$objPHPExcel = PHPExcel_IOFactory::load($file);
			//get only the Cell Collection
			$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
			//extract to a PHP readable array format
			$header = array();$arr_data=array();
			foreach ($cell_collection as $cell) {
				 $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
				 $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
				 $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
				 //header will/should be in row 1 only. 
				 if ($row == 1) {
				 $header[$row][$column] = $data_value;
				 } else {
				 $arr_data[$row][$column] = $data_value;
				 }
			}
			$data['header'] = $header;
			$data['arr_data'] = $arr_data;
		return $data;
    }

    function insertData($arr_data, $listChamps){
    	foreach ($arr_data as $row) {

    	}

    }

    function listChampsObligatoire(){
    	$listNeeded = $this->getChampsObligatoire();
    	    	$this->db->select('champs_id,designation');
    	$this->db->where_in('designation',$listNeeded);
    	$sql = $this->db->get('champs_dispo');

    	$listNeed = $sql->result();
    	return $listNeed;
    }

    function getChampsObligatoire(){
    	return array('Nom Bénéficiaires','Prénom Bénéficiaire','Sexe','Nationalite','Commune','type_beneficiaire','Type d\'aide','Formation souhaitée');
    }

    function isChoixValid($listChoix){
    	$listObli = $this->listChampsObligatoire();

    	$isFind = false;
    	foreach ($listObli as $value) {
    		for ($i=0; $i < count($listChoix); $i++) { 
    			if($value->champs_id == $listChoix[$i]){
    				$isFind = true;
    				break;
    			}
    		}
    		if(!$isFind) return $value->champs_id;

    		$isFind = false;
    	}
    	return 0;
    }

}