<div id="content" >
		<div class="panel box-shadow-none content-header">
		  <div class="panel-body">
			<div class="col-md-12">
				<h3 class="animated fadeInLeft">Gestion Electronique de Document</h3>
				<p class="animated fadeInDown">
				  index <span class="fa-angle-right fa"></span> Ged
				</p>
			</div>
		  </div>
		</div>

		<div class="col-md-12 top-20 padding-0">
			<div class="col-md-12">
			  <div class="panel">
				<div class="panel-heading"><h3>G.E.D</h3></div>
				<div class="panel-body">
						<div class="col-md-12">
						<div class="col-md-1">
						<label>CLIENT</label>
						</div>
						<div class="col-md-3">
							<select multiple style="width:100%;" id="dataclient">
								<?php $i=1; foreach($client as $clie): ?>
									<option value="<?php echo $clie->client_id; ?>">
											<?php echo $clie->libelle_client; ?>
									</option>
								<?php $i++; endforeach; ?>											
							</select>
						</div>
						
						<div class="col-md-1">
						<label>PRESTATION</label>
						</div>
						<div class="col-md-3">
							<select multiple style="width:100%;" id="slct_presta">
								<?php $i=1; foreach($presta as $prest): ?>
									<option value="<?php echo $prest->presta_id; ?>">
											<?php echo $prest->libelle_presta.'_'.$prest->nom_presta; ?>
									</option>
								<?php $i++; endforeach; ?>
							</select>
						</div>
						
						<div class="col-md-1">
						<label>COMMANDE</label>
						</div>
						<div class="col-md-3">
							<select multiple style="width:100%;" id="slct_commande">
								<?php $i=1; foreach($commande as $cmd): ?>
									<option value="<?php echo $cmd->commande_id; ?>">
											<?php echo $cmd->commande_id; ?>
									</option>
								<?php $i++; endforeach; ?>
							</select>
						</div>
						</div>
						<div class="col-md-12">
						<div class="col-md-1">
						<label>NUMEROS LOT</label>
						</div>
						<div class="col-md-3">
							<select multiple style="width:100%;" id="slct_lot">
								<?php $i=1; foreach($lot as $lt): ?>
									<option value="<?php echo $lt->lot_id; ?>">
											<?php echo $lt->nom_lot; ?>
									</option>
								<?php $i++; endforeach; ?>
							</select>
						</div>
						
						<div class="col-md-1">
						<label>Statut pli</label>
						</div>
						<div class="col-md-3">
							<select multiple style="width:100%;" id="slct_statut_pli">
									<option>OK</option>
									<option>KO</option>
									<option>RE</option>
									<option>CI</option>
							</select>
						</div>
						</div>
						
						<div class="col-md-12">
							<button class="btn btn-success" id="affiche_ged">Afficher </button>
						</div>
					
							
							<br/>
					
				
			  </div>
			</div>
		  </div>  
		</div>
</div>