<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SendEmail_Controller extends CI_Controller {

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
		$this->load->model('SendEmail_Model');
		 $this->load->library('session');
		 $this->load->library('email');
		//$this->load->library('grocery_CRUD');
	} 

	public function index()
	{
		$data['contents'] = 'email/email_view';
		$user = $this->session->userdata('user');
		if(!isset($user)){
			redirect('/Login_Controller');
		}
		$data['username'] = $user[0]->login;
		$this->load->view('default', $data);
	}

	public function send(){
		// $destinataire = $this->input->post('destinataire');
		// $sujet = $this->input->post('sujet');
		// $message = $this->input->post('message');
		
		$destinataire = "toavina.apsesame2013@gmail.com";
		$sujet = 'test';
		$message = "Bonjour à tous";

		var_dump($destinataire);
		var_dump($sujet);
		var_dump($message);

		$this->SendEmail_Model->sendEmail($destinataire, $sujet,$message);
		

	}
}
