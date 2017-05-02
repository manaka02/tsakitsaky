<?php 
	$error = "";
	if(isset($erreur)) $error = '<i class="fa fa-warning"></i> '.$erreur;
	$totalPaye= $vente->prixunitaire*$vente->nombrebillet;
	$restant = $totalPaye - $vente->dejapaye;
 ?>
<div id="page-wrapper">
	<div class="graphs">
		<div class="xs">
			<h3 >Nouveau payement</h3>
				<div class="tab-content">
					<h5><b style="color:blue;">Vente à :</b> <?php echo $vente->nomclient; ?></h5>
					<h5><b style="color:blue;">Montant total à payé : </b><?php echo $totalPaye; ?> Ar</h5>
					<h5><b style="color:blue;">Montant déjà payé : </b><?php echo $vente->dejapaye; ?> Ar</h5>
					<h5><b style="color:blue;">Nombre de billet : </b> <?php echo $vente->nombrebillet; ?></h5>
					<h5><b style="color:blue;">Montant restant payé : </b><?php echo $restant; ?> Ar</h5>
					<hr>	

					<h5 style="color:red;"><?php echo $error ?></h5>
					<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/Valider/paye">
						<div data-parsley-check-children="2" data-parsley-validate-if-empty="">
							<h5 class="col-sm-offset-2">Inserer la valeur du payement:</h5>
							<input type="hidden" name="idvente" value="<?php echo $vente->idvente; ?>">
							<input type="hidden" name="restant" value="<?php echo $restant; ?>">
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">valeur (Ar) :</label>
								<div class="col-sm-8">
									<input type="number" class="form-control1" id="focusedinput" min="0" data-parsley-group="block-2" name="montant" required onblur="if (this.value == '' || this.value <0 ) {this.value = '0';}" value="0">
								</div>
							</div>
						</div>

						<div class="form-group col-sm-10" >
							<input class="btn btn-primary btn-lg pull-right" type="submit" value="Sauvegarder">
						</div>
						<hr>
					</form>
				</div>
			</div>
		</div>
	</div>
<div class="clearfix"> </div>