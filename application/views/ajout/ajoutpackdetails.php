<?php 
	$error = "";
	if(isset($erreur)) $error = '<i class="fa fa-warning"></i> '.$erreur;
 ?>
<div id="page-wrapper">
	<div class="graphs">
		<div class="xs">
			<h3 ><?php echo $pack[0]->designation.' ('.$pack[0]->prix.'Ar)'; ?></h3>
			<div class="tab-content">
				<div class="tab-pane active" id="horizontal-form">
					<h5 style="color:red;"><?php echo $error ?></h5>
					<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/Valider/packdetails">
						<input type="hidden" name="idpack" value="<?php echo $pack[0]->idpack; ?>">
						<input type="hidden" name="nombreproduit" value = "<?php echo count($listProduit); ?>">
						<h5 class="col-sm-offset-3">Inserer ou modifier les détails du pack :</h5>
						<b class="col-sm-offset-3" >Total : <i>0Ar</i></b>
						<br>
						<?php foreach ($listProduit as $produit) { ?>
							<div class="form-group">
								<label for="focusedinput" class="col-sm-3 control-label"><?php echo $produit->designation.' (en '.$produit->unite.')'; ?> : <p><?php echo $produit->prix.'Ar/'.$produit->valeur.$produit->unite; ?></p></label>
								<div class="col-sm-5">
									<input type="number" class="form-control1" id="focusedinput" min="0" placeholder="nombre" data-parsley-group="block-2" name="<?php echo 'produit[]';  ?>" onblur="if (this.value == '' || this.value <0 ) {this.value = '0';}" value="0" >
								</div>
								<div class="col-sm-2">
								</div>
							</div>
						<?php } ?>

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