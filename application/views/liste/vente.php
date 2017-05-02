<div id="page-wrapper">
	<div class="graphs">
		<div class="xs">
			<h3 >Liste des dernières ventes</h3>
			<h5><a href="<?php echo base_url();?>index.php/Liste/venteByUser" class="btn btn-success">Liste par étudiant et par pack ici</a></h5>
			<div class="tab-content">
				<table class="table">
					<thead>
						<tr>
							<th>Etudiant</th>
							<th>Nom du client</th>
							<th>adresse</th>
							<th>Pack choisi</th>
							<th>Nombre</th>
							<th>Statut</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($listVente as $vente) { ?>
						<tr>
							<td><?php echo $vente->nom; ?></td>
							<td><?php echo $vente->nomclient; ?></td>
							<td><?php echo $vente->adresse; ?></td>
							<td><?php echo $vente->designation; ?></td>
							<td><?php echo $vente->nombre; ?></td>
							<td>
								<?php 
									if($vente->statut <5 && $vente->statut > 1){ echo 'partiel';}
									else if($vente->statut >=5){ echo 'payé et livré';}
									else{
										echo 'non payé';
									}
								 ?>	
							</td>
							<td>
								<i><a href="<?php echo base_url();?>index.php/Ajout/paye?id=<?php echo $vente->idvente; ?>"><i class="fa fa-cog"></i> Payer</a></i>
							</td>
						</tr>
						<?php } ?>

					</tbody>						
				</table>
			</div>

		</div>
	</div>
</div>