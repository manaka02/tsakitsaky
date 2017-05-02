<div id="page-wrapper">
	<div class="graphs">
		<div class="xs">
			<h3 >Etat de payement de chaque etudiant</h3>
			<div class="tab-content">
				<table class="table">
					<thead>
						<tr>
							
							<th>Etudiant</th>
							<th>Code</th>
							<th>Nombre billet vendu</th>
							<th>déjà payé (Ar)</th>
							<th>reste à payé</th>
						</tr>
					</thead>
					<tbody>
						<?php
						 foreach ($listetat as $etat) {
						 ?>
						<tr>
							<td><?php echo $etat->nom; ?></td>
							<td><?php echo $etat->code; ?></td>
							<td><?php echo $etat->nombrebilet; ?></td>
							<td><?php echo $etat->dejapayee; ?></td>
							<td><?php echo intval($etat->reste); ?></td>
							
						</tr>
						<?php } ?>

					</tbody>						
				</table>

			</div>

		</div>
	</div>
</div>