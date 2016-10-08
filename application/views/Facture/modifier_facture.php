          <div id="content">
            <div class="tabs-wrapper text-center">             
             <div class="panel box-shadow-none text-left content-header">
                  <div class="panel-body" style="padding-bottom:0px;">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Modification Facturation JIRAMA</h3>

                    </div>
                  </div>
              </div>
            <div class="col-md-12 tab-content">

            <div role="tabpanel" class="tab-pane fade active in" id="tabs-area-demo" aria-labelledby="tabs1">
					
				<div class="col-md-12 top-20 padding-0" id="form_modifier" >
					<div class="col-md-12">
					  <div class="panel">
						<div class="panel-heading"><h3>Modifier facture</h3></div>
							<div class="panel-body">
							  
							<br/>

							  <div class="responsive-table">
									<form class="form-horizontal row-fluid" action="" method="post">
									
									<div class="col-sm-12 padding-0">
									<label class="control-label" for="im">Taux facture : </label>
										<select class="form-control" name="facture_m[consommation]" id="service_id"  required="true">
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
									<?php $i=1; foreach($factr as $factur): ?>
									
									<div class="form-group form-animate-text" style="margin-top:40px !important;">
										<input class="form-text mask-fallback datepickers" type="text"  name="facture_m[date_deb]" id="name" value="<?php echo $factur->date_deb;?>">
										<span class="bar"></span>
										<label>Date Début : </label>
									</div>
																				
									<div class="form-group form-animate-text" style="margin-top:40px !important;">
										<input class="form-text mask-fallback datepickers1" type="text"  name="facture_m[date_fin]" id="names"  value="<?php echo $factur->date_fin;?>" >
										<span class="bar"></span>
										<label>Date Fin : </label>
									</div>
										
									<?php $i++; endforeach; ?>	
										<div class="control-group">
											<div class="controls">
												<input type="submit" class="btn-primary" name="modifier_facture" value="Modifier facture"  required="true">
											   
											</div>
										</div>
									</form>
									 <a href="<?php echo base_url('index.php/Facture/index')?>"><button class="btn-danger">retour</button></a>
							  </div>
					  </div>
					  </div>
				   </div>  
              </div>	
            </div>				
		  </div>
		</div>
	  </div>

		  
		  

