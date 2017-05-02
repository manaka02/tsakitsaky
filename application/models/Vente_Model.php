<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vente_Model extends CI_Model {

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
            $this->load->model('Client_Model');
            date_default_timezone_set('Asia/Dubai');
    } 

    function generateBillet($idpack, $nombrebillet){
        try {
            $lastid = $this->getLastBillet();
            for ($i=0; $i < $nombrebillet; $i++) { 
                $this->create_billet($idpack, $lastid[0]->idbillet + $i, date('Y-m-j'));
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), 1);
            
        }
        
    }

    function getLastBillet(){
        $this->db->select_max('idbillet');
        $query = $this->db->get('billet');
        return $query->result();
    }

    function insertVente($nomclient,$adresseclient,$pack,$nombrebillet,$utilisteur,$date){
        $this->db->trans_begin();
        $nombre = intval($nombrebillet);
        $data = array(
            'idpack'   => $pack,
            'idutilisateur'   => $utilisteur,
            'nomclient'   => $nomclient,
            'adresse'   => $adresseclient,
            'nombre'   => $nombre,
            'statut'   => 1,
            'dateajout'   => date('Y-m-j')
        );  
        $this->db->insert('vente', $data);
        // Commit ou rollback    
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
    }

    function insertPaye($idvente, $restants, $montants){
        $this->db->trans_begin();
        $restant = intval($restants);
        $montant = intval($montants);

        $newstatut = 3;

        if($montant == $restant){
            $newstatut = 6;
        }else if($montant > $restant){
            throw new Exception("La valeur doit être inferieure ou égale à celui du restant à payé (".$restant.")", 1); 
        }
        $this->create_paye($idvente, $montant, date('Y-m-j'));
        $this->update_statutvente($idvente, $newstatut);
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
    }



    // function create_vente($idclient, $idutilisateur, $adresse, $statut, $date){
    //     $data = array(
    //         'idclient'   => $idclient,
    //         'idutilisateur'   => $idutilisateur,
    //         'adresse'   => $adresse,
    //         'statut'   => $statut,
    //         'date'   => $date
    //     );  
    //     $this->db->insert('vente', $data);
    //     return $this->db->insert_id();
    // }
    function create_paye($idvente, $montant, $dateajout){
        $data = array(
            'idvente'   => $idvente,
            'montant'   => $montant,
            'dateajout'   => $dateajout
        );  
        return $this->db->insert('payement', $data);
    }  

    function update_statutvente($idvente, $newstatut){
        $data = array(
            'statut'   => $newstatut
        ); 
        $this->db->where('idvente', $idvente);
        $this->db->update('vente', $data);
    }  

    function create_facturefille($idvente, $idbillet, $valeur){
        $data = array(
            'idvente'   => $idvente,
            'idbillet'   => $idbillet,
            'valeur'   => $valeur
        );  
        return $this->db->insert('facturefille', $data);
    }

    function create_billet($idpack,$numero,$datecreation){
        $data = array(
            'idpack'   => $idpack,
            'numero'   => $numero,
            'datecreation'   => $datecreation
        );  
        return $this->db->insert('billet', $data);
    }

}