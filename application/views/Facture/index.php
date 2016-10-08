

 <div id="content">
	<div class="tabs-wrapper text-center">             
	 <div class="panel box-shadow-none text-left content-header">
		  <div class="panel-body" style="padding-bottom:0px;">
			<div class="col-md-12">
				<h3 class="animated fadeInLeft">Facturation JIRAMA</h3>
			</div>
			<ul id="tabs-demo" class="nav nav-tabs content-header-tab" role="tablist" style="padding-top:10px;">
			  <li role="presentation" class="active">
				<a href="#tabs-area-demo" id="tabs2" data-toggle="tab">Gestion facture</a>
			  </li>
			  <li role="presentation" class="">
				<a href="#panels-area-demo" id="tabs2" data-toggle="tab">Consultation & sommation</a>
			  </li>
			  <li role="presentation" class="">
				<a href="#stat-area-demo" id="tabs2" data-toggle="tab">Statistique</a>
			  </li>
			</ul>
		  </div>
	  </div>
	<div class="col-md-12 tab-content">
		<div role="tabpanel" class="tab-pane fade active in" id="tabs-area-demo" aria-labelledby="tabs1">
				
			<div class="col-md-12 top-20 padding-0" id="list_facture">
				<div class="col-md-12">
				  <div class="panel">
					<div class="panel-heading"><h3>Mise à jour facture</h3></div>
					<div class="panel-body">						  
					  <br/>
					  <div>
						<button   class="btn btn-success" role="button" role="button"  id="ajouter_fact">Ajouter nouvel taux</button>
					  </div>
					  <br/>
					  <div class="responsive-table">
					  <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
							  <thead>
								<tr>
										<th><center>Consommation</center></th>
										<th><center>Date deb</center></th>
										<th><center>Date fin</center></th>
										<th><center>Date creation</center></th>
										<th><center>Action</center></th>
								</tr>
							  </thead>
							  <tbody>									
								<?php $i=1; foreach($fact as $factur): ?>
								<tr>
									<td><center><?php echo $factur->consommation;?></center></td>
									<td><center><?php echo $factur->date_deb;?></center></td>
									<td><center><?php echo $factur->date_fin;?></center></td>
									<td><center><?php echo $factur->date_ajout;?></center></td>
									<td><center>
										<a class="btn btn-primary" href="<?php echo site_url("Facture/modifier/".$factur->id_fact);?>">modifier</a>&nbsp;&nbsp;<a class="btn btn-danger" href="<?php echo site_url("Facture/supprimer/".$factur->id_fact);?>" onclick="return(confirm('voulez vous supprimer cet agent'))">supprimer</a>&nbsp;&nbsp;<a  class="btn btn-success" href="<?php echo site_url("Facture/Voir/".$factur->id_fact);?>" >Voir</a>
										</center>
									</td>
								</tr>
								 <?php $i++; endforeach; ?>
							  </tbody>
						</table>			
					  </div>
				  </div>
				</div>
			   </div>  
			</div>
		  
			<div class="col-md-12 top-20 padding-0" id="form_ajouter" >
				<div class="col-md-12">
				  <div class="panel">
					<div class="panel-heading"><h3>Ajout facture</h3></div>
					<div class="panel-body">
					  
					<br/>

					  <div class="responsive-table">
							<form class="form-horizontal row-fluid" action="" method="post">
							
								<div class="form-group form-animate-text" style="margin-top:40px !important;">
										<input class="form-text mask-fallback " type="text" required="" name="facture_f[date_ajout]" id="namess" required="true" value="<?php print_r($dates);?>">
										<span class="bar"></span>
										<label>Date ajout : </label>
								</div>
								
								<div class="col-sm-12 padding-0">
								<label class="control-label" for="im">Taux facture : </label>
									<select class="form-control" name="facture_f[consommation]" id="service_id"  required="true">
										<?php $i=1; foreach($fact_t as $facts): ?>
													<option>
															<td><?php echo $facts->val_cons; ?></td>
														
													</option>
												<?php $i++; endforeach; ?>
									</select>
								</div>
							<br/>
							<br/>
							<br/>
								<div class="form-group form-animate-text" style="margin-top:40px !important;">
									<input class="form-text mask-fallback datepickers" type="text" required="" name="facture_f[date_deb]" id="name" required="true">
									<span class="bar"></span>
									<label>Date Début : </label>
								</div>
																			
								<div class="form-group form-animate-text" style="margin-top:40px !important;">
									<input class="form-text mask-fallback datepickers1" type="text" required="" name="facture_f[date_fin]" id="names" required="true">
									<span class="bar"></span>
									<label>Date Fin : </label>
								</div>
									

								<div class="control-group">
									<div class="controls">
										<input type="submit" class="btn-primary" name="creer_facture" value="Creer facture"  required="true"/>
									   <a href="<?php echo base_url('index.php/Facture/index')?>"  class="btn-danger">retour</a>
									</div>
								</div>
							</form>
							 
					  </div>
				  </div>
				</div>
			   </div>  
		  </div>
		</div>

	<div role="tabpanel" class="tab-pane fade" id="panels-area-demo" aria-labelledby="tabs2">
	  <div class="col-md-12">
		<div class="panel">
			
			<div class="panel-heading"><h3>Recherche et totalisation taux facture</h3></div>
			<div class="panel-body">
				<div class="form-group form-animate-text" style="margin-top:40px !important;">
					<input class="form-text mask-fallback datepickers" type="text" id="d_deb">
					<span class="bar"></span>
					<label>Date Début : </label>
				</div>
																		
				<div class="form-group form-animate-text" style="margin-top:40px !important;">
					<input class="form-text mask-fallback datepickers1" type="text"  id="d_fin">
					<span class="bar"></span>
					<label>Date Fin : </label>
				</div>
				<button class="btn btn-success" id="btn_rechercher">Rechercher</button>
				
				<br/>
				<br/>
				<br/>
				<div class="responsive-table" id="resultat">

				</div>
			</div>
		
		</div>
	  </div>
	</div>
	
	<div role="tabpanel" class="tab-pane fade" id="stat-area-demo" aria-labelledby="tabs2">
	  <div class="col-md-12">
		<div class="panel">
			
			<div class="panel-heading"><h3>Statistique taux facture</h3></div>
			<div class="panel-body">
				<div class="form-group form-animate-text" style="margin-top:40px !important;">
					<input class="form-text mask-fallback datepickers" type="text" id="d_deb_stat">
					<span class="bar"></span>
					<label>Date Début : </label>
				</div>
																		
				<div class="form-group form-animate-text" style="margin-top:40px !important;">
					<input class="form-text mask-fallback datepickers1" type="text"  id="d_fin_stat">
					<span class="bar"></span>
					<label>Date Fin : </label>
				</div>
				<button class="btn btn-success" id="btn_stat">Afficher stat</button>
				
				<br/>
				<br/>
				<br/>
	 
			</div>	
		
		</div>
 
	  </div>
	</div>
 <!--div id="chart1" class="jqplot-target" style="margin-top: 20px; margin-left: 20px; width: 300px; height: 300px; position: relative;"></div-->	
	</div>
   </div>

</div>

