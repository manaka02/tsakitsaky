<div id="page-wrapper">
	<div class="graphs">
		<div class="xs">
			<h3 >Nouveau client</h3>
			<div class="tab-content">
				<div class="tab-pane active" id="horizontal-form">
					<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/Valider/client">
						<div data-parsley-check-children="2" data-parsley-validate-if-empty="">

							<h5 class="col-sm-offset-2">veuillez inserer les informations :</h5>
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
						
						<div class="form-group col-sm-10">
							<input class="btn btn-primary btn-lg pull-right" type="submit" value="Sauvegarder">
						</div>
						<br>
					</form>
				</div>
			</div>
		</div>
	</div>
<div class="clearfix"> </div>