<div id="page-wrapper">
	<div class="graphs">
		<div class="xs">
			<h3 >Liste par utilisateur et par pack</h3>
			<h5><a href="<?php echo base_url();?>index.php/Ajout/vente" class="btn btn-success"><i class="fa fa-plus"></i> Ajouter une vente</a></h5>
			<div class="tab-content">
				<table class="table">
					<thead>
						<tr>
							<th>Etudiant</th>
							<th>Pack vendu</th>
							<th>prix unitaire</th>
							<th>Nombre vendu</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($listVente as $vente) { ?>
						<tr>
							<td><?php echo $vente->nom; ?></td>
							<td><?php echo $vente->designation; ?></td>
							<td><?php echo $vente->prix; ?></td>
							<td><?php echo $vente->nombrevendu; ?></td>
							<td>
								<a href=""  style="color:#b91515;"><i class="fa fa-eye"></i></a>
							</td>	
						</tr>
						<?php } ?>

					</tbody>						
				</table>
			</div>

		</div>
	</div>
</div>