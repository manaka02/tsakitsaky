<?php 
	$error = "";
	if(isset($erreur)) $error = '<i class="fa fa-warning"></i> '.$erreur;
 ?>
<div id="page-wrapper">
	<div class="graphs">
		<div class="xs">
			<h3 >Nouvelle vente</h3>
			<div class="tab-content">
				<div class="tab-pane active" id="horizontal-form">
					<h5 style="color:red;"><?php echo $error ?></h5>
					<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/Valider/vente">
						<div data-parsley-check-children="2" data-parsley-validate-if-empty="">
							<h5 class="col-sm-offset-2">Inserer les données du client :</h5>
							<div class="form-group">

								<label for="focusedinput" class="col-sm-2 control-label">Nom :</label>
								<div class="col-sm-8">
									<input type="text" class="form-control1" min="0" id="focusedinput" placeholder="nom" data-parsley-group="block-2" name="nomclient" required>
								</div>
							</div>
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Adresse :</label>
								<div class="col-sm-8">
									<input type="text" class="form-control1" id="focusedinput" min="0" placeholder="adresse" data-parsley-group="block-2" name="adresseclient" required >
								</div>
							</div>
						</div>
						<hr>

						<!-- liste des billet et les nombres achetés -->
						<h5 class="col-sm-offset-2">Le type de billet et le nombre vendu:</h5>
						<div class="form-group">
							<label for="pack" class="col-sm-2 control-label">Type de pack : </label>
							<div class="col-sm-8"><select name="pack" id="pack" class="form-control1" required>
								<?php foreach ($listPack as $pack) { ?>
									<option value="<?php echo $pack->idpack; ?>"><?php echo $pack->designation.'  '.$pack->prix; ?></option>
								<?php } ?>

							</select></div>
						</div>
						<hr>
						<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Nombre de billet :</label>
								<div class="col-sm-5">
									<input type="number" class="form-control1" id="focusedinput" min="0" placeholder="" data-parsley-group="block-2" name="nombrebillet" onblur="if (this.value == '' || this.value<0) {this.value = '1';}" value="1">
								</div>
							</div>
						<hr>

						<h5 class="col-sm-offset-2">Le vendeur :</h5>
						<div class="form-group">
							<label for="vendeur" class="col-sm-2 control-label">Choisir le vendeur </label>
							<div class="col-sm-8"><select name="vendeur" id="vendeur" class="form-control1" required>
								<?php foreach ($listUser as $user) { ?>
									<option value="<?php echo $user->idutilisateur; ?>"><?php echo $user->nom; ?></option>
								<?php } ?>

							</select></div>
						</div>
						<hr>
						<h5 class="col-sm-offset-2">Date de vente :</h5>
						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">date :</label>
							<div class="col-sm-8">
								<input type="date" class="form-control1" id="focusedinput" placeholder="adresse" name="date">
							</div>
						</div>

						<div class="form-group col-sm-10" >
							<input class="btn btn-primary btn-lg pull-right" type="submit" value="Sauvegarder">
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
<div class="clearfix"> </div>