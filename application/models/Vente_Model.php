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

    function insertVente($choixClient,$nomclient,$adresseclient,$billet2,$billet3,$livraison,$idvendeur,$date){
        $idclient = "";
        $adresse = $livraison;
        $datelivraison = $date;

        $this->db->trans_begin();

            // action sur le client
            if($choixClient != ""){
                $clientData = explode(";",$choixClient);
                $idclient = $clientData[0];
            }else if($choixClient == "" && $nomclient != "" && $adresseclient != ""){
                $idclient = $this->Client_Model->create_client($nomclient, $adresseclient);

            }else{
                throw new Exception("Veuillez completer au moins l'un des choix d'insertion de client", 1);  
            } 

            // action sur la date
            if($date == "") $datelivraison =  date('Y-m-j');
            
            // Action sur l'adresse de livraison
            if($livraison == ""){
                if($adresseclient != ""){
                    $adresse = $adresseclient;
                }else{
                    $clientData = explode(";",$choixClient);
                    $adresse = $clientData[1];
                }
            }

            // insertion de la vente
            $idvente = $this->create_vente($idclient,$idvendeur, $adresse,1,$datelivraison);

            // Action sur les billets et insertion facture fille;
            try {              
                if($billet2[0] == "0" && $billet3[0] == "0"){
                    $this->db->trans_rollback();
                    throw new Exception("On ne peut pas inserer une vente avec une quantité nulle", 1);        
                }else{
                    if($billet2[0] != "0"){
                    $quantity = intval($billet2[0]);
                    $debut = intval($billet2[1]);
                        for ($i=0; $i < $quantity ; $i++) { 
                            $this->create_facturefille($idvente,$billet2[1]+$i,20000);
                        }
                    }
                    if($billet3[0] != "0"){
                        $quantity = intval($billet3[0]);
                        $debut = intval($billet3[1]);
                        for ($i=0; $i < $quantity ; $i++) { 
                            $this->create_facturefille($idvente,$billet3[1]+$i,20000);
                        }
                    }
                }
                
                
            } catch (Exception $e) {
                throw new Exception("Il se peut que parmis les billets, il y en a ceux qui sont déjà vendus ou vous avez mis tous les compteurs à 0", 1);
                
            }

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



    function create_vente($idclient, $idutilisateur, $adresse, $statut, $date){
        $data = array(
            'idclient'   => $idclient,
            'idutilisateur'   => $idutilisateur,
            'adresse'   => $adresse,
            'statut'   => $statut,
            'date'   => $date
        );  
        $this->db->insert('vente', $data);
        return $this->db->insert_id();
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