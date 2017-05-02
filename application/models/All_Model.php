<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_Model extends CI_Model {

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


	function allModel($table, $column=null, $value=null){
		if($column != null){
			$this->db->where($column, $value);
		}
		$query = $this->db->get($table);

		return $query->result();
	}

	function tenFirstDataDescOrder($table, $column){
		$this->db->order_by($column,'DESC');
		$this->db->limit(10);
		$query = $this->db->get($table);

		return $query->result();
	}

	function getVenteNonPaye(){
		$this->db->where('statut <', 5);
		$query = $this->db->get('etatvente');
		
		return $query->result();
	}



	function uploadFile($oneImage){
		$error = 'ok';
		$target_dir = base_url()."webroot/images/";
		var_dump($oneImage);
		$target_file = $target_dir.basename($oneImage["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($oneImage["tmp_name"]);
		    if($check !== false) {
		        $error = "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        $error = "Veuillez choisir des fichiers images.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    $error = "Désolé, le fichier existe déjà.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($oneImage["size"] > 200000) {
		    $error = "Désolé, le fichier que vous avez choisi est trop lourde.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg") {
		    $error = "Désolé, seuls le JPG est accepté.";
		    $uploadOk = 0;
		}
		if($oneImage['name'] == ''){
			$error = "Désolé, veuillez choisir des images d'illustration.";
		    $uploadOk = 0;
		}
		// Check if $upload Ok is set to 0 by an error
		
		// if everything is ok, try to upload file
		if ($uploadOk != 0) {
		    if (move_uploaded_file($oneImage["tmp_name"], $target_file)) {
		        // $error = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		        $error = "ok";
		    } else {
		        $error = "Désolé, il y a eu une erreur durant le téléchargement de l'image";
		    }
		}

		return $error;
	}
}
