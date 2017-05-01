<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tsakitsaky</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/css/style2.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <?php $error = "";
    	if(isset($erreur)) $error = $erreur;
     ?>
</head>

<body>

<div class="login-page">
	  <div class="form">  
	  
	  	<h1 class="title">Blank - Login</h1>
	  	<p class="text-danger"><?php echo $error; ?></p>
	    <form class="login-form" method="POST" action="<?php echo base_url();?>index.php/Login/checkExistence">
	      <input type="text" placeholder="login" name="login"/>
	      <input type="password" placeholder="mot de passe" name="password"/>
	      <button type="submit" >Se connecter</button>
          <p>Vous n'avez pas encore de compte?</p>
          <a href="Login_Controller/signin">Inscrivez-vous ici<span class="fa fa-left-arrow"></span></a>
	    </form>
	  </div>
	</div>
</body>
</html>
