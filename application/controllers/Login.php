<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->view('login/login_view');
	}

	

	public function signin(){
		$this->load->view('login/signin_view');
	}

	public function checkExistence(){
		try {
			$login = $this->input->post('login');
			$password = $this->input->post('password');
			$users = $this->Login_Model->checkUsersExist($login,$password);

			if(count($users) == 1){
				$users[0]->pass = "";
				$this->session->set_userdata('user',$users);
					redirect('index.php/Home');
			}else{
				$data['erreur'] = "Il y a erreur sur les données inserées";
				$this->load->view('login/login_view', $data);
			}
		} catch (Exception $e) {
			$data['erreur'] = $e->getMessage();
				$this->load->view('login/login_view', $data);
		}
		
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('index.php/Login');
	}
}
