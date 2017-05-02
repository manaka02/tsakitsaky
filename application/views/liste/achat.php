<div id="page-wrapper">
	<div class="graphs">
		<div class="xs">
			<h3 >Tableau des achats à faire</h3>
			<h5><a href="<?php echo base_url();?>index.php/Liste/achatByUser" class="btn btn-success"><i class="fa fa fa-shopping-cart"></i> Faire l'achat</a></h5>
			<div class="tab-content">
				<table class="table">
					<thead>
						<tr>
							
							<th>Nom du client</th>
							<th>Pack</th>
							<th>prix de vente (Ar)</th>
							<th>prix unitaire (Ar)</th>
							<th>Nombre de billet</th>
							<th>prix total (Ar)</th>
							<th>Statut</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$totalAchat = 0;
						 foreach ($listAchat as $achat) {
							$prixtotal =  $achat->prixunitaire*$achat->nombrebillet;
							$totalAchat +=$prixtotal;
						 ?>
						<tr>
							<td><?php echo $achat->nomclient; ?></td>
							<td><?php echo $achat->nompack; ?></td>
							<td><?php echo $achat->prixvente; ?></td>
							<td><?php echo intval($achat->prixunitaire); ?></td>
							<td><?php echo $achat->nombrebillet; ?></td>
							<td><?php echo $prixtotal ?></td>
							<td>
								<?php 
									if($achat->statut <5 && $achat->statut > 1){ echo 'partiel';}
									// else if($achat->statut >=5){ echo 'payé et livré';}
									else{
										echo 'non payé';
									}
								 ?>	
							</td>
						</tr>
						<?php } ?>

					</tbody>						
				</table>
				<h2><b>Total : </b><?php echo $totalAchat; ?> Ar</h2>

			</div>

		</div>
	</div>
</div>