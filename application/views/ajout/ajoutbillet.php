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
							<h5 class="col-sm-offset-2">Choisir parmis les anciens clients :</h5>
							<div class="form-group">
								<label for="choixClient" class="col-sm-2 control-label">Choisir un client </label>
								<div class="col-sm-8"><select name="choixClient" id="choixClient" class="form-control1" data-parsley-group="block-1">
									<option></option>
									<?php foreach ($listClient as $client) { ?>
										<option value="<?php echo $client->idclient.';'.$client->adresse; ?>"><?php echo $client->nom; ?></option>
									<?php } ?>
								</select></div>
							</div>
							<h5 class="col-sm-offset-2">ou inserer un nouveau client :</h5>
							<div class="form-group">

								<label for="focusedinput" class="col-sm-2 control-label">Nom :</label>
								<div class="col-sm-8">
									<input type="text" class="form-control1" id="focusedinput" placeholder="nom" data-parsley-group="block-2" name="nomclient">
								</div>
							</div>
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Adresse :</label>
								<div class="col-sm-8">
									<input type="text" class="form-control1" id="focusedinput" placeholder="adresse" data-parsley-group="block-2" name="adresseclient">
								</div>
							</div>
						</div>
						<hr>

						<!-- liste des billet et les nombres achetés -->
						<h5 class="col-sm-offset-2">Le type de billet et le nombre vendu:</h5>
						<div class="form-group">
							<h5 class="col-sm-offset-5">Billet 20000Ar</h5>
							<label class="col-md-2 control-label">Quantité :</label>
							<div class="col-md-3">
								<div class="input-group">
									
									<input type="number" name="quantite2" class="form-control1" id="type1" value="0" onblur="if (this.value == '') {this.value = '0';}">
								</div>
							</div>
							<label class="col-md-2 control-label">Numéro de début :</label>
							<div class="col-md-3">
								<div class="input-group">
									
									<input type="number" name="debut2" class="form-control1" id="type1" value="1" onblur="if (this.value == '') {this.value = '1';}">
								</div>
							</div>
						</div>
						<hr>
						<div class="form-group">	
							<h5 class="col-sm-offset-5">Billet 30000Ar</h5>
							<label class="col-md-2 control-label">Quantité :</label>
							<div class="col-md-3">
								<div class="input-group">
									
									<input type="number" name="quantite3" class="form-control1" id="type1" value="0" onblur="if (this.value == '') {this.value = '0';}">
								</div>
							</div>
							<label class="col-md-2 control-label">Numéro de début :</label>
							<div class="col-md-3">
								<div class="input-group">
									
									<input type="number" name="debut3" class="form-control1" id="type1" value="1" onblur="if (this.value == '') {this.value = '1';}">
								</div>
							</div>
						</div>
						<hr>

						<h5 class="col-sm-offset-2">Le lieu de livraison <small style="color:black;"> ( *à ignorer si c'est la même que l'adresse du client)</small> :</h5>
						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Adresse :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="focusedinput" placeholder="adresse" name="livraison">
							</div>
						</div>
						<hr>
						<h5 class="col-sm-offset-2">Le vendeur :</h5>
						<div class="form-group">
							<label for="vendeur" class="col-sm-2 control-label">Choisir le vendeur </label>
							<div class="col-sm-8"><select name="vendeur" id="vendeur" class="form-control1" required>
								<option value="1">Menaka</option>
								<option value="2">Toavina</option>
								<option value="3">Rakoto</option>
								<option value="4">Railovy</option>
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