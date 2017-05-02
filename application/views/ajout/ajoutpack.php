<?php 
	$error = "";
	if(isset($erreur)) $error = '<i class="fa fa-warning"></i> '.$erreur;
 ?>
<div id="page-wrapper">
	<div class="graphs">
		<div class="xs">
			<h3 >Nouvelle pack</h3>
			<div class="tab-content">
				<div class="tab-pane active" id="horizontal-form">
					<h5 style="color:red;"><?php echo $error ?></h5>
					<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/Valider/pack">
						<div data-parsley-check-children="2" data-parsley-validate-if-empty="">
							<h5 class="col-sm-offset-2">Inserer les données du pack :</h5>
							<div class="form-group">

								<label for="focusedinput" class="col-sm-2 control-label">Designation :</label>
								<div class="col-sm-8">
									<input type="text" class="form-control1" id="focusedinput" placeholder="nom" data-parsley-group="block-2" name="designation" required>
								</div>
							</div>
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Prix :</label>
								<div class="col-sm-8">
									<input type="number" class="form-control1" id="focusedinput" min="0" placeholder="adresse" data-parsley-group="block-2" name="prix" required >
								</div>
							</div>
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Image du pack :</label>
								<div class="col-sm-8">
									<input type="file" class="form-control1" id="focusedinput" min="0" placeholder="adresse" data-parsley-group="block-2" name="image">
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