<div id="page-wrapper">
	<div class="graphs">
		<div class="xs">
			<h3 >Liste des dernières pack ajoutées</h3>
			<h5><a href="<?php echo base_url();?>index.php/Ajout/pack" class="btn btn-success"><i class="fa fa fa-shopping-cart"></i> Nouveau pack</a></h5>
			<div class="tab-content">
				<table class="table">
					<thead>
						<tr>
							
							<th>Nom du pack</th>
							<th>prix de vente (Ar)</th>
							<th>Nombre d'ingredient</th>
							<th>prix d'achat (Ar)</th>
							<th>Operation</th>
						</tr>
					</thead>
					<tbody>
						<?php
						 foreach ($listPack as $pack) {
						 ?>
						<tr>
							<td><?php echo $pack->designation; ?></td>
							<td><?php echo $pack->prixvente; ?></td>
							<td><?php echo $pack->nombreingredient; ?></td>
							<td><?php echo intval($pack->prixachat); ?></td>
							<td>
								<i><a href="<?php echo base_url();?>index.php/Ajout/packdetails?id=<?php echo $pack->idpack; ?>"><i class="fa fa-cog"></i></a></i>
								<i><a href=""><i class="fa fa-trash-o"></i></a></i>
							</td>
						</tr>
						<?php } ?>

					</tbody>						
				</table>

			</div>

		</div>
	</div>
</div>