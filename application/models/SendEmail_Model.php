<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SendEmail_Model extends CI_Model {

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

    function sendEmail($destinatiaire, $sujet,$message){
    	$config = Array(
	      'protocol' => 'smtp',
	      'smtp_host' => 'ssl://smtp.googlemail.com',
	      'smtp_port' => 587,
	      'mailtype' => 'html',
	      'charset' => 'iso-8859-1',
	      'wordwrap' => TRUE
	    );

          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");
          $this->email->from('toavina@gmail.com');
          $this->email->to('toavina.apsesame2013@gmail.com');
          $this->email->subject('Your Subject');
          $this->email->message($message);
          if($this->email->send())
         {
          echo 'Email sent.';
         }
         else
        {
         show_error($this->email->print_debugger());
        }

    }

}