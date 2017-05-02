<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {

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

    function checkUsersExist($login, $password){
    	if($login =="" || $password==""){
    		throw new Exception("Veuillez remplir le formulaire", 1);
    	}
    	$this->db->where('code', $login);
    	$this->db->where('pass', $password);
    	$query = $this->db->get('utilisateur');

		return $query->result();

    }

    function logout(){
    	$this->session->destroy();
    }

}