<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		 $this->load->model('Login_Model');
		 $this->load->library('session');
		//$this->load->library('grocery_CRUD');
	 
	}

	public function index()
	{	
		
		$user = $this->session->userdata('user');
		if(!isset($user)){
			redirect('index.php/Login');
		}

		$data['username'] = "toavin";
		$data['contents'] = 'home/home';
		$this->load->view('default', $data);
	}

}
