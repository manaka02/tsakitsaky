<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestion de Fichier - Sènan</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/css/style2.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <?php $erreur = "";
    	if(isset($error)) $erreur = "Il y a erreur sur le login ou le mot de passe";
     ?>
</head>

<body>

<div class="login-page">
	  <div class="form">  
	  
	  	<h1 class="title">Blank - Login</h1>
	  	<p class="text-danger"><?php echo $erreur; ?></p>
	    <form class="login-form" method="POST" action="<?php echo site_url('Login_Controller'); ?>index.php/checkExistence">
	      <input type="text" placeholder="login" name="login"/>
          <input type="mail" placeholder="login" name="login"/>
	      <input type="password" placeholder="mot de passe" name="password"/>
          <input type="password" placeholder="retaper le mot de passe" name="repassword"/>
	      <button type="submit" >S'inscrire</button>
	    </form>
	  </div>
	</div>
</body>
</html>
